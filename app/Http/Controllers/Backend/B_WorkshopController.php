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
                        $start = Carbon::parse($item->start_date);
                        $end = Carbon::parse($item->end_date);

                        $daysWithInclusive = $start->diffInDays($end) + 1;

                        $result = $item->start_date . ' - ' . $item->end_date;
                        $result .= '<br>';
                        $result .= '('.$daysWithInclusive. ' Hari lagi)' ;

                        return $result ?? ''; 
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each workshop
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item view" href="' . URL::to('back/workshop/detail/' . Crypt::encrypt($item->id) . '') . '"><i class="icon-base bx bx-edit-alt me-1"></i> View Details</a>
                          <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Deactivate</a>
                        </div>
                      </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'register'])
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
                'required',
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'max:2048'
            ],
        ]);

        $checkOldImage = Workshops::where('id', $request->id)->first();
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
            $path = $checkOldImage;
        }

        $price = str_replace('.', '', $request->price);
        $store = Workshops::updateOrCreate(
            ['id' => $request->id],
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
                'price' => $price
            ]
        );

        return redirect()->intended(URL::to('back/workshop'))->with('success', 'Data Berhasil Disimpan');
    }
}
