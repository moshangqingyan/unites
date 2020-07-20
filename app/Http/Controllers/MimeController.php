<?php

namespace App\Http\Controllers;

use App\Account;
use App\Integral;
use App\RedOrBlack;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MimeController extends Controller
{
    /**
     * 积分扣除记录
     */
    public function integralLoss(Request $request)
    {
        // 1获得，2扣除，2使用
        if (!$request->session()->has('user_id')) {
            return redirect('web/index');
        }
        $user_id = $request->session()->get('user_id');
        $page = DB::table('integral')
            ->where('type', 2)
            ->where('userinfo_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('web/integralLoss', ['page' => $page]);
    }

    /**
     * 积分获得记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function integralGet(Request $request)
    {
        if (!$request->session()->has('user_id')) {
        return redirect('web/index');
        }
        $user_id = $request->session()->get('user_id');
        $page = DB::table('integral')
            ->where('type', 1)
            ->where('userinfo_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('web/integralGet', ['page' => $page]);
    }
    /**
     * 用户中心
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userCenter(Request $request, $id = null)
    {
        if ($id) {
            $request->session()->put('user_id', $id);
        } else {
            if ($request->session()->has('user_id')) {
                $id = $request->session()->get('user_id');
            } else {
                return redirect('web/index');
            }
        }
        $data = [];
        $data['user'] = Account::findorfail($id);  //用户基本信息
        $data['rank'] = $this->getRank($id); // 排名
        $data['get'] = $this->integral(1, $id);
        $data['loss'] = $this->integral(2, $id);
        $data['exchange'] = $this->integral(3, $id);

        return view('web/userCenter', $data);
    }

    /**
     * 红榜
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function redList(Request $request, $id = null)
    {
        if ($id) {
            $detail = RedOrBlack::findorfail($id);
            return view('web/detail/rb', ['detail' => $detail]);
        }
        $article = DB::table('redorblack')
            ->where('type', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $text = [
            'green' => '卫生',
            'blue' => '文明',
            'orange' => '法制',
            'd' => '法制',
            'z' => '自治',
            'g' => '农技',
        ];
        return view('web/redList', ['page' => $article, 'text' => $text]);
    }

    /**
     * 黑榜
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blackList(Request $request, $id = null)
    {
        if ($id) {
            $detail = RedOrBlack::findorfail($id);
            return view('web/detail/rb', ['detail' => $detail]);
        }
        $article = DB::table('redorblack')
            ->where('type', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $text = [
            'green' => '卫生',
            'blue' => '文明',
            'orange' => '法制',
            'd' => '法制',
            'z' => '自治',
            'g' => '农技',
        ];
        return view('web/blackList', ['page' => $article, 'text' => $text]);
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
     * 基金排名
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rank()
    {
        $rank = $this->getRank();
        return view('web/rank', ['rank' => $rank]);
    }

    /**
     * 兑换记录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myNotes(Request $request)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('web/index');
        }
        $user_id = $request->session()->get('user_id');
        $page = DB::table('integral')
            ->where('type', 3)
            ->where('userinfo_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('web/notes', ['page' => $page]);
    }

    public function getRank($id = false)
    {
        $all = DB::table('integral')
            ->select(['integral.type', 'integral.integral', 'userinfo.name', 'userinfo.id'])
            ->where('integral.type', '<', 3)
            ->leftJoin('userinfo', 'userinfo.id', '=', 'integral.userinfo_id')
            ->get();
        // 排名
        $rank = [];
        foreach ($all as $v) {
            if (array_key_exists($v->id, $rank)) {
                $v->type == 1 ? $rank[$v->id]['integral'] += $v->integral : $rank[$v->id]['integral'] -= $v->integral;
            } else {
                $v->type == 1 ? $rank[$v->id]['integral'] = $v->integral : $rank[$v->id]['integral'] = -$v->integral;
                $rank[$v->id]['name'] = $v->name;
            }
        }
        if ($id) {
            arsort($rank);
            $i = 1;
            foreach ($rank as $k=>$v) {
                if ($id == $k) {
                    return $i;
                }
                $i++;
            }
return 1;
        }
        arsort($rank);
        return $rank;
    }

    public function integral($type, $id)
    {
        $count = DB::table('integral')
            ->where('type', $type)
            ->where('userinfo_id', $id)
            ->sum('integral');
        return $count;
    }
}
