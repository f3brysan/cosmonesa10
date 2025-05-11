<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class F_AccountController extends Controller
{
    //
    public function index()
    {

        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.account.index');
    }
    /**
     * Display the authenticated user's profile in JSON format.
     *
     * This method retrieves the authenticated user's profile information, 
     * including name, email, gender, date of birth, and phone number, and 
     * returns it as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        try {
            // Get the authenticated user
            $userAuth = auth()->user();

            // Redirect to login if user is not authenticated
            if (!$userAuth) {
                return redirect()->route('login');
            }

            // Retrieve user and profile information from the database
            $user = User::find($userAuth->id);
            $profile = UserProfiles::find($userAuth->id);

            // Determine gender in Indonesian
            $gender = $profile->gender == 'L' ? 'Laki-laki' : 'Perempuan';

            // Set locale for Carbon to Indonesian and format date of birth
            Carbon::setLocale('id');
            $date = $profile->dob ? Carbon::createFromFormat('Y-m-d', $profile->dob)->translatedFormat('l, j F Y') : '';

            // Prepare data array for JSON response
            $data = [
                'id' => $userAuth->id,
                'nama' => $user->name,
                'email' => $user->email,
                'jk' => $gender ?? '',
                'tgl' => $date ?? '',
                'hp' => $profile->hp ?? ''
            ];

            // Return success response with user profile data
            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            // Handle exceptions by returning a 404 error
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
