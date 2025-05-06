<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceCategories;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class B_ServiceController extends Controller
{        
    public function create()
    {
        // Get all service categories sorted by name
        $categories = ServiceCategories::orderBy('name')->get();

        // Pass the categories to the view
        return view('back.kiosk.seller.service.create', compact('categories'));
    }

    public function store(Request $request)
    {   
        try {            
            
            $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();            
            $service = Services::updateOrCreate([
                'id' => $request->id,
            ],
            [
                'kiosk_id' => $kiosk->id,
                'category_id' => $request->category,
                'name' => $request->title,
                'description' => $request->description,
                'price' => str_replace('.', '', $request->price),
            ]);

            return redirect(URL::to('back/kiosku/service'))->with('success', 'Data Berhasil Disimpan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
