<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\Post;
class googleRecapchaController extends Controller
{

    public function recapchaPost(){
    $recaptcha = new ReCaptcha(config('services.recaptcha.secret'));

$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$remoteIp = $_SERVER['REMOTE_ADDR'];

$response = $recaptcha->verify($gRecaptchaResponse, $remoteIp);

if ($response->isSuccess()) {
    // Valid reCAPTCHA response, proceed with your post request logic here
} else {
    // Invalid reCAPTCHA response, handle the error accordingly
    $errors = $response->getErrorCodes();
}
    }
}
