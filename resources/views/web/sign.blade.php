<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <style>
        .layui-form-label {
            padding: 9px; !important;
        }
    </style>
</head>
<body style="background-color: #f3f3f3;">
<div class="container">
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">团结村自愿活动报名</p>
    <form class="layui-form" action="" method="post">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                <input type="text" name="name" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <input type="radio" name="six" value="1" title="男">
                <input type="radio" name="six" value="2" title="女" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">年龄</label>
            <div class="layui-input-block">
                <input type="text" name="age" required  lay-verify="required" placeholder="您的贵庚" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">职业</label>
            <div class="layui-input-block">
                <input type="text" name="occupation" required  lay-verify="required" placeholder="您的职业" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系电话</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required  lay-verify="required" placeholder="您的联系方式" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">兴趣爱好</label>
            <div class="layui-input-block">
                <textarea name="hobby" placeholder="您的爱好" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">志愿宣言</label>
            <div class="layui-input-block">
                <textarea name="declaration" placeholder="您的志愿宣言" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">提交报名</button>
                {{--<button type="reset" class="layui-btn layui-btn-primary">重置</button>--}}
            </div>
        </div>
    </form>

</div>

</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('layui-master/src/layui.js') }}"></script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
//            layer.msg(JSON.stringify(data.field));
//            return false;
        });
    });
    @if($bool)
        alert('报名成功');
    @endif
</script>
</html>