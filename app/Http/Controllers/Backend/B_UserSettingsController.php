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
        // Get the authenticated user
        $userAuth = auth()->user();

        // Get the user from the database
        $user = User::find($userAuth->id);

        // Get the user profile from the database
        $profile = UserProfiles::find($userAuth->id);
        
        // Return the view with the user and profile data
        return view('back.user.settings.profile.index',compact('user','profile'));
    }

    
    public function editProfile() 
    {
        // Get the authenticated user
        $userAuth = auth()->user();

        // Get the user profile from the database
        $profile = UserProfiles::find($userAuth->id);

        // Get the user from the database
        $user = User::find($userAuth->id);

        // Return the view with the user and profile data
        return view('back.user.settings.profile.edit',compact('user','profile'));
    }

    /**
     * Updates the authenticated user's profile details.
     *
     * This method handles updating the user's name, email, gender, date of birth, and phone number.
     * It performs a database transaction to ensure data consistency and rolls back in case of an error.
     *
     * @param  \Illuminate\Http\Request  $request The request object containing the user's updated profile data.
     * @return \Illuminate\Http\JsonResponse JSON response indicating the success or failure of the update operation.
     */
    public function updateProfile(Request $request)
    {
        try {
            // Start a database transaction to ensure data consistency
            DB::beginTransaction();

            // Get the authenticated user
            $userAuth = auth()->user();

            // Update the user's name and email
            $updateUser = User::where('id', $userAuth->id)->update([
                'name' => $request->name,
                'email'=> $request->email,
            ]);

            // Update the user's profile
            $updateProfile = UserProfiles::updateOrCreate([
                'id' => $userAuth->id,
            ],[
                'gender' => $request->gender,
                'dob' => $request->dob,
                'hp' => '62'.$request->hp,
            ]);

            // If the update was successful, commit the transaction
            if ($updateProfile && $updateUser) {
                DB::commit();
            }

            // Return a JSON response indicating success
            return response()->json([
                'status'=> 'success',
                'message' => 'Update Profile Success',
            ], 200);

        } catch (\Exception $th) {
            // If there was an error, rollback the transaction
            DB::rollBack();

            // Return a JSON response indicating the error
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
