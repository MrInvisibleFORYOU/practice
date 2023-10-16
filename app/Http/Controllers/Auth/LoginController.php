<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if(Auth::user()->usertype=="admin"){
            return "admin";
        }else{
            return 'home';
        }
    }

    public function showLoginForm()
    {   

        $recaptcha_is_on=DB::table('admin_settings')->where('id',1)->get('recapcha')->first();
        
        return view('auth.login', ['recaptcha' => $recaptcha_is_on]);
    }


        public function login(Request $request)
        { 
            $recaptcha_is_on=DB::table('admin_settings')->where('id',1)->get('recapcha')->first();
            if($recaptcha_is_on->recapcha){
            $recaptcha = new ReCaptcha(config('services.recaptcha.secret'));
            $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $remoteIp = $_SERVER['REMOTE_ADDR'];
            $RecaptchaResponse= $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if ($RecaptchaResponse->isSuccess()) {
                $this->validateLogin($request);
                if (method_exists($this, 'hasTooManyLoginAttempts') &&
                    $this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);
                    return $this->sendLockoutResponse($request);
                }
                if ($this->attemptLogin($request)) {
                    if ($request->hasSession()) {
                        $request->session()->put('auth.password_confirmed_at', time());
                    }
                    return $this->sendLoginResponse($request);
                }
                $this->incrementLoginAttempts($request);
        
                return $this->sendFailedLoginResponse($request);
            } else {
                $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);   
    }
        }
        else{

            $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
        }
        }
    
}
