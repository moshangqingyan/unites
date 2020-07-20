<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>团结家园</title>
    <link rel="stylesheet" href="{{ asset('css/layui.css') }}">
</head>
<body style="background-color: #f3f3f3;">
<div style="width: 90%;margin-left: 5%;">
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">扣除基金记录</p>
    <div style="width: 100%;height: 200px;border-radius: 5px;border:1px solid #f79807;background-color: #ffffff;margin-top: 15px;">
        <div style="width: 100%;height: 35px;">
            <p style="width: 33.1%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: left;">时间</p>
            <p style="width: 33.2%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: left;border-left: 1px solid #ffffff;">扣除原因</p>
            <p style="width: 33.1%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: right;">扣除基金</p>
        </div>
        <?php $total = 0 ?>
        @foreach($page as $item)
            <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
                <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">{{ $item->created_at }}</p>
                <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">{{ $item->remark }}</p>
                <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">-{{ $item->inregral }}</p>
                <?php $total += $item->inregral ?>
            </div>
        @endforeach
        {{--<div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">--}}
            {{--<p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">2020-06-05</p>--}}
            {{--<p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">卫生抽查不合格</p>--}}
            {{--<p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">-3</p>--}}
        {{--</div>--}}
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 66.3%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">合计</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;border-left: 1px solid #f79807;">-{{ $total }}</p>
        </div>
    </div>
</div>
</body>
</html>