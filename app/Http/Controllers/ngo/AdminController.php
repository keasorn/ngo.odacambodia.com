<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ngo\CheckLogin;
use App\Models\ngo\NgoUserModel;
use DB;

class AdminController extends Controller
{
    private $userName;
    private $isLogin;
    private $password;
    private $IsAdmin;
    private $error;
    private $setSession;
    public function doLogin(Request $request)
    {
        $ngoUser = NgoUserModel::where('uid', $request->uid)->where('pwd', $request->pwd)->first();
        if (count($ngoUser) > 0) {
            $this->isLogin = true;
            $this->uid = $ngoUser->uid;
            $this->pwd = $ngoUser->pwd;
            $this->IsAdmin = $ngoUser->IsAdmin;
            $request->session()->put("ngouser", $ngoUser);
            return true;
        } else {
            $this->error = "Invalid User name or password!";
            return false;
        }
    }

    public function showLogin()
    {
        return view("oda/odaadmin/admin/login");
    }

    public function isLogin()
    {
        return $this->isLogin;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setLogout()
    {
        $this->isLogin = false;
    }

    public function getError()
    {
        $this->error;
    }

    public function setSession()
    {
        session()->put('odaadmin', $this->userName);
    }

    public function clearSession()
    {
        session()->forget('odaadmin');
    }
}