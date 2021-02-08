<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function signIn()
    {
        $data['title'] = 'Sign In';
        return view('auth/sign_in', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('auth/register', $data);
    }
}
