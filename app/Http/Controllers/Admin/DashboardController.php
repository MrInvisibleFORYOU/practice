<?php

namespace App\Http\Controllers\Admin;
use app\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function AllUser(){
        $user=User::all();
        return view('admin.users')->with(['users'=>$user]);
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        $roles=Role::all();
        $currentRole= $user->getRoleNames()->first();
        return view('admin.useredit')->with(['user'=>$user,'roles'=>$roles,"currentRole"=>$currentRole]);
    }

    public function saveUser(Request $request, $id){
        $user=User::find($id);
       $password= $request->input('password');
       $hashedPassword=Hash::make($password);
        $user->fill($request->input());
       $user->password=$hashedPassword;
        //save in model_has_permission Also
        $roleName=$request->input('usertype');
       $role=Role::findByName($roleName);
      $user->saveModelRole($user,$role);
        $user->save();
        return redirect('admin/users')->with(['success'=>"User saved succesfully in database"]);
    }

    

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
      
    return redirect('admin/users')->with(['success'=>"User succesfullt deleted from the database"]);
    
     }

     public function createUsers(){
     $roles=Role::all();
       return view('admin.createUser',['roles'=>$roles]);
     }

     function saveCreatedUser(Request $request){
       $user= User::create($request->input());
       $role=$request->input('usertype');
        $user->saveModelRole($user,$role);

        return redirect('admin/users')->with(['success'=>"User created succesfully"]);
     }
}
