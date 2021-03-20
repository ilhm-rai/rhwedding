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

    public function searchresult()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/search_result', $data);
    }

    public function productdetail()
    {
        $data = [
            'title' => 'RH Wedding Planner'
        ];

        return view('main/product_detail', $data);   
    }

    //--------------------------------------------------------------------

}
