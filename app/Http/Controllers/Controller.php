<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function successNotification(string $key, string $menu): array
    {
        return ['icon' => 'success', 'title' => __($menu), 'message' => __($key, ['menu' => __($menu)])];
    }

    protected function failNotification(string $key, string $menu): array
    {
        return ['icon' => 'error', 'title' => __($menu), 'message' => __($key, ['menu' => __($menu)])];
    }
}
