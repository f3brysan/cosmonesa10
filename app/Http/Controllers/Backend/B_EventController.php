<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\EventTypes;
use Illuminate\Support\Str;
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
                ->select('ep.*', 'u.name', 't.payment_status', 't.code')
                ->join('users as u', 'u.id', '=', 'ep.user_id')
                ->leftJoin('transactions as t', 't.id', '=', 'ep.transaction_id')
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
                            $btn .= '<a class="dropdown-item certificate" data-id="'.Crypt::encrypt($item->transaction_id).'" href="javascript:void(0);" ><i class="icon-base bx bx-note me-1"></i> Certificate</a>';
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
}
