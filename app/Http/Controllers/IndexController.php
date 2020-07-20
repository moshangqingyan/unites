<?php

namespace App\Http\Controllers;

use App\Account;
use App\Sign;
use App\Article;
use App\Donation;
use App\Dynamic;
use App\Notice;
use App\Reception;
use App\Models\Compress;
use App\Thumb;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    // TODO 首页：点赞， 个人中心：评分
    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $new = Notice::orderBy('created_at', 'desc')->first();
        $donation = Donation::orderBy('created_at', 'desc')->first();
        $time = date("Y-m-d ") . $this->getWeek();
        return view('web/index', ['time' => $time, 'new' => $new, 'donation' => $donation->id]);
    }

    /**
     *z z志愿活动 列表详情
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function volunteer(Request $request, $id = null)
    {
        if ($id) {
            $detail = Volunteer::findorfail($id);
            return view('web/detail/volunteer', ['detail' => $detail]);
        }
        $article = DB::table('volunteer')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $class = [
            1 => 'layui-bg-green',
            2 => 'layui-bg-blue',
            3 => '',
        ];
        $text = [
            1 => '报名中',
            2 => '活动中',
            3 => '已结束',
        ];
        return view('web/volunteer', ['page' => $article, 'class' => $class, 'text' => $text]);
    }

    /**
     * 动态
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dynamic(Request $request, $id = null)
    {
        if ($id) {
            $detail = Dynamic::findorfail($id);
            return view('web/detail/dynamic', ['detail' => $detail]);
        }
        $article = DB::table('dynamic')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/dynamic', ['page' => $article]);
    }

    /**
     * 通知公告
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notice(Request $request, $id = null)
    {
        if ($id) {
            $detail = Notice::findorfail($id);
            return view('web/detail/notice', ['detail' => $detail]);
        }
        $article = DB::table('notice')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/notice', ['page' => $article]);
    }

    /**
     * 文章 文化
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article(Request $request, $id = null)
    {
        // 1文化大礼堂，2产品大讲堂，3我要学政策
        if ($id) {
            $detail = Article::findorfail($id);
            return view('web/detail/article', ['detail' => $detail]);
        }
        $article = DB::table('article')
            ->where('type', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/article', ['page' => $article]);
    }

    /**、
     * 文章 产品
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product(Request $request, $id = null)
    {
        if ($id) {
            $detail = Article::findorfail($id);
            return view('web/detail/article', ['detail' => $detail]);
        }
        $article = DB::table('article')
            ->where('type', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/product', ['page' => $article]);
    }

    /**
     * 文章 政策
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function policy(Request $request, $id = null)
    {
        if ($id) {
            $detail = Article::findorfail($id);
            return view('web/detail/article', ['detail' => $detail]);
        }
        $article = DB::table('article')
            ->where('type', 3)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/policy', ['page' => $article]);
    }

    /**
     * 我要捐助
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function donation(Request $request, $id = null)
    {
        $detail = Donation::findorfail($id);
        return view('web/detail/donation', ['detail' => $detail]);
    }

    /**
     * 签到
     * @param Request $request
     * @return string
     */
    public function sign(Request $request)
    {
        $name = $request->input('name');
        $reception = new Reception();
        if (!$name) {
            return json_encode([
                'code' => 1,
                'message' => '姓名不能为空'
            ]);
        }
        $is_sign = Reception::where('name', $name)
            ->whereBetween('created_at', [date("Y-m-d"), date("Y-m-d") . " 23:59:59"])
            ->first();
        if ($is_sign) {
            return json_encode([
                'code' => 5,
                'message' => '您今天已经签到了'
            ]);
        }
        $user = Account::where('name', $name)->first();
        if ($user) {
            $reception->userinfo_id = $user->id;
        }
        $reception = new Reception();
        $reception->name = $name;
        $res = $reception->save();
        if (!$res) {
            return json_encode([
                'code' => 2,
                'message' => '保持失败'
            ]);
        }
        return json_encode([
            'code' => 0,
            'message' => '签到成功'
        ]);
    }

    /**
     * 点赞列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function thumbs(Request $request)
    {
        $article = DB::table('thumb')
            ->where('show', 2) // 2显示
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('web/thumbs', ['page' => $article]);
    }

    /**
     * 用户点赞
     * @param Request $request
     * @return array
     */
    public function thumb(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return [
                'code' => 1,
                'message' => '非法请求，id不存在'
            ];
        }
        $res = Thumb::where('show', 2)->where('id', $id)->increment('thumbs');
        return $res ? ['code' => 0, 'message' => '点赞成功'] : ['code' => 2, 'message' => '失败'];
    }

    /**
     * 方法 获取日期，星期
     * @return string
     */
    function getWeek()
    {
        $week_array = array("日", "一", "二", "三", "四", "五", "六");
        return "星期" . $week_array[date("w")];
    }
    public function AjaxUpload(Request $request)
    {
        if ($request->isMethod('post')) {

            $file = $request->file('file');

            // 文件是否上传成功
            if ($file->isValid()) {

                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('YmdHis') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('admin')->put($filename, file_get_contents($realPath));
(new Compress(public_path('uploads') .'/'. $filename, 0.3))
                    ->compressImg(public_path('uploads') .'/'. $filename);
                if ($bool) {
                    return $filename;
                } else {
                    echo 'erret';
                }

            }

        }

//        return view('upload');
    }

    public function save(Request $request)
    {
        $bool = false;
        if ($request->method() == 'POST') {
            $thumb = new Thumb();
            $thumb->url = $request->url;
            $thumb->introduce = $request->introduce;
            $bool = $thumb->save();
        }
        return view('web/upload', ['bool' => $bool]);
    }

    /**
     * 志愿活动报名
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signUp(Request $request, $id)
    {
        $bool = false;
        if ($request->isMethod('post')) {
            $sign = new Sign();
            $sign->volunteer_id = $id;
            $sign->name = $request->input('name');
            $sign->six = $request->input('six');
            $sign->age = $request->input('age');
            $sign->occupation = $request->input('occupation');
            $sign->phone = $request->input('phone');
            $sign->hobby = $request->input('hobby');
            $sign->declaration = $request->input('declaration');
            $res = $sign->save();
            $bool = $res ?: false;
        }
        return view('web/sign', ['bool' => $bool]);
    }
}
