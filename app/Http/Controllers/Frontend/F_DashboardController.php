<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DashboardProfile;
use App\Models\DashboardPivotTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class F_DashboardController extends Controller
{
    private function profileList()
    {
        // // Get the authenticated user
        // $userAuth = auth()->user();

        // // Redirect to login if user is not authenticated
        // if (!$userAuth) {
        //     return redirect()->route('login');
        // }
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
    private function profile_stacking(array $data)
    {
        //jane expect ku koyok ngene, tapi mari tak pikir2 maneh, kok koyok e malah enak an hasil pivotan e sampean:
        //     $flatten_profile = [];

        // foreach ($data as $entry) {
        //     $profile = $entry['profile_name'];

        //     if (!isset($flatten_profile[$profile])) {
        //         $flatten_profile[$profile] = [
        //             'profile_name' => $profile,
        //             'images' => []
        //         ];
        //     }

        //     $flatten_profile[$profile]['images'][] = [
        //         'img_name' => $entry['img_name'],
        //         'img_path' => $entry['img_path'],
        //         'img_desc' => $entry['img_desc']
        //     ];
        // }

        // return array_values($flatten_profile);
        $flatten_profile = [];
        foreach ($data as $entry) {
            $profId = $entry['profile_id'];
            $profile = $entry['profile_name'];
            foreach ($entry as $key => $value) {
                if ($key === 'profile_name' || $key === 'profile_id') {
                    $flatten_profile[$profile][$key] = $value;
                } else {
                    $flatten_profile[$profile][$key][] = $value;
                }
            }
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
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selected_profile = $this->profileList()
            ->where('dashboard_profile.is_selected', 1)
            ->get()
            ->toArray();
        $stacked_profile = $this->profile_stacking($selected_profile);
        $imgs = $stacked_profile[0]['img_path'];
        $descs = $stacked_profile[0]['img_desc'];
        return view('front.page.dashboard.index', compact(['imgs', 'descs']));
    }

    public function getProfiles()
    {
        $profile_list = $this->profileList()->get()->toArray();
        $stacked_profile = $this->profile_stacking($profile_list);
        return response()->json([
            'status' => true,
            'message' => 'daftar profile berhasil dimuat',
            'data' => $stacked_profile
        ]);
    }
    public function currentProfile()
    {
        $selected_profile = $this->profileList()
            ->where('dashboard_profile.is_selected', 1)
            ->get()
            ->toArray();
        $stacked_profile = $this->profile_stacking($selected_profile);
        return response()->json([
            'status' => true,
            'message' => 'profile terpilih berhasil dimuat',
            'data' => $stacked_profile
        ]);
    }
    public function selectProfile(Request $request)
    {
        $validatedData = $request->validate(['profile_id' => 'required|integer']);
        $profileId = $validatedData['profile_id'];
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
        $validatedData = $request->validate(
            [
                'profile_id' => 'required|integer',
                'profile_name' => 'string',
                'img_list' => 'array'
            ]
        );
        $profileId = $validatedData['profile_id'];
        $profileName = $validatedData['profile_name'];
        $gallery = $validatedData['img_list'];
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
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
