<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class B_UserSettingsController extends Controller
{
    public function index(){
        $userAuth = auth()->user();

        $user = User::find($userAuth->id);
        $profile = UserProfiles::find($userAuth->id);
        
        return view('back.user.settings.profile.index',compact('user','profile'));
    }

    public function editProfile() 
    {
        $userAuth = auth()->user();

        $profile = UserProfiles::find($userAuth->id);
        $user = User::find($userAuth->id);

        return view('back.user.settings.profile.edit',compact('user','profile'));
    }

    public function updateProfile(Request $request)
    {
        try {
            DB::beginTransaction();
            $userAuth = auth()->user();
            $updateUser = User::where('id', $userAuth->id)->update([
                'name' => $request->name,
                'email'=> $request->email,
            ]);

            $updateProfile = UserProfiles::updateOrCreate([
                'id' => $userAuth->id,
            ],[
                'gender' => $request->gender,
                'dob' => $request->dob,
                'hp' => '62'.$request->hp,
            ]);

            if ($updateUser) {
                DB::commit();
            }
            return response()->json([
                'status'=> 'success',
                'message' => 'Update Profile Success',
            ], 200);
        } catch (\Exception $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
