<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\NgoUserModel;
use App\Http\Controllers\ngo\CheckLogin;

Route::group(['middleware' => ['web','ngoIsLogin']], function () {
    Route::get('/list/list_of_project', function (Request $request) {
        if($request->RID!=""){
            $RID=$request->RID;
        }else {
            $user = $request->session()->get('ngouser');
            $RID = $user->RID;
        }
        $ngo_pro_list = DB::table('v_ngo_listing_projects_of_data')->where("RID","=",$RID)->orderBy("acronym","ASC")->orderBy("PName_E","ASC");
        $ngo_pro_list = $ngo_pro_list->paginate(20);
        $data = array(
            'RID'=>$RID,
            'ngo_pro_list' => $ngo_pro_list
        );
        return view('ngo.list.list_of_project')->with($data);

    });
    Route::post('/list/list_of_project',function(){
        redirect("list/list_of_project");
    });

    Route::get('/ajax/list_of_project', function (Request $request) {
        $status = explode(",", $request->status);
        if ($request->RID == 0) {
            $ngo_pro_list = DB::table('v_ngo_listing_projects_of_data')->whereIn('ProjectStatusName', $status)->orderBy("acronym","ASC")->orderBy("PName_E","ASC");
        } else {

            $ngo_pro_list = DB::table('v_ngo_listing_projects_of_data')->where("RID", "=", $request->RID)->whereIn('ProjectStatusName', $status)->orderBy("acronym","ASC")->orderBy("PName_E","ASC");
        }
        $ngo_pro_list = $ngo_pro_list->paginate(50);
        $data = array(
            'ngo_pro_list' => $ngo_pro_list
        );
//        return $ngo_pro_list;
        return view('ngo.list.list_form_project')->with($data)->render();
    });
});