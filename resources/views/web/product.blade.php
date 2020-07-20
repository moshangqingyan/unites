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
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">产业大讲堂</p>
    <!-- <div class="unite-head-image-product"></div> -->
    <div class="list-group">
        @foreach($page as $item)
            <a href="{{ url('web/product/' . $item->id) }}" class="list-group-item">{{ $item->title }}</a>
        @endforeach
    </div>
    {{ $page->links() }}
</div>

</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>