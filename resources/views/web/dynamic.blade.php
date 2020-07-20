<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

</head>
<body style="background-color: #f3f3f3;">
<div class="container">
    <!-- <div class="unite-head-image-dynamic"></div> -->
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">最新动态</p>

    @foreach($page as $item)
    <div class="media unite-a" style="border-bottom: 1px solid gray" data-src="{{ url('web/dynamic/' . $item->id) }}">
        @if($item->img)
        <div class="media-left">
            <a href="#">
                <img style="width: 60px;height: 60px;" class="media-object" src="{{ asset('uploads/' . $item->img) }}" alt="...">
            </a>
        </div>
        @endif
        <div class="media-body">
            <h4 class="media-heading unite-max-height unite-body"> {{ $item->title }}</h4>
            <div class="unite-bottom">{{ $item->publisher }}</div>
        </div>
    </div>
    @endforeach
    {{--<div class="media">--}}
        {{--<div class="media-left">--}}
            {{--<a href="#">--}}
                {{--<img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNzMxM2RlYzcwNCB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE3MzEzZGVjNzA0Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy4xNzE4NzUiIHk9IjM2LjUiPjY0eDY0PC90ZXh0PjwvZz48L2c+PC9zdmc+" alt="...">--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading unite-max-height unite-body"> 需要为页面内容和栅格系统要内容和栅格系统要为页面内容和栅格系统包裹包裹裹裹裹一个</h4>--}}
            {{--<div class="unite-bottom">三次握手吧</div>--}}
        {{--</div>--}}

    {{--</div>--}}

</div>


{{--底部导航栏开始--}}
<div id="menu" class="menu">
    <div id="one" class="subMenu text-center" data-src="{{ url('web/index') }}">
        <img class="menu_img" data-imgname="1">
        <div class="menu_name">首页</div>
    </div>
    <div id="two" class="subMenu text-center" data-src="">
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
<script>
    $(document).ready(function () {
        $("div .subMenu")[1].click();
    })
</script>
</html>