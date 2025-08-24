<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Events;
use App\Models\EventTypes;
use Illuminate\Support\Str;
use App\Models\Certificates;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\EventParticipants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class B_EventController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Fetch workshops that are not certifications
            $events = Events::with('eventtype')->orderBy('event_date')->get();

            // Handle AJAX request for data tables
            if ($request->ajax()) {
                return DataTables::of($events)
                    ->addIndexColumn()
                    ->addColumn('register', function ($item) {
                        $result = $item->start_date.' s/d '.$item->end_date;
                        return $result ?? '';
                    })
                    ->editColumn('event_date', function ($item) {
                        $start = Carbon::parse(date('Y-m-d H:i:s'));
                        $end = Carbon::parse($item->event_date);

                        $daysWithInclusive = $start->diffInDays($end) + 1;
                        $result = $item->event_date;
                        $result .= '<br>';
                        $result .= '('.$daysWithInclusive.' Hari lagi)';

                        return $result ?? '';
                    })
                    ->addColumn('event_type', function ($item) {
                        $result = ! empty($item->eventtype->name) ? ucfirst($item->eventtype->name) : '';
                        return $result;
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="'.URL::to('back/event/detail/'.$item->slug).'"><i class="icon-base bx bx-show me-1"></i> Detil</a>
                          <a class="dropdown-item" target="_blank" href="'.URL::to('back/event/edit/'.Crypt::encrypt($item->id).'').'"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>
                          <a class="dropdown-item destroy" data-id="'.Crypt::encrypt($item->id).'" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>
                        </div>
                      </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'register', 'event_date', 'htm', 'event_type'])
                    ->addIndexColumn()
                    ->make(true);
            }
        } catch (\Exception $th) {
            // Return JSON response with error message on exception
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }

        // Return the view for the event index page
        return view('back.event.index');
    }

    public function create()
    {
        $eventTypes = EventTypes::all();
        return view('back.event.create', compact('eventTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => [
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'max:2048'
            ],
        ]);

        $id = NULL;
        if (! empty($request->id)) {
            $id = Crypt::decrypt($request->id);
        }

        $checkOldImage = Events::where('id', $id)->first();
        $path = '';
        if ($request->file('image') != null) {
            if (! empty($checkOldImage->picture)) {
                Storage::disk('public')->delete($checkOldImage->picture);
            }

            $file = $request->file('image');
            $type = Str::limit(Str::slug($request->title, '_'), 100);
            $filename = date('YmdHis').'_'.$type.'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('event', $filename, 'public');
        } else {
            $path = $checkOldImage->picture;
        }


        $price = str_replace('.', '', $request->price);
        $store = Events::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'description' => $request->detail,
                'start_date' => $request->register_date_start,
                'end_date' => $request->register_date_end,
                'event_date' => $request->event_date,
                'picture' => $path,
                'created_by' => auth()->user()->name,
                'price' => $price,
                'quota' => $request->quota,
                'event_type_id' => $request->event_type
            ]
        );

        return redirect()->intended(URL::to('back/event'))->with('success', 'Data Berhasil Disimpan');
    }

    public function show($slug)
    {
        try {
            // Retrieve the event by slug
            $event = Events::with('eventtype')->where('slug', $slug)->first();
            $countParticipants = DB::table('event_participants as ep')
                ->select('ep.*', 'u.name', 't.payment_status', 't.code')
                ->join('users as u', 'u.id', '=', 'ep.user_id')
                ->leftJoin('transactions as t', 't.id', '=', 'ep.transaction_id')
                ->where('ep.event_id', $event->id)
                ->whereIn('t.payment_status', ['success', 'paid'])
                ->count();
            // Return the view for displaying the event
            return view('back.event.show', compact('event', 'countParticipants'));
        } catch (\Throwable $th) {
            // If an error occurs, abort with a 404 error
            dd($th);
            abort(404);
        }
    }

    public function eventParticipants(Request $request, $id)
    {
        try {
            $participants = DB::table('event_participants as ep')
                ->select('ep.*', 'u.name', 't.payment_status', 't.code', 'c.serial_number')
                ->join('users as u', 'u.id', '=', 'ep.user_id')
                ->leftJoin('transactions as t', 't.id', '=', 'ep.transaction_id')
                ->leftJoin('certificates as c', 'c.event_participant_id', '=', 'ep.id')
                ->where('ep.event_id', $id)
                ->get();

            if ($request->ajax()) {
                return DataTables::of($participants)
                    ->addIndexColumn()
                    ->addColumn('is_attended', function ($item) {
                        if ($item->is_attended == 1) {
                            $result = '<span class="badge bg-label-success">Attended</span>';
                        } else {
                            $result = '<span class="badge bg-label-danger">Not Attended</span>';
                        }
                        return $result;
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">';
                        if ($item->payment_status == 'success') {
                            if (! empty($item->serial_number)) {
                                $btn .= '<a class="dropdown-item certificate" data-id="'.Crypt::encrypt($item->transaction_id).'" target="_blank" href="'.URL::to('back/event/certificate-detail/'.$item->serial_number).'" ><i class="icon-base bx bx-note me-1"></i> Certificate</a>';
                            } else {
                                $btn .= '<a class="dropdown-item certificate" data-id="'.Crypt::encrypt($item->transaction_id).'" href="javascript:void(0);" ><i class="icon-base bx bx-note me-1"></i> Certificate</a>';
                            }
                        } else if ($item->payment_status == 'paid') {
                            $btn .= '<a class="dropdown-item approve" data-id="'.Crypt::encrypt($item->transaction_id).'" href="javascript:void(0);" ><i class="icon-base bx bx-check me-1"></i> Approve Payment</a>';
                        }
                        if ($item->is_attended == 0) {
                            $btn .= ' <a class="dropdown-item attend" data-id="'.Crypt::encrypt($item->id).'" href="javascript:void(0);" ><i class="icon-base bx bx-user me-1"></i> Attend</a>';
                        }
                        $btn .= '</div>
                      </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'is_attended'])
                    ->addIndexColumn()
                    ->make(true);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function attend(Request $request)
    {
        try {
            // Decrypt the id
            $id = Crypt::decrypt($request->id);

            // Retrieve the participant by id
            $participant = EventParticipants::where('id', $id)->first();

            // Mark the participant as attended
            $participant->is_attended = 1;
            $participant->save();

            // Return a success response
            return response()->json([
                'status' => true,
                'message' => 'Success'
            ], 200);
        } catch (\Throwable $th) {
            // Return an error response if an exception occurs
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        // Decrypt the id
        try {
            $id = Crypt::decrypt($id);
        } catch (\Throwable $th) {
            // If the id is invalid, abort with a 404 error
            abort(404);
        }

        // Retrieve the event by id
        try {
            $event = Events::with('eventtype')->where('id', $id)->first();
        } catch (\Throwable $th) {
            // If the event is not found, abort with a 404 error
            abort(404);
        }

        $eventTypes = EventTypes::all();
        // Return the view for editing the event
        return view('back.event.edit', compact('event', 'eventTypes'));
    }

    public function setSignature(Request $request)
    {
        // Decrypt the id
        $id = Crypt::decrypt($request->event_id);

        // Validate the signature field
        $this->validate($request, [
            'signature' => [
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'max:2048'
            ],
        ]);

        // Retrieve the event by id
        $checkOldImage = Events::where('id', $id)->first();

        // Process the signature image
        if ($request->file('signature') != null) {
            // Delete the old signature image
            if (! empty($checkOldImage->signature_picture)) {
                Storage::disk('public')->delete($checkOldImage->signature_picture);
            }

            // Store the new signature image
            $file = $request->file('signature');
            $filename = date('YmdHis').'_'.$id.'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('event_signature', $filename, 'public');
        } else {
            // No new signature image, use the old one
            $path = $checkOldImage->picture;
        }

        // Update the event with the new signature
        $update = Events::where('id', $id)->update([
            'signature_picture' => $path,
            'signature_name' => $request->siganture_name
        ]);

        // Redirect to the detail page of the event
        return redirect(URL::to('back/event/detail/'.$checkOldImage->slug))->with('success', 'Data Berhasil Disimpan');

    }

    public function generateCertificate(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->id);
            $event = Events::where('id', $id)->first();
            $participants = EventParticipants::where('event_id', $id)->get();

            $arrParticipant = $participants->pluck('id')->toArray();
            $checkCertificate = Certificates::whereIn('event_participant_id', $arrParticipant)->get();

            if ($checkCertificate->count() == $participants->count()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Certificate sudah dibuat'
                ], 400);
            }

            $allowedParticipant = $participants->whereNotIn('id', $checkCertificate->pluck('event_participant_id'));

            foreach ($allowedParticipant as $item) {
                $serialNumber = $this->generateSerialNumber($id, $item->user_id);
                $createCertificate = Certificates::create([
                    'event_participant_id' => $item->id,
                    'serial_number' => $serialNumber,
                    'pic' => $event->signature_name,
                    'issued_at' => date('Y-m-d'),
                    'valid_until' => date('Y-m-d', strtotime('+2 year')),
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Certificate berhasil dibuat'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function generateSerialNumber($event_id, $user_id)
    {
        $string = $event_id.$user_id.date('YmdHis');
        $hash = md5($string);
        $serialNumber = strtoupper('CERT-'.$hash);
        $serialNumber = Str::limit($serialNumber, 25, '');
        return $serialNumber;
    }

    public function certificateDetail($id)
    {
        $certificate = Certificates::where('serial_number', $id)
            ->with(['participant.user', 'participant.events'])
            ->first();
        $signaturePic = $certificate->participant->events->signature_picture;
        
        $signaturePic = storage_path('app/public/'.$signaturePic);
        $type = pathinfo($signaturePic, PATHINFO_EXTENSION);
        $siganturePicBase64 = 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($signaturePic));

        // Prepare data for the certificate view
        $data_cert = [
            'name' => $certificate->participant->user->name ?? '',
            'serial_number' => $certificate->serial_number,
            'issued_at' => $certificate->issued_at,
            'valid_until' => $certificate->valid_until,
            'pic' => $certificate->pic,
            'title' => $certificate->participant->events->title ?? '',
            'signature_pic' => $siganturePicBase64,
            'signature_name' => $certificate->participant->events->signature_name ?? '',
            'event_date' => $certificate->participant->events->event_date ?? '',
            'qrcode_url' => URL::to('certificate/'.$certificate->serial_number),
        ];
        
        $path = public_path('frontend/images/cert/cert.jpg'); // Correct local path
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data);

        // Set DomPDF options
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Allows loading external images

        // Create a new DomPDF instance with options
        $dompdf = new Dompdf($options);
        $pdfContent = view('front.page.events.cert', compact(['base64', 'data_cert']))->render();
        $dompdf->loadHtml($pdfContent);

        // Set paper size & render PDF
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        // return $dompdf->stream('certificate.pdf');
        return $dompdf->stream('certificate.pdf', ["Attachment" => false]);
    }
}
