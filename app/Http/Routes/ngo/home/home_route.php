<?php
header('Access-Control-Allow-Origin:*');
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 7:23 AM
 */
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\AdminController;
use App\Http\Controllers\NgoUserClass;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Resource;

Route::group(['middleware' => ['web','ngoIsLogin']], function () {
    Route::get('/report/report_by_ngo', function () {
        return view('ngo.report.report_by_ngo');
    });
    Route::get('/summary', function () {
        return view('ngo.summary.summary');
    });
    Route::get('/documents', function () {
        return view('ngo.documents.documents');
    });
    Route::get('/user_guide', function () {
        return view('ngo.user_guide.user_guide');
    });
    Route::get('/utilities', function () {
        return view('ngo.utilities.utilities');
    });

    Route::get('/ngo/aboutus/aboutus', function () {
        return view('ngo.aboutus.about');
    });
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/cheditor',function (){
        return view('/cheditor');
    });

    Route::get('/', function () {
        $data=array(
            'error'=>'',
        );
        return view('ngo.home.index')->with($data);
    });

    Route::post('/', function (Request $request) {
        $dologin = new AdminController();
        $isOk = $dologin->doLogin($request);
        $data=array(
            'error'=>'Invalid User name or password!',
        );
        if ($isOk) {
            return redirect('/ngo/report/listing_by_lastupdate');
        } else {
            return view('ngo.home.index')->with($data);
        }
    });

    Route::get('/dp/login', function () {
        return view('ngo.login.index');
    });

    Route::get('/relogin', function () {
        return view('ngo.admin.relogin');
    });
    Route::get('/logout', function (Request $request) {
        session()->forget('ngouser');
        return redirect('/');
    });

    Route::get('/ngo/visitor', function(Request $request) {
        $ngoUser = new ngoUserClass();
        $ngoUser->isLogin = false;
        $ngoUser->uid = "Visitor";
        $ngoUser->pwd = "";
        $ngoUser->IsAdmin = "0";
        $ngoUser->RID = "0";
        $request->session()->put("ngouser", $ngoUser);
        return redirect("/ngo/report/listing_by_lastupdate");

    });
});