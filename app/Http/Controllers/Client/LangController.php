<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function changeLanguage($language, Request $request)
    {
        $request->session()->put('website_language', $language);
        return redirect()->back();
    }
}
