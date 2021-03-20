<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('index', $data);
    }

    //--------------------------------------------------------------------

}
