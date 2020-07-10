<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src='{{ asset('js/hhSwipe.js') }}' type="text/javascript"></script>
    <title>首页</title>
</head>
<body>
<div>
    <img class="unite-header-image" src="{{ asset('images/001.jpg') }}" alt="">
</div>
{{--轮播--}}
<div class="unite-swipe">
    <div class="addWrap">
        <div class="swipe" id="mySwipe">
            <div class="swipe-wrap">
                <div><a href="javascript:;"><img class="img-responsive" src="{{ asset('images/banner.jpg') }}"/></a>
                </div>
                <div><a href="javascript:;"><img class="img-responsive" src="{{ asset('images/banner1.jpg') }}"/></a>
                </div>
                <div><a href="javascript:;"><img class="img-responsive" src="{{ asset('images/banner2.jpg') }}"/></a>
                </div>
            </div>
        </div>

        {{--<ul id="position">--}}
        {{--<li class="cur"></li>--}}
        {{--<li></li>--}}
        {{--<li></li>--}}
        {{--</ul>--}}
    </div>
</div>
<div class="layui-row">
    <div class="layui-col-xs6 layui-col-sm6 layui-col-md6">
        <span class="unite-sign">签到</span>
    </div>
    <div class="layui-col-xs6 layui-col-sm6 layui-col-md6">
        <span style="float: right; padding-right: 20px">{{ $time }}   </span>
    </div>
</div>
<p class="unite-p">
    <span class="unite-new">最新动态</span>
    <span class="unite-span-text">明天是星期六</span>
</p>

<div class="layui-container">
    <div class="layui-row">
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>团结有通告</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/dynamic') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>团结新动态</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/mime/red-list') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>团结红黑榜</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/volunteer') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>团结志愿者</span>
        </div>
    </div>
    <div class="layui-row">
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col" data-src="{{ url('web/') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>我要点个赞</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col" data-src="{{ url('web/') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>我要做捐赠</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col" data-src="{{ url('web/policy') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>我要学政策</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col" data-src="{{ url('web/') }}">
            <img src="{{ asset('images/juzi.png') }}" alt="">
            <span>我要干什么</span>
        </div>
    </div>
    {{--志愿活动--}}
    <div class="unite-bar unite-a" data-src="{{ url('web/volunteer') }}">
        <a class="unite-a-title">明天星期六了</a>
        <p><a href="{{ url('web/user-center') }}">点击查看详情>>></a></p>
    </div>
    <div class="layui-row">
        {{--// 文化大礼堂--}}
        <div class="layui-col-xs6 unite-col6 unite-padding-right unite-a" data-src="{{ url('web/article') }}">
            <img src="{{ asset('images/bar.jpg') }}" alt="" class="unite-img">
        </div>
        {{--产业大讲堂--}}
        <div class="layui-col-xs6 unite-col6 unite-padding-left unite-a" data-src="{{ url('web/product') }}">
            <img src="{{ asset('images/bar.jpg') }}" alt="" class="unite-img">
        </div>
    </div>

    {{--<div class="layui-row">--}}
        {{--<div class="layui-col-xs6 unite-col6 unite-padding-right unite-a" data-src="">--}}
            {{--<img src="{{ asset('images/bar.jpg') }}" alt="" class="unite-img">--}}
        {{--</div>--}}
        {{--<div class="layui-col-xs6 unite-col6 unite-padding-left unite-a">--}}
            {{--<img src="{{ asset('images/bar.jpg') }}" alt="" class="unite-img">--}}
        {{--</div>--}}
    {{--</div>--}}

</div>
<div style="height: 70px"></div>
<div id="content"></div>
{{--底部导航栏开始--}}
<div id="menu" class="menu">
    <div id="one" class="subMenu text-center" data-src="">
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
<script type="text/javascript">
    //            轮播小点
    //    var bullets = document.getElementById('position').getElementsByTagName('li');

    var banner = Swipe(document.getElementById('mySwipe'), {
        auto: 4000,
        continuous: true,
        disableScroll: false,
        callback: function (pos) {
//            轮播小点
//            var i = bullets.length;
//            while (i--) {
//                bullets[i].className = ' ';
//            }
//            bullets[pos].className = 'cur';
        }
    });
    $(document).ready(function () {
        $("div .subMenu")[0].click();
    })
</script>
</html>