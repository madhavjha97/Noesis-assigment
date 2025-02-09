<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

abstract class Controller
{
    //
    public function shareFlashMessages()
    {
        return [
            'flash' => [
                'success' => Session::get('success'),
                'error' => Session::get('error'),
            ]
        ];
    }
}
