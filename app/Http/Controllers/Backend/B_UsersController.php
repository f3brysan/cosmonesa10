<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\Debugbar\Facades\Debugbar;

class B_UsersController extends Controller
{
    public function index(Request $request)
    {

        $roles = Role::all()->pluck('name');
        $users = User::with('roles')->get();

        if ($request->ajax()) {
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($user) {
                    $name = str_replace(' ', '+', $user->name);
                    $result = '<div class="d-flex justify-content-start align-items-center">
                    <div class="avatar-wrapper">
                      <div class="avatar avatar-sm me-2">
                        <img src="https://ui-avatars.com/api/?name='.$name.'&background=random" alt="Avatar" class="rounded-circle" />
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <a class="text-heading text-truncate fw-medium">'.$user->name.'</a>                      
                    </div>
                  </div>';
                    return $result;
                })
                ->addColumn('status', function ($user) {
                    if ($user->is_active == 0) {
                        $status = '<span class="badge bg-danger">Inactive</span>';
                    }else{
                        $status = '<span class="badge bg-success">Active</span>';
                    }                    
                    return $status;
                })
                ->editColumn('email', function ($user) {
                    $maskEmail = substr($user->email, 0, 3).str_repeat('*', 5).substr($user->email, strpos($user->email, '@'));
                    return $maskEmail;
                })
                ->addColumn('action', function ($user) {
                    // Initialize the $btn variable
                    $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item view" data-id="'.Crypt::encrypt($user->id).'" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> View Details</a>
                      <a class="dropdown-item destroy" data-id="'.Crypt::encrypt($user->id).'" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Deactivate</a>
                    </div>
                  </div>';
                    // Return the generated action buttons
                    return $btn;
                })
                ->addColumn('role', function ($user) {
                    $role = '';
                    foreach ($user->roles as $item) {

                        switch ($item->name) {
                            case 'superadmin':
                                $role .= '<span class="badge bg-label-primary">'.$item->name.'</span>';
                                break;

                            case 'pengelola':
                                $role .= '<span class="badge bg-label-info">'.$item->name.'</span>';
                                break;

                            case 'seller':
                                $role .= '<span class="badge bg-label-success">'.$item->name.'</span>';
                                break;

                            default:
                                $role .= '<span class="badge bg-label-secondary">'.$item->name.'</span>';
                                break;
                        }
                    }
                    return $role;
                })
                ->rawColumns(['action', 'role', 'name', 'status'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('back.master.users.index', compact('roles'));
    }

    public function view($id)
    {
        try {
            // Decrypt the user ID
            $id = Crypt::decrypt($id);

            // Retrieve the user with their roles
            $user = User::with('roles')->find($id);

            // Get the user's role names
            $userRoles = $user->getRoleNames();

            // Return user data and roles in JSON format
            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => $user,
                    'userRoles' => $userRoles
                ]
            ], 200);
        } catch (\Throwable $th) {
            // Return error message in case of exception
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = User::find($request->id);
            $updateRoles = $user->syncRoles($request->roles);

            return response()->json([
                'status' => 'success',
                'data' => $updateRoles
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
    
    public function deactivate(Request $request)
    {
        try {
            // Decrypt the user ID
            $id = Crypt::decrypt($request->id);

            // Retrieve the user
            $user = User::where('id', $id)->first();

            // Toggle the user's is_active status
            $status = $user->is_active == 1 ? 0 : 1;
        
            // Update the user's is_active status
            $update = $user->update(['is_active' => $status]);

            // Return the updated user data in JSON format
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        } catch (\Throwable $th) {
            // Return an error response if an exception occurs
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
