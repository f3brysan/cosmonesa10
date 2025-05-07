<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
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
                    'price' => str_replace('.', '', $request->price),
                ]
            );

            return redirect(URL::to('back/kiosku/service'))->with('success', 'Data Berhasil Disimpan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
