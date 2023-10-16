<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\adminSettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    return view('welcome');
});

Route::group(['middleware'=>['auth','admin']],function(){

    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
    
        return redirect()->back();
    }); //localization 

    Route::get('/', function () {
        return view('welcome');
    })->name('welcomePage');

    Route::get('/admin',function(){
        return view('layouts.master');
    });

Route::get('admin/permissions',[permissionController::class,"AllPermissions"])->name('adminAllPermissions');
Route::get('admin/permissions/delete/{id}',[permissionController::class,"deletePermission"])->name('adminDeletePermission');
Route::get('admin/permissions/edit/{id}',[permissionController::class,"editPermission"])->name('adminEditPermission');
Route::get('admin/permissions/create',[permissionController::class,'addPermissions'])->name('adminAddPermissions');
Route::post('admin/permssions/create',[permissionController::class,'adminAddPermissionsSave'])->name('adminAddPermssionSave');
Route::get('admin/roles',[RolesController::class,'AllRoles'])->name('adminAllRoles');
Route::get('admin/roles/delete/{id}',[RolesController::class,'adminDeleteRole'])->name('adminDeleteRole');
Route::get('admin/roles/create',[RolesController::class,'AddRoles'])->name('adminAddRole');
Route::post('admin/roles/create',[RolesController::class,'saveCreatedRole'])->name('adminAddRoleSave');
Route::get('admin/roles/haspermissions/{id}',[RolesController::class,'rolesPermissions'])->name('adminRolesHasPermissions');
Route::post('admin/roles/haspermissions/{id}',[RolesController::class,'rolesPermissionsSave'])->name('adminRolesHasPermissionsSave');
Route::get('admin/users',[DashboardController::class,'AllUser'])->name('adminAllUsers');
Route::get('admin/users/create',[DashboardController::class,'createUsers'])->name('adminMakeUser');
Route::post('admin/users/create',[DashboardController::class,'saveCreatedUser'])->name('adminCreateUserSave');
Route::get('admin/users/edit/{id}', [DashboardController::class,'editUser'])->name('adminUserEdit');
Route::put('admin/users/edit/{id}', [DashboardController::class,'saveUser'])->name('adminUserEditSave');
Route::get('admin/users/{id}',[DashboardController::class,'deleteUser'])->name('adminDeleteUser');
Route::get('admin/settings',[adminSettingController::class,'AllSettings'])->name('adminSettings');
Route::post('admin/settings',[adminSettingController::class,'saveSettings'])->name('adminSettingsSave');
});
Route::get('/notAuthorized',function(){
return view('notAuthorized');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('dashboard',function(){
return view('dashboard');
});

