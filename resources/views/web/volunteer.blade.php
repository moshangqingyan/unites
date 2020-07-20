<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>志愿活动</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
</head>
<body style="background-color: #f3f3f3;">
<div style="width: 90%;margin-left: 5%;">
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">志愿活动</p>

    <div class="layui-form">
        <table class="layui-table" lay-skin="line">
        <colgroup>
            <col width="78%">
            <col width="22%">
            <col>
        </colgroup>
        <tbody>
        @foreach($page as $item)
        <tr class="unite-a" data-src="{{ url('web/volunteer/' . $item->id) }}">
            <td>
                <p class="unite-p-title">{{ $item->title }}</p>
                <p class="unite-p-text">{{ $item->publisher }}</p>
                <p class="unite-p-text">{{ $item->start_time }} - {{ $item->end_time }}</p>
            </td>
            <td style="text-align: right">
                {{-- 1报名中，2活动中，3已完成 --}}
                <span class="layui-badge {{ $class[$item->type] }}">{{ $text[$item->type] }}</span>
            </td>
        </tr>
        @endforeach
        {{--<tr class="unite-a" data-src="{{ url('web/volunteer/') }}">--}}
            {{--<td>--}}
                {{--<p class="unite-p-title">扶老人过马路</p>--}}
                {{--<p class="unite-p-text">少年先锋队</p>--}}
                {{--<p class="unite-p-text">2020-07-12 9:00 - 2020-07-12 18:00</p>--}}
            {{--</td>--}}
            {{--<td style="text-align: right">--}}
                {{--<span class="layui-badge layui-bg-blue">活动中</span>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr class="unite-a" data-src="{{ url('web/index/') }}">--}}
            {{--<td>--}}
                {{--<p class="unite-p-title">扶老人过马路</p>--}}
                {{--<p class="unite-p-text">少年先锋队</p>--}}
                {{--<p class="unite-p-text">2020-07-12 9:00 - 2020-07-12 18:00</p>--}}
            {{--</td>--}}
            {{--<td style="text-align: right">--}}
                {{--<span class="layui-badge">已完成</span>--}}
            {{--</td>--}}
        {{--</tr>--}}
        </tbody>
    </table>
    </div>
    {{ $page->links() }}
    {{--<div style="width: 30%;height: 30px;background-color: #f79807;border-radius: 5px;margin-left: 35%;">--}}
        {{--<p style="height: 30px;line-height: 30px;width: 100%;text-align: center;color: #ffffff;font-size: 1em;margin-top: 20px;">查看更多…</p>--}}
    {{--</div>--}}
</div>
{{--底部导航栏开始--}}
<div id="menu" class="menu">
    <div id="one" class="subMenu text-center" data-src="{{ url('web/index') }}">
        <img class="menu_img" data-imgname="1">
        <div class="menu_name">首页</div>
    </div>
    <div id="two" class="subMenu text-center" data-src="{{ url('web/dynamic') }}">
        <img class="menu_img" data-imgname="3">
        <div class="menu_name">最新动态</div>
    </div>
    <div id="three" class="subMenu text-center" data-src="">
        <img class="menu_img" data-imgname="5">
        <div class="menu_name">志愿活动</div>
    </div>
    <div id="four" class="subMenu text-center" data-src="{{ url('web/user-center') }}">
        <img class="menu_img" data-imgname="4">
        <div class="menu_name">用户中心</div>
    </div>
    {{--<div id="five" class="subMenu text-center" data-src="personal.html">--}}
    {{--<img class="menu_img" data-imgname="5">--}}
    {{--<div class="menu_name">测试5</div>--}}
    {{--</div>--}}
</div>
{{--底部导航栏结束--}}
</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script>
    $(document).ready(function () {
        $("div .subMenu")[2].click();
    })
</script>
</html>