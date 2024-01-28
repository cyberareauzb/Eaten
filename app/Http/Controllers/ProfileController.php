<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $tuman = DB::table('tumen')->get();
        $viloyat = DB::table('regions')->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'region' => $viloyat,
            'tuman' => $tuman
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }




    public function refresh(Request $request){
        $request->request->remove('_token');
        if ($request->request->get('gallery')=='[]'){
            $request->request->remove('gallery');
        }
        if ($request->request->get('img')==''){
            $request->request->remove('img');
        }
       $res = DB::table('users')->where('id',auth()->user()->id)->update($request->all());
       $checkrole = DB::table('users')->where('id',auth()->user()->id)->update(['role' => 'vendor']);
    //   if($res){
    //       return Redirect::route('profile.edit')->with('status', 'profile-updated');
    //   }else{
    //       return Redirect::route('profile.edit')->with('status', 'profile-notupdated');
    //   }
    return ['status' => "Tabriklaymiz, ma'lumot muvaffaqiyatli yangilandi!!! Endi Sizda e'lon joylash imkoniyati mavjud."];
    } 
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
