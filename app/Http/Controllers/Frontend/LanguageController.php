<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Validate if the language is supported
        if (!in_array($lang, ['en', 'np'])) {
            return redirect()->back()->with('error', 'Unsupported language.');
        }

        // Set the locale
        App::setLocale($lang);
        Session::put('applocale', $lang);
        
        return redirect()->back()->with('success', 'Language switched successfully.');
    }
} 