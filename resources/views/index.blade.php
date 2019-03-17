<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <meta name="format-detection" content="telephone=no"/>
    <title>Laravel-Scan-Login</title>
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
</head>
<body>
<div id="app">
    <div class="container pt-5">
        <h1 class="title">Laravel Scan Login</h1>

        @{{ token }}

        <img class="qrcode shadow" src="{{ $qrcodeUrl }}" alt="">

        <button class="btn btn-default">刷新二维码</button>
        <button class="btn btn-primary">登录</button>
    </div>
</div>

<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
