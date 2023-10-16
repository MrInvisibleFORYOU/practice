<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    public function AllPermissions(){
        $permissions = Permission::all();
        return view('admin.allPermissions')->with(['permissions'=>$permissions]);
    }

    public function addPermissions(){
        $guardNames = array_keys(config('auth.guards'));
        return view('admin.createPermissions')->with(['guards'=>$guardNames]);
    }

    public function adminAddPermissionsSave(Request $request){
        Permission::create([
            'name' => $request->input('name'),
            'guard_name' =>$request->input('guard_name'),
        ]);
        
        return redirect()->route('adminAllPermissions')->with(['success'=>"New Permissions Added Succesfully"]);
    }

    public function deletePermission($id){
        $permission = Permission::findById($id);
        $permission->delete();
        return redirect()->route('adminAllPermissions')->with(['success'=>" Permissions Deleted Succesfully"]);
    }

    public function editPermission(){

    }
}
