<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body class="unite-background-gray">
<div>
    <p class="unite-title">团结村红黑榜</p>
</div>
<div style="width: 80%;height: 50px;background: url('{{ asset('images/hhbbut.png') }}')top left;background-size: 100%;background-repeat: no-repeat;margin: 1em 10%;">
    <a href="{{ url('web/mime/red-list') }}">
        <p style="width: 50%;text-align: center;font-size: 1.1em;color: #fff;float: left;line-height: 26px;">红&nbsp;&nbsp;&nbsp;榜</p>
    </a>
    <a href="{{ url('web/mime/black-list') }}">
        <p style="width: 50%;text-align: center;font-size: 1.1em;color: #fff;float: right;line-height: 26px;">黑&nbsp;&nbsp;&nbsp;榜</p>
    </a>

</div>
<div style="padding: 0 10%">
    <?php $i = 9312 ?>
    @foreach($page as $item)
    <p class="unite-list FF5722" style="color: gray" data-src="{{ url('web/mime/red-list/' . $item->id) }}">
        &#{{ $i }}; <span class="layui-badge layui-bg-{{ $item->tag }}">{{ $text[$item->tag] }}</span> {{ $item->title }}
    </p>
    <?php $i++ ?>
    @endforeach
    {{--<p class="unite-list FF5722">&#9313; <span class="layui-badge">文明</span> 人生就像是一场修行</p>--}}
    {{--<p class="unite-list FF5722">&#9314; <span class="layui-badge">文明</span> 人生就像是一场修行</p>--}}
    {{--<p class="unite-list FF5722">&#9315; <span class="layui-badge">文明</span> 人生就像是一场修行</p>--}}
    {{--   1-10  --}}
    {{--①    &#9312;     --}}
    {{--②    &#9313;     --}}
    {{--③    &#9314;     --}}
    {{--④    &#9315;     --}}
    {{--⑤    &#9316;     --}}
    {{--⑥    &#9317;     --}}
    {{--⑦    &#9318;     --}}
    {{--⑧    &#9319;     --}}
    {{--⑨    &#9320;     --}}
    {{--⑩    &#9321;     --}}
</div>
</body>

</html>