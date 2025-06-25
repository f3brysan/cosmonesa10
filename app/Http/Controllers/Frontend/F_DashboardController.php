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
        // Get the authenticated user
        $userAuth = auth()->user();

        // Redirect to login if user is not authenticated
        if (!$userAuth) {
            return redirect()->route('login');
        }
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
    public function getProfiles()
    {
        $profile_list = $this->profileList()->get();
        return response()->json([
            'status' => true,
            'message' => 'daftar profile berhasil dimuat',
            'data' => $profile_list
        ]);
    }
    public function currentProfile()
    {
        $selected_profile = $this->profileList()
            ->where('dashboard_profile.is_selected', 1)
            ->first();
        return response()->json([
            'status' => true,
            'message' => 'profile terpilih berhasil dimuat',
            'data' => $selected_profile
        ]);
    }
}
