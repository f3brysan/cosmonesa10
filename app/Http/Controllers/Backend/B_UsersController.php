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
                        <img src="https://ui-avatars.com/api/?name=' . $name . '&background=random" alt="Avatar" class="rounded-circle" />
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <a class="text-heading text-truncate fw-medium">' . $user->name . '</a>                      
                    </div>
                  </div>';

                    return $result;
                })
                ->editColumn('email', function ($user) {
                    $maskEmail = substr($user->email, 0, 3) . str_repeat('*', 5) . substr($user->email, strpos($user->email, '@'));
                    return $maskEmail;
                })
                ->addColumn('action', function ($user) {
                    // Initialize the $btn variable
                    $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item view" data-id="' . Crypt::encrypt($user->id) . '" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> View Details</a>
                      <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($user->id) . '" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Deactivate</a>
                    </div>
                  </div>';
                    // Return the generated action buttons
                    return $btn;
                })
                ->addColumn('role', function ($user) {
                    $role = '';
                    foreach ($user->roles as $item) {
                        if ($item->name == 'superadmin') {
                            $role .= '<span class="badge bg-label-primary">' . $item->name . '</span>';
                        } else {
                            $role .= '<span class="badge bg-label-info">' . $item->name . '</span>';
                        }
                    }
                    return $role;
                })
                ->rawColumns(['action', 'role', 'name'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('back.master.users.index', compact('roles'));
    }
}
