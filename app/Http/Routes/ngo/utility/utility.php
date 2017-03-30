<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\project\Project01Controller;
use App\Http\Controllers\ngo\CheckLogin;

Route::group(['middleware' => ['web','ngoIsLogin']], function () {

    Route::get("/project_location/get_district", function (Request $request) {
        $data = array(
            'provinceID' => $request->provinceId
        );
        return view('ngo/project/project_01/district')->with($data);
    });



    Route::get("/ngo/project/project_01/project_location/get_commune", function (Request $request) {
        $data = array(
            'districtId' => $request->districtId
        );
        return view('ngo/project/project_01/commune')->with($data);
    });

    Route::get("/ngo/project/project_01/project_location/get_village", function (Request $request) {
        $data = array(
            'communeId' => $request->communeId
        );
        return view('ngo/project/project_01/village')->with($data);
    });

});