<?php

namespace Config;

class Auth extends \Myth\Auth\Config\Auth
{
    public $views = [
        'login' => '\App\Views\Auth\login',
        'register' => '\App\Views\Auth\register',
        'forgot' => 'Myth\Auth\Views\forgot',
        'reset' => 'Myth\Auth\Views\reset',
        'emailForgot' => 'Myth\Auth\Views\emails\forgot',
        'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];
}
