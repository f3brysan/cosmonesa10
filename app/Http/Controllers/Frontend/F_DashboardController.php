<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DashboardGallery;
use App\Models\DashboardProfile;
use App\Models\DashboardPivotTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class F_DashboardController extends Controller
{
    private function profileQuery()
    {
        // // Get the authenticated user
        // $userAuth = auth()->user();

        // // Redirect to login if user is not authenticated
        // if (!$userAuth) {
        //     return redirect()->route('login');
        // }
        // return DashboardProfile::all()->toArray();
        return DashboardProfile::query()
            ->join('profile_gallery_section as dashboard_pivot', 'dashboard_profile.id', '=', 'dashboard_pivot.profile_id')
            ->join('dashboard_gallery as gallery', 'dashboard_pivot.gallery_id', '=', 'gallery.id')
            ->select([
                'dashboard_profile.id as profile_id',
                'dashboard_profile.name as profile_name',
                'gallery.id as img_id',
                'gallery.name as img_name',
                'gallery.path as img_path',
                'gallery.desciption as img_desc',
            ]);
    }

    private function profileList(array $data)
    {
        //jane expect ku koyok ngene, tapi mari tak pikir2 maneh, kok koyok e malah enak an hasil pivotan e sampean:
        $flatten_profile = [];

        foreach ($data as $entry) {
            $profile = $entry['profile_name'];

            if (!isset($flatten_profile[$profile])) {
                $flatten_profile[$profile] = [
                    'profile_name' => $profile,
                    'images' => []
                ];
            }

            $flatten_profile[$profile]['images'][] = [
                'img_name' => $entry['img_name'],
                'img_path' => $entry['img_path'],
                'img_desc' => $entry['img_desc']
            ];
        }

        return array_values($flatten_profile);
    }

    private function editProfName($profId = null, $profName = null)
    {
        return DashboardProfile::upsert([
            $values = ['id' => $profId, 'name' => $profName],
            $update = ['name']
        ]);
    }
    private function editImgList($profId = null, $imgList = null)
    {
        $imgGallery = [];
        foreach ($imgList as $picId) {
            $imgGallery[] = ['profile_id' => $profId, 'gallery_id' => $picId];
        }
        return DashboardPivotTab::upsert([
            $values = $imgGallery,
            $update = ['gallery_id']
        ]);
    }

    public function profileDetail($profileId)
    {
        $imgList = $this->profileQuery()
            ->where('dashboard_pivot.profile_id', $profileId)
            ->get()
            ->toArray();
        return $imgList;
    }

    public function index()
    {
        $selected_profile = $this->profileQuery()
            ->where('dashboard_profile.is_selected', 1)
            ->get()
            ->toArray();
        $images = $this->profileList($selected_profile)[0]['images'];
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
    public function uploadImage(Request $request) {}
    public function renameImage(Request $request) {}
    public function deleteImage(Request $request) {}
}
