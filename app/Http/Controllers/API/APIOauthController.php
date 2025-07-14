<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserProfiles;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class APIOauthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        // Redirect the user to the Google authentication page.
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            // Get the user from the OAuth provider
            $user = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $finduser = User::where(function ($query) use ($user) {
                $query->where('gauth_id', $user->id)
                      ->orWhere('email', $user->email);
            })->first();

            if ($finduser) {

                if ($finduser->is_active == 0) {
                    return redirect()->route('login')->with('error', 'Your account is not active. Please contact your administrator.');
                }

                // Update the user's email and Google Auth ID if the user exists                
                $update = $finduser->update([                                        
                    'email' => $user->email,                    
                    'gauth_id' => $user->id,                    
                ]);

                // If the user exists, login the user
                $login = Auth::loginUsingId($finduser->id);
               
                // Redirect the user to the correct dashboard
                if ($finduser->hasRole(['superadmin', 'pengelola', 'seller'])) {
                    return redirect()->intended('back/dashboard');
                }

                return redirect('/');
            } else {
                // If the user does not exist, create a new user

                // Generate a random password for the new user
                $password = strstr($user->email, '@', true);

                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',                    
                    'password' => bcrypt($password),
                ]);

                // Create a new user profile for the newly registered user
                $userProfile = UserProfiles::create([
                    'id' => $newUser->id,
                ]);

                // Assign the customer role to the new user
                $newUser->assignRole('customer');

                // Login the new user
                Auth::login($newUser);

                if ($newUser->hasRole(['superadmin', 'pengelola', 'seller'])) {
                    return redirect()->intended('back/dashboard');
                }

                // Redirect the new user to the customer dashboard
                return redirect('/');
            }
        } catch (\Exception $th) {
            // If there is an error, display the error message
            dd($th->getMessage());
        }
    }
}
