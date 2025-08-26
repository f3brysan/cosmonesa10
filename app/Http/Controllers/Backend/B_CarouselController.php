<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DashboardGallery;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class B_CarouselController extends Controller
{
    public function index(Request $request)
    {
        $carousel = DashboardGallery::all();
        
        try {
            if ($request->ajax()) {
                return DataTables::of($carousel)
                    ->addIndexColumn()
                    ->addColumn('path', function($row){
                        return '<img src="'.asset('storage/'.$row->path).'" width="100" height="100" class="img-thumbnail">';
                    })
                    ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" class="btn btn-danger btn-sm destroy" data-id="'.$row->id.'">Delete</a>';
                       return $btn;
                    })
                    ->rawColumns(['path', 'action'])
                    ->make(true);
            }
            return view('back.carousel.index', compact('carousel'));
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
        
    }

    public function upload(Request $request)
    {
        try {
            foreach ($request->file('file') as $file) {
                $fileName = 'carousel_' . time().'_'. Str::random(7) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('carousel', $fileName, 'public');

                $insert = DashboardGallery::create([
                    'name' => $fileName,
                    'path' => $path,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'File uploaded successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            // Unset (delete) the old picture from storage before deleting the DB record
            $carousel = DashboardGallery::find($request->id);
            if ($carousel && !empty($carousel->path)) {
                \Storage::disk('public')->delete($carousel->path);
            }
            
            $carousel->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'File deleted successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
