<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Faculty;
use App\Models\UserFaculty;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Notifications\UserFollowNotification;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function mainIndex()
    {
        return view ('admin.users.main');
    }

    public function index()
    {

        $users = User::with('faculty')->orderBy('authorize', 'Asc')->where(function($query){
            if($facultyId = request('faculty_id')) {
                $query->where('faculty_id', $facultyId);
            }

            if($search = request('search')){

                $query-> where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('middle_name', 'LIKE', "%{$search}%")
                ->orWhere('middle_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereHas('faculty', function($query) use($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
              });
           }

        })
        ->paginate(5);

        $faculties = Faculty::orderBy('name')->pluck('name', 'id')->prepend('All Faculties', '');
        $userPending =  User::whereIn('authorize', [0])->get();
        $userApproved = User::whereIn('authorize', [1])->get();
        $userDeclined = User::whereIn('authorize', [2])->get();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles', 'userDeclined','userApproved','userPending','faculties'));
    }


    public function UserSearch(Request $request)
    {
        $users = User::where('first_name', 'like', '%'.$request->search_string. '%')
        ->orWhere('middle_name', 'like', '%' .$request->search_string. '%')
        ->orderBy('id', 'desc');

        if($users->count() >= 1){
            return view('admin.users.index', compact('users'))->render();
        }else {
            return response()->json([
                'status' => 'nothing found',

            ]);
        }
    }


    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('message', 'This has been admin');
        }
        $user->delete();

        return redirect(route('admin.users.main'))->with('message', 'Role has been deleted');

    }


    public function show(User $user)
    {

        $editauthorize =  User::where('id', $user->id)->first();
        $roles = Role::all();
        $permissions = Permission::all();
        return view ('admin.users.role', compact('editauthorize','user','roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {


        User::where('id', $id)->update([


            'authorize' => $request->input('authorize')  ==  true ? '1' : '2'



        ]);

        return redirect(route('admin.users.main'))->with('message', 'authorize updated');
    }


    public function assignRole(Request $request , User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('message', 'Role exists.');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'Role added.');
    }

    public function removeRole(User $user, Role $role)
    {

        if($user->hasRole($role)){
            ($user->removeRole($role));
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role exists');
    }



    public function givePermission(Request $request , User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoke successfully.');
        }
        return back()->with('message', 'Permission revoke not exist.');


    }

}
