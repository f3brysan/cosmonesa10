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
                ->addColumn('action', function ($user) {
                    // Initialize the $btn variable
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $user->id . '" data-name="' . $user->name . '" data-original-title="Edit" class="btn btn-danger btn-sm deactive"><i class="ft-slash"></i> Hapus</a>';
                    $btn .= '&nbsp';
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . Crypt::encrypt($user->id) . '" data-name="' . $user->name . '" data-original-title="Edit" class="btn btn-primary btn-sm loginas"><i class="ft-log-in"></i> Login as</a>';
                    // Return the generated action buttons
                    return $btn;
                })
                ->addColumn('role', function ($user) {
                    $role = '';
                    foreach ($user->roles as $item) {
                        if ($item->name == 'superadmin') {
                            $role .= '<span class="badge badge-info">' . $item->name . '</span>';
                        } else {
                            $role .= '<span class="badge badge-warning">' . $item->name . '</span>';
                        }
                    }
                    return $role;
                })
                ->rawColumns(['action', 'role'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('back.master.users.index', compact('roles'));

    }
}
