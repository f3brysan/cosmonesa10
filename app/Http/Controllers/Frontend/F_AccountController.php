<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class F_AccountController extends Controller
{
    //
    public function index()
    {

        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.account.index');
    }
    public function profile()
    {
        try {
            // Get the authenticated user
            $userAuth = auth()->user();
            if (!$userAuth) {
                return redirect()->route('login');
            }
            // Get the user profile from the database
            $user = User::find($userAuth->id);
            $profile = UserProfiles::find($userAuth->id);
            // Get the user from the database
            return json_encode([
                'nama' => $user->name,
                'email' => $user->email,
                'jk' => $profile->gender ?? '',
                'tgl' => $profile->dob ?? '',
                'hp' => $profile->hp ?? ''
            ]);
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    public function save(Request $request)
    {

        dd($request->all());

        // try {
        //     // Authenticate the user
        //     $userAuth = auth()->user();
        //     if (!$userAuth) {
        //         return redirect()->route('login');
        //     }

        //     // Get user and profile data
        //     $user = User::find($userAuth->id);
        //     $profile = UserProfiles::find($userAuth->id);

        //     // Get the type and value dynamically
        //     $type = $request->query('type'); // Type is passed as a query parameter
        //     $value = $request->input($type); // Get the value for the type

        //     // Update based on type dynamically
        //     switch ($type) {
        //         case 'name':
        //             $user->name = $value;
        //             $user->save();
        //             break;
        //         case 'email':
        //             $user->email = $value;
        //             $user->save();
        //             break;
        //         case 'jk':
        //             $profile->gender = $value;
        //             $profile->save();
        //             break;
        //         case 'tgl':
        //             $profile->dob = $value;
        //             $profile->save();
        //             break;
        //         case 'hp':
        //             $profile->hp = $value;
        //             $profile->save();
        //             break;
        //         default:
        //             return response()->json(['status' => 'error', 'message' => 'Invalid field type'], 400);
        //     }

        //     // Respond with success
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => "$type updated successfully"
        //     ]);
        // } catch (\Throwable $th) {
        //     return response()->json(['status' => 'error', 'message' => 'An error occurred'], 500);
        // }
    }
}
