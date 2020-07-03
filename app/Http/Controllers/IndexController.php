<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web/index');
    }

    public function volunteer()
    {
        return view('web/volunteer');
    }
    public function dynamic()
    {
        return view('web/dynamic');
    }



}
