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
            // Decrypt the service ID
            $id = Crypt::decrypt($id);

            // Retrieve the service with its category
            $service = Services::with('category')->where('id', $id)->first();

            // Get all slots associated with the service
            $slots = ServiceSlot::where('service_id', $service->id)->get();

            // Define a list of days
            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            // Check if the request is an AJAX request
            if ($request->ajax()) {
                return DataTables::of($slots)
                    ->addIndexColumn()
                    ->editColumn('day', function ($item) {
                        // Capitalize the first letter of the day
                        return ucfirst($item->day);
                    })
                    ->addColumn('active_hours', function ($item) {
                        // Format and return the active hours
                        return date('H:i', strtotime($item->start_at)) . ' - ' . date('H:i', strtotime($item->end_at));
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each slot                        
                        $btn = '<button type="button" class="btn btn-outline-secondary p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>';
                        $btn .= '<div class="dropdown-menu">';
                        $btn .= '<a class="dropdown-item edit" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>';
                        if ($item->product_count == 0) {
                            $btn .= ' <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>';
                        }
                        $btn .= '</div></div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'active_hours'])
                    ->make(true);
            }

            // Return the view with service, slots, and days data
            return view('back.kiosk.seller.service.slot', compact('service', 'slots', 'days'));
        } catch (\Throwable $th) {
            // Handle exceptions by aborting with a 404 error
            abort(404);
        }
    }

    /**
     * Store a newly created slot in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSlot(Request $request)
    {
        try {
            // Decrypt the service ID from the request
            $service_id = Crypt::decrypt($request->service_id);

            // Create or update a service slot
            $createOrUpdate = ServiceSlot::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                [
                    'service_id' => $service_id,
                    'day' => $request->day,
                    'start_at' => $request->start_at,
                    'end_at' => $request->end_at,
                ]
            );

            // Return a success response with a message
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Data Berhasil Disimpan'
                ],
                200
            );
        } catch (\Throwable $th) {
            // Return an error response if an exception is caught
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Returns the data of a service slot to be edited.
     *
     * @param  string  $id  The encrypted ID of the service slot to be edited.
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSlot($id)
    {
        try {
            // Decrypt the slot ID
            $id = Crypt::decrypt($id);

            // Retrieve the slot data
            $slot = ServiceSlot::where('id', $id)->first();

            // Format the slot data
            $slot = [
                'id' => $slot->id,
                'service_id' => $slot->service_id,
                'day' => $slot->day,
                'start_at' => date('H:i', strtotime($slot->start_at)),
                'end_at' => date('H:i', strtotime($slot->end_at)),
            ];

            // Return a success response with the slot data
            return response()->json([
                'status' => 'success',
                'data' => $slot
            ], 200);

        } catch (\Throwable $th) {
            // Return an error response if an exception is caught
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
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
