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
        $time = date("Y-m-d ") . $this->getWeek();
        return view('web/index', ['time' => $time]);
    }

    public function volunteer()
    {
        return view('web/volunteer');
    }

    public function dynamic()
    {
        return view('web/dynamic');
    }

    public function article()
    {
        return view('web/article');
    }

    public function product()
    {
        return view('web/article');
    }

    public function policy()
    {
        return view('web/article');
    }

    function getWeek()
    {
        $week_array = array("日", "一", "二", "三", "四", "五", "六");
        return "星期" . $week_array[date("w")];
    }

}
