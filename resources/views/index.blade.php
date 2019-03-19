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
    <h1 class="title text-center">Laravel Scan Login</h1>
    <h3 class="text-center mb-4">Laravel + laravel-echo + EasyWechat 实现扫码登录示例</h3>

    <template v-if="token">
      <div class="row py-2">
        <h5 class="text-center col-12">当前用户信息</h5>
        <div class="col-8 m-auto">
          <pre>@{{ user }}</pre>
        </div>
      </div>

      <div class="row py-2">
        <h5 class="text-center col-12">当前令牌（token）</h5>

        <div class="col-8 m-auto">
          <pre>
            @{{ token }}
          </pre>
        </div>
      </div>
      <div class="row mt-4">
        <div class="btn btn-danger btn-block" @click="logout">退出登录</div>
      </div>
    </template>

    <template v-else>`
      <div class="row">
        <div class="col-6 m-auto justify-content-center align-items-center d-flex flex-column">
          <img class="qrcode shadow" src="{{ $qrcodeUrl }}" alt="">
          <span class="tips mt-1">使用微信扫码</span>
        </div>
      </div>
    </template>
  </div>
</div>

<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
