<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kiosks;
use App\Models\Services;
use App\Models\ServiceSlot;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ServiceCategories;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class B_ServiceController extends Controller
{
    public function create()
    {
        // Get all service categories sorted by name
        $categories = ServiceCategories::orderBy('name')->get();

        // Pass the categories to the view
        return view('back.kiosk.seller.service.create', compact('categories'));
    }

    public function edit($id)
    {
        try {
            // Decrypt the ID from the request
            $id = Crypt::decrypt($id);

            // Get all service categories sorted by name
            $categories = ServiceCategories::orderBy('name')->get();

            // Get the service with its category
            $service = Services::with(['category'])->where('id', $id)->first();

            // Return the edit view with the service and categories
            return view('back.kiosk.seller.service.edit', compact('service', 'categories'));
        } catch (\Throwable $th) {
            // If an exception occurs, abort with a 404 error
            abort(404);
        }
    }

    public function store(Request $request)
    {
        try {
            $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();
            $service = Services::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'kiosk_id' => $kiosk->id,
                    'category_id' => $request->category,
                    'name' => $request->title,
                    'description' => $request->detail,
                    'is_active' => 1,
                    'price' => str_replace('.', '', $request->price),
                ]
            );

            return redirect(URL::to('back/kiosku/service'))->with('success', 'Data Berhasil Disimpan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function setSlot(Request $request, $id) 
    {
      try {
        $id = Crypt::decrypt($id);
        $service = Services::with('category')->where('id', $id)->first();
        $slots = ServiceSlot::where('service_id', $service->id)->get();
        
        if ($request->ajax()) {
                return DataTables::of($slots)
                    ->addIndexColumn()
                    ->editColumn('day', function ($item) {
                        return ucfirst($item->day);
                    })
                    ->addColumn('active_hours', function ($item) {
                        return date('H:i', strtotime($item->start_at)) . ' - ' . date('H:i', strtotime($item->end_at));
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="' . URL::to('back/product/detail/' . $item->slug) . '"><i class="icon-base bx bx-show me-1"></i> Detil</a>
                      <a class="dropdown-item" target="_blank" href="' . URL::to('back/product/edit/' . Crypt::encrypt($item->id) . '') . '"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>
                      <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>
                    </div>
                  </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'active_hours'])
                    ->make(true);
            }

        return view('back.kiosk.seller.service.slot', compact('service', 'slots'));
      } catch (\Throwable $th) {
        abort(404);
      }  
    }

    /**
     * Deletes or restores a service by toggling its active status.
     *
     * If the service is active, it will be set to inactive, and vice versa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            // Decrypt the ID from the request
            $id = Crypt::decrypt($request->id);
            
            // Determine the new status based on the current status
            $statusUpdating = $request->status == 1 ? 0 : 1;
            
            // Update the service by toggling its is_active property
            $service = Services::where('id', $id)->update([
                'is_active' => $statusUpdating
            ]);

            // Return a success response
            return response()->json([
                'status' => 'success',
                'message' => 'Service status updated successfully'
            ]);

        } catch (\Throwable $th) {
            // Return an error response if an exception occurs
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
