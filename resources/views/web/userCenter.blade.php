<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">

</head>
<body style="background-color: #f3f3f3;">
<div class="layui-bg-orange" style="width: 100%; height: 200px;"></div>
<div style="width: 88%; height: 220px; margin-left: 5%; background-color: #ffffff; border-radius: 10px; border:2px solid #efae05; margin-top: -90px;background-image: url('./images/lang.png');background-repeat: no-repeat;background-size: 100%;background-position: bottom;">
    <div style="width: 100px;height: 100px;border-radius: 60px;border:3px solid #fb800a;margin-left: 34%;margin-top: -50px;background-color: #ffffff; position: relative;">
        <p style="margin-top: 30px; font-size: 1.5em;color: #333;text-align: center;">{{ $user->name }}</p>
        <p style="font-size: 1em;color: #666;text-align: center;">家庭</p>
        <img src="{{ asset('images/yezi.png') }}" style="width: 30px; top: -16px;right: -16px;position: absolute;">
    </div>
    <p style="text-align: center; font-size: 1em;color: #f79807; line-height: 28px; width: 30%; margin-left: 35%;border-bottom: 1px solid #efae05;">
        {{ $user->tags }}</p>
    <div style="width: 90%; margin-left: 5%;">
        <div style="margin-top: 5px;"><p style="line-height: 35px;color: #666; float: left;">综合评价：</p>
            <img src="{{ asset('images/juzi.png') }}" style="width: 20px;float: left;margin: 3px 5px;">
            <img src="{{ asset('images/juzi.png') }}" style="width: 20px;float: left;margin: 3px 5px;">
            <img src="{{ asset('images/juzi.png') }}" style="width: 20px;float: left;margin: 3px 5px;">
            <img src="{{ asset('images/juzi.png') }}" style="width: 20px;float: left;margin: 3px 5px;">
            <img src="{{ asset('images/juzi.png') }}" style="width: 20px;float: left;margin: 3px 5px;">
        </div>
        <div style="clear: both;"></div>
        <div>
            <p style="line-height: 35px;color: #666;">
                <span>团结基金：{{ $get - $loss }}</span>
                <a href="{{ url('web/index/rank') }}">
                    <img src="{{ asset('images/phb.png') }}"
                         style="height: 20px;float: right;margin-top: 7px;margin-right: 2%;">
                </a>
                <span style="float: right; margin-right: 3%;">当前排名：{{ $rank }}</span>
            </p>
        </div>
        <div>
            <p style="line-height: 35px;color: #666;">
                <span>可兑换基金：{{ $get - $loss - $exchange }}</span>
                <a href="{{ url('web/mime/notes') }}">
                    <img src="{{ asset('images/dhjl.png') }}" style="height: 18.5px;float: right;margin-top: 7px;margin-right: 2%;">
                </a>
                <span style="float: right; margin-right: 3%;">已兑换基金：{{ $exchange }}</span>
            </p>
        </div>
    </div>
</div>
<div style="width: 88%; height: 80px; margin-left: 5%; background-color: #ffffff; border-radius: 5px; margin-top: 15px;">
    <div class="unite-point unite-get-point">
        <a href="{{ url('web/mime/integral-get') }}">
            <p style="text-align: center; font-size: 1em;color: #f79807; line-height: 28px; margin-top: 23%;">
                获得基金记录</p>
        </a>
    </div>
    <div class="unite-point unite-loss-point">
        <a href="{{ url('web/mime/integral-loss') }}"><p
                    style="text-align: center; font-size: 1em;color: #f79807; line-height: 28px; margin-top: 23%;">
                扣除基金记录</p></a>
    </div>
</div>
<div style="width: 88%; height: 250px; margin-left: 5%; background-color: #ffffff; border-radius: 5px; margin-top: 15px;margin-bottom: 70px;">
    <p style="border-bottom: 1px solid #efae05; text-align: center;font-size: 1.2em;color: #666;line-height: 45px;">
        八好村民光荣榜</p>
    <div style="width: 100%;">
        <div class="{{ in_array('1', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好卫生</p>
        </div>
        <div class="{{ in_array('2', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好生活</p>
        </div>
        <div class="{{ in_array('3', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好家人</p>
        </div>
        <div class="{{ in_array('4', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好邻居</p>
        </div>
        <div class="{{ in_array('5', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好村民</p>
        </div>
        <div class="{{ in_array('6', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好帮手</p>
        </div>
        <div class="{{ in_array('7', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="line-height: 80px;font-size: 1em;text-align: center;">好心肠</p>
        </div>
        <div class="{{ in_array('8', json_decode($user->ba, true)) ? 'unite-have-honor' : 'unite-no-honor' }}">
            <p style="">好农技</p>
        </div>
    </div>
</div>
{{--<div class="user-center-menu">--}}
{{--<a href="{{ url('web/mime/red-list') }}"><p style="line-height: 40px;font-size: 1.2em;color: #f79807;text-align: center;width: 33%;border-top: 3px solid #f79807;background-color: #fff;float:left;">红黑榜</p></a>--}}
{{--<a href="{{ url('web/memorabilia') }}"><p style="line-height: 40px;font-size: 1.2em;color: #f79807;text-align: center;width: 33%;border-top: 3px solid #f79807;background-color: #fff;float: left;margin-left: 1px;">大事记</p></a>--}}
{{--<a href="zyhd.html"><p style="line-height: 40px;font-size: 1.2em;color: #f79807;text-align: center;width: 33%;border-top: 3px solid #f79807;background-color: #fff;float: left;margin-left: 1px;">志愿活动</p></a>--}}
{{--</div>--}}
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
    <div id="three" class="subMenu text-center" data-src="{{ url('web/volunteer') }}">
        <img class="menu_img" data-imgname="5">
        <div class="menu_name">志愿活动</div>
    </div>
    <div id="four" class="subMenu text-center" data-src="">
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
        $("div .subMenu")[3].click();
    })
</script>
</html>