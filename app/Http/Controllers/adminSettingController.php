<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminSettingController extends Controller
{
    public function AllSettings(){
        $recaptcha_is_on=DB::table('admin_settings')->where('id',1)->get('recapcha')->first();
        return view('admin.adminSettings', ['recaptcha' => $recaptcha_is_on]);
    }

    public function saveSettings(Request $request){
        $recapcha=$request->input('adminsettings');
       if($recapcha){
        DB::table('admin_settings')->where('id', 1)->update(['recapcha' => true]);
        return back()->with(['success'=>"AdminController is enabled"]);
       }else{
        DB::table('admin_settings')->where('id', 1)->update(['recapcha' => false]);
        return back()->with(['success'=>"AdminController is disabled"]);
       }
    }
}
