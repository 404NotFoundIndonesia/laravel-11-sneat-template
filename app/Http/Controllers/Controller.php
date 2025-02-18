<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        View::share('menus', [
            [
                'url' => route('dashboard'),
                'name' => __('menu.dashboard'),
                'icon' => 'bx-home-circle',
                'active' => Route::is('dashboard'),
            ],
            [
                'name' => __('menu.user_management'),
                'icon' => 'bx-briefcase-alt-2',
                'active' => Route::is('role.*') || Route::is('user.*'),
                'submenu' => [
                    [
                        'url' => route('role.index'),
                        'name' => __('menu.role'),
                        'active' => Route::is('role.*'),
                    ],
                ],
            ],
            [
                'header' => __('menu.my_setting'),
            ],
            [
                'name' => __('menu.account'),
                'icon' => 'bx-user',
                'active' => Route::is('account.*'),
                'submenu' => [
                    [
                        'url' => route('account.profile.edit'),
                        'name' => __('menu.profile'),
                        'active' => Route::is('account.profile.edit'),
                    ],
                    [
                        'url' => route('account.password.edit'),
                        'name' => __('menu.change_password'),
                        'active' => Route::is('account.password.edit'),
                    ],
                ],
            ],
        ]);
    }

    protected function successNotification(string $key, string $menu): array
    {
        return ['icon' => 'success', 'title' => __($menu), 'message' => __($key, ['menu' => __($menu)])];
    }

    protected function failNotification(string $key, string $menu): array
    {
        return ['icon' => 'error', 'title' => __($menu), 'message' => __($key, ['menu' => __($menu)])];
    }
}
