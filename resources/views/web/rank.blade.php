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
    <p style="text-align: center;font-size: 1.2em;color: #f79807;border-bottom: 1px solid #f79807;width: 100%;line-height: 45px;">团结基金排行榜</p>
    <div style="width: 100%;height: 520px;border-radius: 5px;border:1px solid #f79807;background-color: #ffffff;margin-top: 15px;">
        <div style="width: 100%;height: 35px;">
            <p style="width: 33.1%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: left;">排名</p>
            <p style="width: 33.2%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: left;border-left: 1px solid #ffffff;">户名</p>
            <p style="width: 33.1%;background-color: #f79807;height: 100%;line-height: 35px;color: #ffffff;text-align: center;font-size: 1.2em;float: right;">总基金</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">1</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">李某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">155</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">2</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">王某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">130</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">3</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">张某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">122</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">4</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">柳某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">120</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">5</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">李 某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">109</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">6</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">肖某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">98</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">7</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">张某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">95</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">8</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">赵某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">92</p>
        </div><div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">9</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">黄某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">90</p>
        </div><div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">10</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">陈某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">86</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">11</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">周某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">85</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">12</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">蔡某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">84</p>
        </div>
        <div style="width: 100%;height: 35px;border-bottom: 1px solid #f79807;">
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;">13</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: left;border-left: 1px solid #f79807;border-right: 1px solid #f79807;">高某某</p>
            <p style="width: 33.1%;height: 100%;line-height: 35px;color: #666;text-align: center;font-size: 1em;float: right;">79</p>
        </div>
    </div>
    <div style="width: 30%;height: 30px;background-color: #f79807;border-radius: 5px;margin-left: 35%;">
        <p style="height: 30px;line-height: 30px;width: 100%;text-align: center;color: #ffffff;font-size: 1em;margin-top: 20px;">查看更多…</p>
    </div>
</div>
</body>
</html>