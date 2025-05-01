<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
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
        return view('front.page.account.bio');
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
            $gender = $profile->gender == 'L' ? 'Laki-laki' : 'Perempuan'; //
            // Get the user from the database

            Carbon::setLocale('id'); // Set locale to Indonesian
            $date = Carbon::createFromFormat('Y-m-d',  $profile->dob);
            $tgl = $date->translatedFormat('l, j F Y');
            return json_encode([
                'id' => $userAuth->id,
                'nama' => $user->name,
                'email' => $user->email,
                'jk' =>  $gender ?? '',
                'tgl' => $tgl  ?? '',
                'hp' => $profile->hp ?? ''
            ]);
        } catch (\Throwable $th) {
            abort(404);
        }
    }
    public function save(Request $request)
    {
        // $data = $request->all();
        // if ($data) {
        //     return response()->json(['success' => true, 'message' => 'Data updated successfully']);
        // }




        try {
            // Authenticate the user
            $userAuth = auth()->user();
            if (!$userAuth) {
                return redirect()->route('login');
            }            // // Get user and profile data
            // $user = User::find($userAuth->id);
            // $profile = UserProfiles::find($userAuth->id);
            User::updateOrCreate([
                'id' => $userAuth->id
            ], [
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
            UserProfiles::updateOrCreate([
                'id' => $userAuth->id
            ], [
                'gender' => $request->input('jk'),
                'dob' => $request->input('tgl'),
                'hp' => $request->input('hp')
            ]);
            // Respond with success
            return response()->json([
                'status' => 'success',
                'message' => "Data updated successfully"
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 500);
        }
    }
}
