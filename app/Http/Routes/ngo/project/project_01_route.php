<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\project\Project01Controller;
use App\Http\Controllers\ngo\CheckLogin;
use App\Http\Controllers\ngo\project\ProjectSectorController;
use App\Models\ngo\ProjectSectorModel;

Route::group(['middleware' => ['web', 'ngoIsLogin', 'userNgoOnly']], function () {

    Route::get('/ngo/project/project_01/project_main', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo/project/project_01/information')->with(($data));
    });

    Route::post('/ngo/project/project_01/project_main', function (Request $request) {
      //  return $request->all();
       if ($request->PRN == "<New PRN>") {
            $pro_model = new Project01Controller();
            $newPRN = $pro_model->insert($request);
            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $newPRN)->first();
            $data = array(
                'project' => $project
            );
        } else {
            $pro_model = new Project01Controller();
            $pro_model->update($request);
            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN','=',$request->PRN)->first();
            $data = array(
                'project' => $project
            );
        }
        return view('ngo/project/project_01/information')->with(($data));
    });

    Route::get("/ngo/project/project_01/project_location/listing", function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo/project/project_01/project_location_form')->with($data);
    });

    Route::get("/ngo/project/project_01/project_sector/listing", function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.project.project_01.form_sector')->with($data);
    });

    Route::get("/ngo/project/project_01/project_location/insert_project_location", function (Request $request) {
        $projectInfo = new Project01Controller();

        if ($projectInfo->insertProLocation($request)) {

            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
            $data = array(
                'project' => $project
            );
            return view('ngo/project/project_01/project_location_form')->with($data);
        } else {
            return false;
        };
    });

    Route::get("/ngo/project/project_01/project_location/update_project_location", function (Request $request) {
        $projectInfo = new Project01Controller();
        if ($projectInfo->uploadProLocation($request)) {

            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
            $data = array(
                'project' => $project
            );
            return view('ngo/project/project_01/project_location_form')->with($data);
        } else {
            return 0;
            return false;
        };
    });
    Route::get("/ngo/project/project_01/project_location/delete_project_location", function (Request $request) {
        $projectInfo = new Project01Controller();
        if ($projectInfo->deleteProLocation($request)) {

            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
            $data = array(
                'project' => $project
            );
            return view('ngo/project/project_01/project_location_form')->with($data);
        } else {
            return false;
        };
    });


    Route::get("/ngo/project/project_01/project_location/delete_checked_project_location", function (Request $request) {
        $projectInfo = new Project01Controller();

        if ($projectInfo->deleteChedkedProLocation($request)) {

            $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
            $data = array(
                'project' => $project
            );
            return view('/ngo/project/project_01/project_location_form')->with($data);
        } else {
            return false;
        };
    });
    Route::get("/ngo/project/project_01/project_location/get_sub_sector", function (Request $request) {
        $data = array(
            'sectorCode' => $request->sectorCode
        );
        return view('ngo.project.project_01.form_sub_sector')->with($data);
    });
    Route::get("/ngo/project/project_01/project_location/insert", function (Request $request) {

        $projectSector = new ProjectSectorController();
        $projectSector->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.project.project_01.form_sector')->with($data);
    });


    Route::get("/ngo/project/project_01/project_location/update", function (Request $request) {

        $projectSector = new ProjectSectorController();
        $projectSector->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.project.project_01.form_sector')->with($data);
    });
    Route::get("/ngo/project/project_01/project_location/delete", function (Request $request) {

        $projectSector = new ProjectSectorController();
        $projectSector->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.project.project_01.form_sector')->with($data);
    });
    Route::get("/ngo/project/project_01/project_location/delete_checked", function (Request $request) {

        $projectSector = new ProjectSectorController();
        $projectSector->deleteChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.project.project_01.form_sector')->with($data);
    });
    Route::get("/ngo/project/project_01/project_sector/exist", function (Request $request) {

        $recordCount = ProjectSectorModel::where('PRN', $request->PRN)->where('SubSectorName_E', $request->SubSectorName_E)->count();

        return ($recordCount > 0 ? "true" : "false");

    });

    Route::get("/ngo/project/project_01/project_location/exist", function (Request $request) {

        $recordCount = \App\Models\ngo\ProjectLocationModel::where('ProjectID', $request->PRN)->where('villageID', $request->cmbVillageLocation)->count();

        return ($recordCount > 0 ? "true" : "false");

    });
});