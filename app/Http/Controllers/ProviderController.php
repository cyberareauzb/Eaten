<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller

{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request,$provider)
    {
        $userSocial = Socialite::driver($provider)->user();
//        dd($userSocial);
        if ($userSocial){
            $user = User::where('email',$userSocial->email)->first();
            if($user){
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }
            $user = User::create(
                [
                    'firstname' =>$userSocial->user['given_name'],
                    'lastname' =>$userSocial->user['family_name'],
                    'email' =>$userSocial->email,
                    'login' =>$userSocial->email,
                    'img' =>$userSocial->user['picture']
                ]
            );
            if ($user){
                Auth::login($user);
                return redirect(RouteServiceProvider::HOME);
            }
            else{
                return redirect()->intended(RouteServiceProvider::HOME)->withErrors(['auth'=>'Authentication failed']);
            }

        }else{
            return redirect()->intended(RouteServiceProvider::HOME)->withErrors(['auth'=>'Authentication failed']);
        }


    }
}

