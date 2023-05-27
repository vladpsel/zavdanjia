<?php

declare(strict_types=1);

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SecurityController extends Controller
{


    public function login()
    {
        return view('security.login', [

        ]);
    }

    public function register()
    {
        return view('security.register', [

        ]);
    }

    public function logout()
    {
        die('logout');
    }
}
