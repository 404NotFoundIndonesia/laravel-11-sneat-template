<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class PageController extends Controller
{
    public function welcome(Request $request): View {
        return view('welcome');
    }

    public function dashboard(Request $request): View {
        return view('pages.dashboard');
    }

    public function locale(Request $request): RedirectResponse {
        $locale = $request->locale;
        if (in_array($locale, array_keys(config('app.available_locales')))) {
            session(['locale' => $locale]);
            App::setLocale($locale);
        } else {
            return back()->with('notification', ['icon' => 'error', 'title' => 'Bahasa', 'message' => 'Bahasa tidak tersedia!']);
        }

        return back()->with('notification', ['icon' => 'success', 'title' => 'Bahasa', 'message' => 'Berhasil mengganti bahasa!']);
    }
}
