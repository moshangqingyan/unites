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
<div>
    <div class="row" style="background-color: #f39b39">
        <div class="col-xs-3" style="height: 40px;"></div>
        <div class="col-xs-6 unite-zan">我要点赞</div>
        <div class="col-xs-3 unite-zan unite-a" style="text-align: right;" data-src="{{ url('web/save/thumb/') }}">
            <img style="height: 1.8em;text-align: right;margin-right: 20px;" src="/icon/相机.png" alt="">
        </div>
    </div>
</div>
<div class="container">
    <div class="list-group">
        @foreach($page as $item)
            <div class="unite-list">
                <img class="unite-thumb-image" src="/uploads/{{ $item->url }}" alt="">
                <div class="row" style="max-height: 2.4em; margin: 5px auto">
                    <div class="col-xs-10" style="max-height: 2.4em">{{ $item->introduce }}</div>
                    <div class="col-xs-2" onclick="thumbs({{ $item->id }})"><img style="height: 2.4em" src="/icon/爱心.png" alt=""></div>
                </div>
                {{--<p class="list-group-item-text">这里有一个不超过30各自的描述，不要超过三十哦</p>--}}

            </div>
        @endforeach
    </div>
    {{--<div class="unite-list">--}}
        {{--<img class="unite-thumb-image" src="/uploads/images/product.jpg" alt="">--}}
        {{--<div class="row" style="max-height: 2.4em; margin: 5px auto">--}}
            {{--<div class="col-xs-10" style="max-height: 2.4em">	这里有一个不超过30各自的描述，不要超过三十哦，不要超过三十哦，不要超过三十哦</div>--}}
            {{--<div class="col-xs-2" onclick="thumbs(1)"><img style="height: 2.4em" src="/icon/爱心.png" alt=""></div>--}}
        {{--</div>--}}
        {{--<p class="list-group-item-text">这里有一个不超过30各自的描述，不要超过三十哦</p>--}}

    {{--</div>--}}
    {{ $page->links() }}
</div>

</body>
<script>
    function thumbs(id) {
        $.ajax({
            url : '{{ url('web/user/thumb') }}',
            type : 'get',
            data : {
                id : id
            },
            success : function(response) {
                alert(response.message);
            },
            error : function(responseStr) {
                console.log(responseStr);
                console.log("error");
            }
        })
    }
</script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>