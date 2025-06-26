<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DashboardProfile;
use Illuminate\Http\Request;

class F_DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve data from the database
        // $users = User::all();

        // Return the view

        return view('front.page.dashboard.index');
    }
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
                'dashboard_profile.name as profile_name',
                'gallery.name as img_name',
                'gallery.path as img_path',
                'gallery.desciption as img_desc',
            ]);
    }
    private function profile_stacking(array $data)
    {
        $flatten_profile = [];
        foreach ($data as $entry) {
            $profile = $entry['profile_name'];
            foreach ($entry as $key => $value) {
                if ($key === 'profile_name') {
                    $flatten_profile[$profile][$key] = $value;
                } else {
                    $flatten_profile[$profile][$key][] = $value;
                }
            }
        }
        return $flatten_profile;
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
}
