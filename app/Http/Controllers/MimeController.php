<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MimeController extends Controller
{
    /**
     * 积分扣除记录
     */
    public function integralLoss()
    {
        return view('web/integralLoss');
    }

    /**
     * 积分获得记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function integralGet()
    {
        return view('web/integralGet');
    }
    /**
     * 用户中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userCenter()
    {
        return view('web/userCenter');
    }

    /**
     * 红榜
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redList()
    {
        return view('web/redList');
    }

    /**
     * 黑榜
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blackList()
    {
        return view('web/blackList');
    }

    /**
     * 大事记
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function memorabilia()
    {
        return view('web/memorabilia');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rank()
    {
        return view('web/rank');
    }

    public function myNotes()
    {
        return view('web/notes');
    }
}
