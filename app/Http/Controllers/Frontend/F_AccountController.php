<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kiosks;
use App\Models\Address;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\RajaOngkirService;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Certificates;

class F_AccountController extends Controller
{
    //

    public function index()
    {

        $rajaOngkirService = new RajaOngkirService();
        $provinces = $rajaOngkirService->getProvinces();
        return view('front.page.account.index', compact('provinces'));
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

    public function get_tenant()
    {
        $auth = auth()->user();
        $kiosks = Kiosks::join('users', 'kiosks.user_id', '=', 'users.id')
            ->where('kiosks.user_id', $auth->id)
            ->select('kiosks.*', 'users.name as owner_name')
            ->get();
        if ($kiosks->isEmpty()) {
            $data = User::find($auth->id);
            return response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'No kiosks found for this user.'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Kiosks retrieved successfully.',
                'data' => $kiosks
            ]);
        }
    }
    # code...

    public function reg_tenant()
    {

        return view('front.page.tenant.register');
    }
    public function reg_tenant_check()
    {
        // Check if the user already has a kiosk
        $user = User::find(auth()->user()->id);
        $checkKiosk = Kiosks::where('user_id', $user->id)->first();

        if ($checkKiosk) {
            return response()->json([
                'status' => false,
                'message' => 'Anda sudah memiliki tenant.',
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Anda belum memiliki tenant.',
            ]);
        }
    }

    public function reg_tenant_store(Request $request)
    {

        try {
            // Find the authenticated user
            $user = User::find(auth()->user()->id);

            // Construct the API URL to check if the user is a student
            $url = "https://sso.unesa.ac.id/api/profil/email/$user->email";

            // Make a GET request to the API
            $checkStudent = Http::get($url);
            $checkStudent = $checkStudent->json(0);

            // Redirect to tenant registration if user is not a student
            if (empty($checkStudent->userid)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Anda bukan mahasiswa UNESA, silahkan hubungi admin untuk membuat tenant.',
                ]);
            } else {
                $createKiosk = Kiosks::create([
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'description' => $request->desc,
                    'address' => $request->address,
                    'is_verified' => 0
                ]);
                // Update user roles to 'seller' and 'customer'
                $user->syncRoles(['seller', 'customer']);
                // Redirect back to tenant registration
                return response()->json([
                    'status' => true,
                    'message' => 'Kiosks created successfully.',
                    'data' => $createKiosk
                ]);
            }
            // Create a new kiosk with the provided data
            // Uncomment the line below if you want to redirect to tenant registration page
            // return redirect(URL::to('tenant-register'));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
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
    public function get_address()
    {
        try {
            $userAuth = auth()->user();
            $data = Address::where('user_id', $userAuth->id)->first();

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
    public function save_address(Request $request)
    {
        try {
            $rajaOngkirService = new RajaOngkirService();
            $provinces = $rajaOngkirService->getProvinces();
            $cities = $rajaOngkirService->getCities($request->provinces);
            
            $proviceName = '';
            $cityName = '';

            foreach ($provinces as $key => $value) {
                if ($value['id'] == $request->provinces) {
                    $proviceName = $value['name'];
                    break;
                }
            }

            foreach ($cities as $key => $value) {                
                if ($value['id'] == $request->cities) {
                    $cityName = $value['name'];
                    break;
                }
            }

            $userId = auth()->user()->id;            
            $upsert = Address::updateOrCreate(
                ['user_id' => $userId],
                [
                    'province_id' => $request->provinces,
                    'province_name' => $proviceName,
                    'regency_id' => $request->cities,
                    'regency_name' => $cityName,
                    'kodepos' => $request->kodepos,
                    'detail' => $request->address
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
                'data' => $upsert
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th
            ]);
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
                'name' => $request->input('nama'),
                // 'email' => $request->input('email')
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
    public function participation()
    {
        try {
            // Get the authenticated user
            $userAuth = auth()->user();

            // Redirect to login if user is not authenticated
            if (!$userAuth) {
                return redirect()->route('login');
            }
            $data = $userAuth
                ->hasParticipated()
                ->select(
                    'events.id AS event_id',
                    'events.title',
                    'events.slug',
                    'event_date',
                    'users.id AS user_id',
                    'users.name AS fullname',
                    'certificates.id AS certificate_id',
                    'certificates.serial_number',
                    'certificates.pic AS signatory',
                    'is_attended',
                    'issued_at',
                    'valid_until'
                )->get();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

}
