<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesController extends Controller
{
    public function AllRoles(){
        $roles = Role::all();
        return view('admin.allRoles',['roles'=>$roles]);
    }

    public function AddRoles(){
      
       return view('admin.createRole');
    }


    public function saveCreatedRole(Request $request){
        Role::create(['name' => $request->input('name')]);
        return redirect()->route('adminAllRoles')->with(['success'=>"Roles created succesfully"]);
    }

    public function rolesPermissions($id){
        $role = Role::findById($id);
        $permissions = $role->permissions;
        $Permissions_not_belong_to_role = Permission::whereDoesntHave('roles', function ($query) use ($role) {
            $query->where('role_id', $role->id);
        })->get();

        return view('admin.roleshasPermissions')->with(['hasPermissions'=>$permissions,"rolesHasNotPermissions"=>$Permissions_not_belong_to_role,"roleId"=>$id]);
    }

    public function rolesPermissionsSave(Request $request,$id){
   $permissionArray= $request->except('_token');

   $role = Role::findById($id);
   $role->syncPermissions([$permissionArray]);
    return redirect()->route('adminAllRoles')->with(['success'=>"Permissions Added to role succesfully"]);
    }

    public function adminDeleteRole($id){
        $role = Role::findOrFail($id);
    $role->delete();
    return redirect()->route('adminAllRoles')->with(['success'=>'Role deleted Succesfully']);
    }
}
