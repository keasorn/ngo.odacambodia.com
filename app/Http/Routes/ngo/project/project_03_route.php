<?php
header('Access-Control-Allow-Origin:*');
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 7:23 AM
 */
use Illuminate\Http\Request;
use App\Models\ngo\NgoUserModel;
use App\Http\Controllers\ngo\project\ProjectStaffController;
use App\Http\Controllers\ngo\project\Project01Controller;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\ngo\project\DisbursementByProjectController;
use App\Models\oda\project\NgoTargetLocationModel;
use App\Http\Controllers\ngo\project\TargetLocationController;
use App\Http\Controllers\ngo\project\ThematicMarkerController;
use App\Models\ngo\NgoProjectDocModel;
use App\Http\Controllers\ngo\project\ProjectDocumentController;
use App\Http\Controllers\ngo\project\ProjectLinkController;

Route::group(['middleware' => ['web', 'ngoIsLogin', 'userNgoOnly']], function () {
    Route::get('/ngo/project/project_03/project_disbursement', function (Request $request) {
        $PRN = $request->PRN;
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/project_disbursement')->with($data);
    });

///////////////////////////////////end project_twg//////////////////////////////////////////////
    Route::get('/ngo/project/project_03/project_staff_insert', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectStaffController();
        $ImpCon->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/projectstaff')->with($data);
    });


    Route::get('/ngo/project/project_03/project_staff_update', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new ProjectStaffController();
        $ImpCon->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/projectstaff')->with($data);
    });

    Route::get('/ngo/project/project_03/project_staff_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectStaffController();
        $ImpCon->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/projectstaff')->with($data);
    });


    Route::get('/ngo/project/project_03/project_staff_delete', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectStaffController();
        $ImpCon->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/projectstaff')->with($data);
    });


    Route::get('/ngo/project/project_03/listing_project_staff', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/projectstaff')->with($data);
    });


    Route::get('/ngo/project/project_03/project_staff_exist', function (Request $request) {
        $recordCount = \App\Models\ngo\ProjectStaffModel::where('PRN', $request->PRN)->where('Year', $request->Year)->count();
        return ($recordCount > 0 ? "true" : "false");
    });

///////////////////////////////////end project_twg//////////////////////////////////////////////


    Route::post('/ngo/project/project_03/project_disbursement', function (Request $request) {
        $PRN = $request->PRN;
        $updateRemark = new Project01Controller();
        $dis = new DisbursementByProjectController();
        $updateRemark->updateRemark($request);
        $dis->insert($request);

        // return $request->all();
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_03/project_disbursement')->with($data);
    }
    );

    Route::get("/ngo/project/project_03/target_location/province_exist", function (Request $request) {
        $tar = new TargetLocationController();
        return $tar->exits($request);

    });
    Route::get("/ngo/project/project_03/target_location/insert", function (Request $request) {
        $tar = new TargetLocationController();
        $tar->insert($request);

        $data = array(
            'PRN' => $request->PRN,
        );

        return view("ngo.project.project_03.target_geographic_form")->with($data);
    });
    Route::get("/dp/data_entry/project_03//target_location/delete", function (Request $request) {
        $tar = new TargetLocationController();
        $tar->delete($request);
        $data = array(
            'PRN' => $request->PRN,
        );
        return view("ngo.project.project_03.target_geographic_form")->with($data);

    });
    Route::get("/dp/data_entry/project_03//target_location/update", function (Request $request) {
        $tar = new TargetLocationController();
        $tar->update($request);
        $data = array(
            'PRN' => $request->PRN,
        );
        return view("ngo.project.project_03.target_geographic_form")->with($data);

    });

    //insert thematic marker on project 02
    Route::post("/dp/data_entry/project_03//thematic_marker/insert", function (Request $request) {
        $thematicMaker = new ThematicMarkerController();
        $saved = $thematicMaker->insert($request);
        $data = array(
            'PRN' => $request->PRN
        );
        return view("ngo.project.project_03.thematic_marker_form")->with($data);

    });

    Route::get("/dp/data_entry/project_03/countProjectDoc", function(Request $request) {

        $result = 0;

        $model = new NgoProjectDocModel();
        $result = $model->where("PRN", "=", $request->PRN)
            ->where("pdfDoc" , "=", $request->pdfDoc)
            ->count();

        return $result;
    }
    );

    Route::post('/ngo/project/project_03/pro_doc/upload', function(Request $request){
        $pro_doc = new ProjectDocumentController();
//        return $request->all();
        $upload=$pro_doc->uploadFile($request);
        if($upload==false){
            return 1;
        }else{
            $data=array(
                "PRN"=>$request->PRN
            );
            return view("ngo.project.project_03.project_doc_form")->with($data);
        }
    });

    Route::get('/ngo/project/project_03/doc_link/delete', function (Request $request) {
        $link=new ProjectDocumentController();
        $link->delete($request);
        $data=array(
            "PRN"=>$request->PRN
        );
        return view("ngo.project.project_03.project_doc_form")->with($data);
    });

    Route::get('/ngo/project/project_03/pro_link/insert', function (Request $request) {
        $link=new ProjectLinkController();
        $link->insert($request);
        $data=array(
            "PRN"=>$request->PRN
        );
        return view("ngo.project.project_03.project_link_doc_form")->with($data);
    });
    Route::get('/ngo/project/project_03/pro_link/update', function (Request $request) {
        $link=new ProjectLinkController();
        $link->update($request);
        $data=array(
            "PRN"=>$request->PRN
        );
        return view("ngo.project.project_03.project_link_doc_form")->with($data);
    });
    Route::get('/ngo/project/project_03/pro_link/delete', function (Request $request) {
        $link=new ProjectLinkController();
        $link->delete($request);
        $data=array(
            "PRN"=>$request->PRN
        );
        return view("ngo.project.project_03.project_link_doc_form")->with($data);
    });

});