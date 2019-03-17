<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\WechatScanLogin;
use App\User;

class WechatController extends Controller
{
    public function serve()
    {
        \Log::info('request arrived');

        $app = app('wechat.official_account');
        $app->server->push(function ($message) {
            return "欢迎关注 tinyong90";
        });

        $app->server->push(function ($message) {
            if ($message['Event'] === 'SCAN') {
                $openid = $message['FromUserName'];

                $user = User::where('openid', $openid)->first();

                if ($user) {
                    // TODO: 这里根据情况加入其它鉴权逻辑

                    // 使用 laravel-passport 的个人访问令牌
                    $token = $user->createToken($user->name)->accessToken;

                    // 广播扫码登录的消息，以便前端处理
                    event(new WechatScanLogin($token));

                    \Log::info('haha login');
                    return '登录成功！';
                }

                return '失败鸟';
            } else {
                // TODO： 用户不存在时，可以直接回返登录失败，也可以创建新的用户并登录该用户再返回
                return '登录失败';
            }
        }, \EasyWeChat\Kernel\Messages\Message::EVENT);

        return $app->server->serve();
    }
}
