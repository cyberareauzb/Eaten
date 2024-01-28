<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function lang_change(Request $request, $lang)
    {
        $langs = array('en', 'uz', 'ru');
        if (in_array($lang, $langs)) {
            session()->put('siteLang', $lang);
        }
        return redirect()->back();
    }
}
