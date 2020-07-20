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
<body class="bodybg">
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
        <span style="float: left; padding-left: 20px;color: #999999;margin-top: 3px;">{{ $time }}   </span>
    </div>
    <div class="layui-col-xs6 layui-col-sm6 layui-col-md6">
        <span class="unite-sign" id="unite-sign" >签到</span>
    </div>
</div>
<p class="unite-p" style="margin-top: 10px;">
    <span class="unite-new">通知公告</span>
    <span class="unite-span-text" style="height: 1em; width: 70%;display: inline-block">
        <marquee direction="left"><a href="{{ url('web/notice/' . $new->id) }}">{{ $new->title }}</a></marquee>
    </span>
</p>

<div class="layui-container">
    <div class="layui-row">
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/notice') }}">
            <img src="{{ asset('images/tonggao.png') }}" alt="">
            <span>团结有通告</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/dynamic') }}">
            <img src="{{ asset('images/dongtai.png') }}" alt="">
            <span>团结新动态</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/mime/red-list') }}">
            <img src="{{ asset('images/honghei.png') }}" alt="">
            <span>团结红黑榜</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/volunteer') }}">
            <img src="{{ asset('images/zhiyuan.png') }}" alt="">
            <span>团结志愿者</span>
        </div>
    </div>
    <div class="layui-row">
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/thumbs') }}">
            <img src="{{ asset('images/dianzan.png') }}" alt="">
            <span>我要点个赞</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/donation/' . $donation) }}">
            <img src="{{ asset('images/juanzeng.png') }}" alt="">
            <span>我要做捐赠</span>
        </div>
        <div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/policy') }}">
            <img src="{{ asset('images/zhengce.png') }}" alt="">
            <span>我要学政策</span>
        </div>
        {{--<div class="layui-col-xs3 layui-col-sm3 layui-col-md3 unite-col unite-a" data-src="{{ url('web/') }}">--}}
            {{--<img src="{{ asset('images/juzi.png') }}" alt="">--}}
            {{--<span>我要干什么</span>--}}
        {{--</div>--}}
    </div>
    {{--志愿活动--}}
    <div class="unite-bar unite-a" data-src="{{ url('web/volunteer') }}">
        <img style="width: 100%; border-radius: 8px;" src="{{ asset('images/zyyj.png') }}"/>
        {{--<a class="unite-a-title">明天星期六了</a>--}}
        {{--<p><a href="{{ url('web/user-center') }}">点击查看详情>>></a></p>--}}
    </div>
    <div class="layui-row">
        {{--// 文化大礼堂--}}
        <div class="layui-col-xs6 unite-col6 unite-padding-right unite-a" data-src="{{ url('web/article') }}">
            <img src="{{ asset('images/whdjt.png') }}" alt="" class="unite-img">
        </div>
        {{--产业大讲堂--}}
        <div class="layui-col-xs6 unite-col6 unite-padding-left unite-a" data-src="{{ url('web/product') }}">
            <img src="{{ asset('images/cydjt.png') }}" alt="" class="unite-img">
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

<div id="sign">
    <div style="padding: 10px 20px">

            <input type="text" id="name" name="title" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">

    </div>
</div>
{{--底部导航栏结束--}}
</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/layer.js') }}"></script>
<script type="text/javascript">
    //            轮播小点
    //    var bullets = document.getElementById('position').getElementsByTagName('li');

    var banner = Swipe(document.getElementById('mySwipe'), {
        auto: 4000,
        continuous: true,
        disableScroll: false,
        callback: function (pos) {
//            轮播小点
//            http://www.unites.com/js/theme/default/layer.css?v=3.1.1
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
<script>
$("#unite-sign").click(function () {
    layer.open({
        type: 1,
        title: '签到',
        closeBtn: 0,
        shadeClose: true,
        skin: 'yourclass',
        content: $("#sign"),
        btn: ['确定','取消'],//按钮
        yes: function(index){
            var name = $("#name").val();
            if (!name) {
                layer.msg('请填写签到姓名');
                return false;
            }

            $.ajax({
                url:"{{ asset('web/user/sign') }}",    //请求的url地址
                dataType:"json",   //返回格式为json
                async:true,//请求是否异步，默认为异步，这也是ajax重要特性
                data:{"name": name},    //参数值
                type:"get",   //请求方式
                beforeSend:function(){
                    //请求前的处理
                },
                success:function(req){
                    //请求成功时处理
                    layer.msg(req.message);
                },
                complete:function(){
                    //请求完成的处理
                },
                error:function(){
                    //请求出错处理
                    layer.msg('失败');
                }
            });
            layer.close(index);
        }
    });
})
</script>
</html>