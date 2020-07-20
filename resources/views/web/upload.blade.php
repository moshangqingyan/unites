<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>

    <style>
        .file {
            position: relative;
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }
        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }
    </style>
</head>
<body style="background-color: #f3f3f3;">
<h3 style="text-align: center">我要上传</h3>
<div style="width: 90%;margin-left: 5%;">
    <form action="{{ url('web/save/thumb/') }}" method="post" enctype="multipart/form-data">
        <div>
            <img width="100%" id="img_show" src="" alt="">
        </div>
        <a href="javascript:void(0);" class="file">选择文件
            <input type="file" name="file" onchange="dd()" accept="image/*" capture="camera"  id="upload">
        </a>
        <p>简单介绍：</p>
        <p>
            <textarea class="form-control" rows="3" style="width: 100%; min-height: 40px" maxlength="30" name="introduce"></textarea>
        </p>
        <p style="display: none"><input type="text" id="url" name="url"></p>
        {{ csrf_field() }}
        {{--<p><input type="button" onclick="dd()" value="登陆"></p>--}}
        <p><button type="submit" class="layui-btn">
               上传图片
            </button></p>
    </form>
</div>
<div style="text-indent: 2em; color: gray; padding: 20px">可以上传图片，配上一个简短的说明，其他人可以给你点赞</div>
</body>
<script>
    @if($bool)
            alert('保存成功');
    @endif

    function dd() {
        var formData = new FormData();
        formData.append("file",$("#upload")[0].files[0]);
        formData.append("_token", '{{ csrf_token() }}');
        $.ajax({
            url : '{{ url('web/AjaxUpload') }}',
            type : 'POST',
            data : formData,
            // 告诉jQuery不要去处理发送的数据
            processData : false,
            // 告诉jQuery不要去设置Content-Type请求头
            contentType : false,
            beforeSend:function(){
                console.log("正在进行，请稍候");
            },
            success : function(responseStr) {
                $("#img_show").attr('src', '/uploads/' + responseStr);
                $("#url").val( responseStr);
                console.log(responseStr);
            },
            error : function(responseStr) {
                console.log(responseStr);
                console.log("error");
            }
        });
    }
</script>
</html>