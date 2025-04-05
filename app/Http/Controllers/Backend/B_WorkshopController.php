<?php

namespace App\Http\Controllers\Backend;

use App\Models\Workshops;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each workshop
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item view" href="'.URL::to('back/workshop/detail/'.Crypt::encrypt($item->id).'').'"><i class="icon-base bx bx-edit-alt me-1"></i> View Details</a>
                          <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Deactivate</a>
                        </div>
                      </div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
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
}
