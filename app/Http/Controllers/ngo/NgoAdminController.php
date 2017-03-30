<?php

namespace App\Http\Controllers\ngo;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ngo\NgoUserModel;

class NgoAdminController extends Controller
{
    private $isLogin;
    private $uid;
    private $pwd;

    function doLogin(Request $request)
    {
        echo "123";
        return $request->all();

        $ngoUser = NgoUserModel::where('uid', $request->uid)->where('pwd', $request->pwd)->first();
        return $ngoUser;

        if (count($ngoUser) > 0) {
            $this->isLogin = true;
            $this->uid = $request->uid;
            $this->pwd = $request->pwd;
            session()->put('odauser', $ngoUser);
            return redirect('/');
        } else {
            $this->error = "Invalid User name or password!";
            return view('oda.dp.login.index', compact('error'));
        }


    }


}
