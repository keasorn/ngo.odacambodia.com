<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\CoreDetailModel;
use App\Http\Controllers\ngo\OwnReportController;

Route::group(['middleware' => ['web','ngoIsLogin']], function () {

    Route::get('/ngo/own_report/design_own_report', function (Request $request) {

        $foreignDsCore = CoreDetailModel::select("RID")
            ->addSelect("Acronym")
            ->addSelect("Org_Name_E")
            ->orderBy("Acronym")
            ->where("TypeCode", "=", "1")
            ->get();

        $cambodianDsCore = CoreDetailModel::select("RID")
            ->addSelect("Acronym")
            ->addSelect("Org_Name_E")
            ->orderBy("Acronym")
            ->where("TypeCode", "=", "2")
            ->get();

        $associationDsCore = CoreDetailModel::select("RID")
            ->addSelect("Acronym")
            ->addSelect("Org_Name_E")
            ->orderBy("Acronym")
            ->where("TypeCode", "=", "3")
            ->get();
        $data=array(
            "foreignDsCore"=>$foreignDsCore,
            "cambodianDsCore"=>$cambodianDsCore,
            "associationDsCore"=>$associationDsCore
        );
        return view('/ngo/own_report/design_own_report')->with($data);
    });
    Route::post('/ngo/own_report/ngo_query_result', function (Request $request) {
//        return $request->all();
//
        Session::put("own_report_request", null);

        $page = 1;
        $request['page'] = $page;
        $request['toExcel']  = false;

        $oc = new OwnReportController();
        $dsOwnReportMain = $oc->getDataSet($request);
        $columns = $oc->getSelectedColumns();

        Session::put("own_report_request", $request->all());


        $data=array(
            'dsOwnReportMain' => $dsOwnReportMain,
            'page' => $page,
            'toExcel' => false,
            'columns'=>$columns,
            'reportTitle' => ""
        );
        return view('/ngo/own_report/ngo_query_result')->with($data);
    });

    Route::get("/ngo/own_report/ngo_query_result", function(Request $request) {

        $page = $request->page;
        $toExcel = $request->toExcel;

        if (Session::get("own_report_request") != null) {

            foreach (Session::get("own_report_request") as $key => $value) {
                $request[$key] = $value;
            }
        }

        $request['page']  = $page;
        $request['toExcel']  = $toExcel;
        if($toExcel==true){
            $reportTitle=$request->reportTitle;
        }else{
            $reportTitle="";
        }

        $oc = new OwnReportController();
        $dsOwnReportMain = $oc->getDataSet($request);
        $columns = $oc->getSelectedColumns();

        Session::put("own_report_request", $request->all());

        $data = array(
            'columns' => $columns,
            'dsOwnReportMain' => $dsOwnReportMain,
            'page' => $page,
            'toExcel' => $toExcel,
            'reportTitle' => $reportTitle
        );


        return view("/ngo/own_report/ngo_query_result")->with($data);


    });

    Route::post("/own_report/detail", function (Request $request){
        return view("ngo.own_report.preview_detail");
    });

    Route::get('/report/preview_project', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('ngo.own_report.project_preview_detail')->with($data);
    });

});