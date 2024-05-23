<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class PageController extends Controller
{
    public function welcome(Request $request): View
    {
        return view('welcome');
    }

    public function dashboard(Request $request): View
    {
        return view('pages.dashboard');
    }

    public function locale(Request $request): RedirectResponse
    {
        $locale = $request->query('locale');
        if (in_array($locale, array_keys(config('app.available_locales')))) {
            $request->user()->update(['locale' => $locale]);
            session(['locale' => $locale]);
            App::setLocale($locale);
        } else {
            return back()->with('notification', ['icon' => 'error', 'title' => __('menu.locale'), 'message' => __('notification.locale_not_available')]);
        }

        return back()->with('notification', ['icon' => 'success', 'title' => __('menu.locale'), 'message' => __('notification.locale_success')]);
    }
}
