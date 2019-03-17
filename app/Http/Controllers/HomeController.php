<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        $wechat = app('wechat.official_account');

        $result = $wechat->qrcode->temporary('foo', 10000);

        $qrcodeUrl = $wechat->qrcode->url($result['ticket']);

        return view('index', compact('qrcodeUrl'));
    }
}
