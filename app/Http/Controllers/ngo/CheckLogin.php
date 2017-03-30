<?php

namespace App\Http\Controllers\ngo;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckLogin extends Controller
{
    public static function isLogin()
    {
            return (session("ngouser")!="");
    }
}
