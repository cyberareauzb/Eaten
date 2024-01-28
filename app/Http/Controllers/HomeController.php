<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptcha()
    {
        return view('myCaptcha');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(LoginRequest $request)
    {
        $validator = request()->validate(
            [
                'login' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ],
            ['captcha.captcha' => 'Invalid captcha code.']
        );
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME)->withErrors($validator);

        //        dd("You are here :) .");
        // return redirect()->route('/login', ['request' => $request]);


        // return redirect()->action(
        //     [AuthenticatedSessionController::class, 'store'], ['request' => $request]
        // );
        // Route::post('/login', [AuthenticatedSessionController::class, 'store'], ['request' => $request]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
