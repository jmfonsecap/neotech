<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * Used to set a language into the app. For example
     * go to /language/ru and it chages to russian.
     *
     */
    public function locale(Request $request)
    {
        app()->setLocale($request['locale']);
        session()->put('locale', $request['locale']);
        return redirect()->back();
    }
}