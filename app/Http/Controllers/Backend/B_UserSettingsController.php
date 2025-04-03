<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class B_UserSettingsController extends Controller
{
    public function index(){
        $userAuth = auth()->user();

        $user = User::find($userAuth->id);
        $profile = UserProfiles::find($userAuth->profile_id);
        return view('back.user.settings.profile',compact('user','profile'));
    }
}
