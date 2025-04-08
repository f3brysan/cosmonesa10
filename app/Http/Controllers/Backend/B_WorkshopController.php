<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Workshops;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class B_WorkshopController extends Controller
{
    /**
     * Display a listing of the workshops.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            // Fetch workshops that are not certifications
            $workshops = Workshops::where('is_certication', false)->get();

            // Handle AJAX request for data tables
            if ($request->ajax()) {
                return DataTables::of($workshops)
                    ->addIndexColumn()
                    ->addColumn('register', function ($item) {
                        $result = $item->start_date . ' s/d ' . $item->end_date;
                        return $result ?? '';
                    })
                    ->editColumn('event_date', function ($item) {
                        $start = Carbon::parse(date('Y-m-d H:i:s'));
                        $end = Carbon::parse($item->event_date);

                        $daysWithInclusive = $start->diffInDays($end) + 1;
                        $result = $item->event_date;
                        $result .= '<br>';
                        $result .= '(' . $daysWithInclusive . ' Hari lagi)';

                        return $result ?? '';
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each workshop
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="' . URL::to('back/workshop/detail/' . $item->slug) . '"><i class="icon-base bx bx-show me-1"></i> Detil</a>
                          <a class="dropdown-item" target="_blank" href="' . URL::to('back/workshop/edit/' . Crypt::encrypt($item->id) . '') . '"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>
                          <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>
                        </div>
                      </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'register', 'event_date', 'htm'])
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

        // Return the view for the workshop index page
        return view('back.workshop.index');
    }

    public function create()
    {
        return view('back.workshop.create');
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
        if (!empty($request->id)) {
            $id = Crypt::decrypt($request->id);
        }

        $checkOldImage = Workshops::where('id', $id)->first();
        $path = '';
        if ($request->file('image') != null) {
            if (!empty($checkOldImage->picture)) {
                Storage::disk('public')->delete($checkOldImage->picture);
            }

            $file = $request->file('image');
            $type = Str::limit(Str::slug($request->title, '_'), 100);
            $filename = date('YmdHis') . '_' . $type . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('workshop', $filename, 'public');
        } else {
            $path = $checkOldImage->picture;
        }


        $price = str_replace('.', '', $request->price);
        $store = Workshops::updateOrCreate(
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
                'is_certication' => false,
                'price' => $price,
                'quota' => $request->quota
            ]
        );

        return redirect()->intended(URL::to('back/workshop'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified workshop.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        try {
            // Retrieve the workshop by slug
            $workshop = Workshops::where('slug', $slug)->first();
        } catch (\Throwable $th) {
            // If an error occurs, abort with a 404 error
            abort(404);
        }

        // Return the view for displaying the workshop
        return view('back.workshop.show', compact('workshop'));
    }

    /**
     * Edit the specified workshop.
     *
     * @param string $id The id of the workshop
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Decrypt the id
        try {
            $id = Crypt::decrypt($id);
        } catch (\Throwable $th) {
            // If the id is invalid, abort with a 404 error
            abort(404);
        }

        // Retrieve the workshop by id
        try {
            $workshop = Workshops::where('id', $id)->first();
        } catch (\Throwable $th) {
            // If the workshop is not found, abort with a 404 error
            abort(404);
        }

        // Return the view for editing the workshop
        return view('back.workshop.edit', compact('workshop'));
    }
}
