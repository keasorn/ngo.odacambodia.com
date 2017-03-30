<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\NgoUserModel;

Route::group(['middleware' => ['web','ngoIsLogin']], function () {

    Route::get('/ngo/report/individual_project_preview', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/report/individual_project_preview')->with($data);
    });

    Route::get('/report/coredetail/report_core_detail', function (Request $request) {
        $data=array(
            'RID'=>$request->RID
        );
        return view('/ngo/report/coredetail/report_core_detail')->with($data);
    });


});