<?php

namespace App\Controllers;

class Auth extends \Myth\Auth\Controllers\AuthController
{
    public function login()
    {
        // No need to show a login form if the user
        // is already logged in.
        if ($this->auth->check()) {
            $redirectURL = session('redirect_url') ?? '/';
            unset($_SESSION['redirect_url']);

            return redirect()->to($redirectURL);
        }

        // Set a return URL if none is specified
        $_SESSION['redirect_url'] = session('redirect_url') ?? previous_url() ?? '/';

        return view($this->config->views['login'], ['config' => $this->config, 'title' => 'Sign In']);
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('auth/register', $data);
    }
}
