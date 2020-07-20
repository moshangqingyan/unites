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
<body>
<div class="container">
    <h2 style="text-align: center">{{ $detail->title }}</h2>
    <div class="row"  style="text-align: right; color:gray">

        <div class="col-xs-6">发布者：{{ $detail->publisher }}</div>
        <div class="col-xs-6" style="padding-left: 0">时间：{{ $detail->created_at }}</div>
    </div>
    <div>
        {!! $detail->content !!}
    </div>
</div>

</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>