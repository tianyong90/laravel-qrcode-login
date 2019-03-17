<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::guard('api')->user();

        return response()->json($user);
    }
}
