<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DashboardGallery;
use App\Models\DashboardProfile;
use App\Models\DashboardPivotTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class F_DashboardController extends Controller
{   
    
    public function index()
    {
       $images = DashboardGallery::all()->toArray();
        return view('front.page.dashboard.index', compact(['images']));
    }

    public function getProfiles()
    {
        $profile_list = DashboardProfile::all()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'daftar profile berhasil dimuat',
            'data' => $profile_list
        ]);
    }
    public function getImages()
    {
        $imgList = DashboardGallery::all()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'daftar gambar berhasil dimuat',
            'data' => $imgList
        ]);
    }
    public function selectProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        try {
            $toBeSelected = DashboardProfile::find($profileId)->toArray();
            DB::beginTransaction();
            DashboardProfile::query()->update(['is_selected' => 0]);
            DashboardProfile::query()->where('id', $profileId)->update(['is_selected' => 1]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => "Profile '$toBeSelected' berhasil dipilih"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function composeProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        $profileName = $request['profile_name'];
        $gallery = $request['img_list'];
        try {
            DB::beginTransaction();
            if ($profileName != null) {
                $this->editProfName($profileId, $profileName);
            } else {
            }
            if ($gallery != null) {
                $this->editImgList($profileId, $gallery);
            } else {
            }
            DB::commit();
            if ($profileId === null) {
                return response()->json([
                    'status' => true,
                    'message' => 'profile berhasil dibuat'
                ], 201);
            }
            return response()->json([
                'status' => true,
                'message' => 'profile behasil disunting'
            ], 202);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function deleteProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        $profileToDelete = DashboardProfile::find($profileId);
        if ($profileToDelete['is_selected'] === 0) {
            $profileToDelete->delete();
            return response()->json([
                'status' => false,
                'message' => 'profile berhasil dihapus'
            ], 204);
        }
        return response()->json([
            'status' => false,
            'message' => 'profile sedang digunakan'
        ], 400);
    }
    public function renameImage(Request $request) {}
    public function deleteImage(Request $request) {}
}
