<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ServiceCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class B_ServiceCategoryController extends Controller
{
    public function index(Request $request) 
    {
        try {
        $categories = ServiceCategories::withCount('service')->get();
        
        if ($request->ajax()) { 
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    // Generate action buttons for each event
                    $btn = '<button type="button" class="btn btn-outline-secondary p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>';
                    $btn .= '<div class="dropdown-menu">';
                    $btn .= '<a class="dropdown-item edit" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>';
                    if ($item->service_count == 0) {
                        $btn .= ' <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>';
                    }
                    $btn .= '</div></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('back.service_category.index');
        } catch (\Exception $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
