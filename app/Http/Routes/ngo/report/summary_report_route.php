<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\ngo\ReportController;
use App\Http\Controllers\MyUtility;

Route::group(['middleware' => ['web', 'ngoIsLogin']], function () {

    Route::get("/ngo/report/summary/project_summary_report_board", function (Request $request) {

        $RIDlist = DB::table("tbl_ngo_core_details")
            ->select("RID")
            ->addSelect("Acronym")
            ->addSelect("Org_Name_E")->get();

        $data = array(
            'RIDlist' => $RIDlist,
        );

        return view("/ngo/report/summary/project_summary_report_board")->with($data);
    });

    Route::post("/ngo/report/summary/project_summary_report_board", function (Request $request) {

        $RID = $request->RID;
        $ProjectStatusName = $request->ProjectStatusName;
        $report = new ReportController();

        $ds = DB::table("tbl_ngo_project_main");
        if ($RID != 0) {
            $ds = $ds->where("RID", "=", $RID);
        }

        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $putListPRNs = $report->putPRNDetail($ds);

        return view("ngo.own_report.preview_detail");
    });

    Route::get("/ngo/report/summary/function/dcount", function (Request $request) {

        $RID = $request->RID;
        $ProjectStatusName = $request->ProjectStatusName;
        $report = new ReportController();

        $ds = DB::table("tbl_ngo_project_main");
        if ($RID != 0) {
            $ds = $ds->where("RID", "=", $RID);
        }

        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }
        return $ds->count();
    });

    Route::get("/ngo/report/summary/summary_disb_board", function (Request $request) {
        return view("/ngo/report/summary/summary_disb_board");
    });

    Route::post("/ngo/report/summary/summary_disbursement_listing_by_ngo_2013", function (Request $request) {

        //  return $request->all();
        $RIDs = $request->cmbNGO;
        $fromDate = $request->txtFromDate;
        $toDate = $request->txtToDate;
        $ProjectStatusName = $request->cmbstatus;
        $ToExcel = $request->ToExcel;
        $dsCore = DB::table("tbl_ngo_core_details");
        $AllNgo = DB::table("tbl_ngo_core_details")->select("RID")->where("TypeCode", "1");

        foreach ($RIDs as $RID) {
            if ($RID == 0) {
                $RIDs = $AllNgo;
            }
        }
        $dsCore = $dsCore->whereIn("RID", $RIDs);

        //return $RIDs;

        $dsCore = $dsCore->get();


        if (($fromDate == "") or ($toDate == "")) {

            $fromDate = "01-Jan-" . date("Y");
            $toDate = date("d-M-Y");
        }
        $fromDate = MyUtility::toMySqlDate($fromDate);
        $toDate = MyUtility::toMySqlDate($toDate);
        $ds = DB::table("v_ngo_disb_by_PRN_subsector_2015");

        $ds = $ds->whereBetween("DateQCompleted", array($fromDate, $toDate))->orderBy("PName_E");


        if ($ProjectStatusName != 0) {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }
        $dsDisbSum = clone $ds;
        $dsDisbSum = $dsDisbSum->select("RID")
            ->addSelect(DB::raw('sum(own2013) AS TotalOwn2013'))
            ->addSelect(DB::raw('sum(other2013) AS TotalOther2013'))
            ->addSelect(DB::raw('sum(ngo2013) AS TotalNgo2013'))
            ->addSelect(DB::raw('sum(total2013) AS Total2013'))
            ->addSelect(DB::raw('sum(own2014) AS TotalOwn2014'))
            ->addSelect(DB::raw('sum(other2014) AS TotalOther2014'))
            ->addSelect(DB::raw('sum(ngo2014) AS TotalNgo2014'))
            ->addSelect(DB::raw('sum(total2014) AS Total2014'))
            ->addSelect(DB::raw('sum(own2015) AS TotalOwn2015'))
            ->addSelect(DB::raw('sum(other2015) AS TotalOther2015'))
            ->addSelect(DB::raw('sum(ngo2015) AS TotalNgo2015'))
            ->addSelect(DB::raw('sum(total2015) AS Total2015'))
            ->addSelect(DB::raw('sum(plan2016) AS TotalPlan2016'))
            ->addSelect(DB::raw('sum(plan2017) AS TotalPlan2017'))
            ->addSelect(DB::raw('sum(plan2018) AS TotalPlan2018'));
        $data = array(
            "dsCore" => $dsCore,
            "fromDate" => $fromDate,
            "toDate" => $toDate,
            "ProjectStatusName" => $ProjectStatusName,
            "ds" => $ds,
            "dsDisbSum" => $dsDisbSum,
        );
        return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2015")->with($data);
    });
    Route::post("/ngo/report/summary/summary_disbursement_listing_by_ngo_2015", function (Request $request) {

        $RIDs = $request->cmbNGO;
        $year = $request->cmbYear;
        $fromDate = $request->txtFromDate;
        $toDate = $request->txtToDate;
        $ProjectStatusName = $request->cmbstatus;
        $ToExcel = $request->ToExcel;



        if($ToExcel != true){
            Session::put("summary_disb_board", $request->all());
        }else{

            $ToEx = Session::get("summary_disb_board");
            $RIDs = $ToEx['cmbNGO'];
         //   return $ToEx;
            $year = $ToEx['cmbYear'];
            $fromDate = $ToEx['txtFromDate'];
            $toDate = $ToEx['txtToDate'];
            $ProjectStatusName = $ToEx['cmbstatus'];
        }

        $dsCore = DB::table("tbl_ngo_core_details");
        foreach ($RIDs as $RID) {
            if ($RID == "") {
                $RIDs = $dsCore->select("RID");
            } elseif ($RID == "0") {
                $RIDs = $dsCore->select("RID")->where("TypeCode", "1");
            } elseif ($RID == "00") {
                $RIDs[] = $dsCore->select("RID")->where("TypeCode", "2");
            } elseif ($RID == "000") {
                $RIDs[] = $dsCore->select("RID")->where("TypeCode", "3");
            }
        }

        $dsCore = $dsCore->whereIn("RID", $RIDs)->orderBy("Acronym");


        $dsCore = $dsCore->get();
        if (($fromDate == "") or ($toDate == "")) {

            $fromDate = "01-Jan-" . date("Y");
            $toDate = date("d-M-Y");
        }

        $sqlFromDate = MyUtility::toMySqlDate($fromDate);
        $sqlToDate = MyUtility::toMySqlDate($toDate);
        $ds = DB::table("v_ngo_disb_PRN");


        $ds = $ds->select("RID")
            ->addSelect("PRN")
            ->addSelect("ProjectStatusName")
            ->addSelect("PName_E");
        if ($year == 2013) {

            $ds = $ds
                ->addSelect("own2013")
                ->addSelect("other2013")
                ->addSelect("ngo2013")
                ->addSelect("total2013");
        }
        if ($year == 2014 || $year == 2013) {

            $ds = $ds
                ->addSelect("own2014")
                ->addSelect("other2014")
                ->addSelect("ngo2014")
                ->addSelect("total2014");
        }
        if ($year  == 2015 || $year == 2014) {
            $ds = $ds
                ->addSelect("own2015")
                ->addSelect("other2015")
                ->addSelect("ngo2015")
                ->addSelect("total2015");
        }

        $ds = $ds
            ->addSelect("plan2016")
            ->addSelect("plan2017")
            ->addSelect("plan2018")
            ->addSelect("plan2018");

        $ds = $ds->whereBetween("DateQCompleted", array($sqlFromDate, $sqlToDate))->orderBy("PName_E");

        if ($ProjectStatusName != 0) {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }
        $ds = $ds->whereIn("RID",$RIDs);
        $dsDisbSum = clone $ds;
        $dsDisbSum = $dsDisbSum->select("RID");
        if ($year == 2013){
            $dsDisbSum = $dsDisbSum
                ->addSelect(DB::raw('sum(own2013) AS TotalOwn2013'))
                ->addSelect(DB::raw('sum(other2013) AS TotalOther2013'))
                ->addSelect(DB::raw('sum(ngo2013) AS TotalNgo2013'))
                ->addSelect(DB::raw('sum(total2013) AS Total2013'));
        }
        if ($year == 2014 || $year == 2013){
            $dsDisbSum = $dsDisbSum
                ->addSelect(DB::raw('sum(own2014) AS TotalOwn2014'))
                ->addSelect(DB::raw('sum(other2014) AS TotalOther2014'))
                ->addSelect(DB::raw('sum(ngo2014) AS TotalNgo2014'))
                ->addSelect(DB::raw('sum(total2014) AS Total2014'));
        }
        if (($year == 2015) || ($year == 2014) || ($year == 2013)){
            $dsDisbSum = $dsDisbSum
                ->addSelect(DB::raw('sum(own2015) AS TotalOwn2015'))
                ->addSelect(DB::raw('sum(other2015) AS TotalOther2015'))
                ->addSelect(DB::raw('sum(ngo2015) AS TotalNgo2015'))
                ->addSelect(DB::raw('sum(total2015) AS Total2015'));
        }
        $dsDisbSum = $dsDisbSum
            ->addSelect(DB::raw('sum(plan2016) AS TotalPlan2016'))
            ->addSelect(DB::raw('sum(plan2017) AS TotalPlan2017'))
            ->addSelect(DB::raw('sum(plan2018) AS TotalPlan2018'));

        $data = array(
            "dsCore" => $dsCore,
            "fromDate" => $fromDate,
            "toDate" => $toDate,
            "ProjectStatusName" => $ProjectStatusName,
            "ds" => $ds,
            "dsDisbSum" => $dsDisbSum,
            "grandTotal" =>  count($RIDs),
            "toExcel" =>  $ToExcel,
        );
        if ($year == 2013) {
            return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2013")->with($data);
        }elseif ($year == 2014) {
            return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2014")->with($data);
        }elseif ($year == 2015) {
            return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2015")->with($data);
        } elseif($year == 2016) {
            return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2016")->with($data);
        } elseif($year == 2017) {
            return view("/ngo/report/summary/summary_disbursement_listing_by_ngo_2017")->with($data);
        }

    });

    Route::get("/ngo/report/summary/select_ngo_status", function (Request $request) {
        $RIDlist = DB::table("tbl_ngo_core_details")
            ->select("RID")
            ->addSelect("Acronym")
            ->orderBy("Acronym")
            ->addSelect("Org_Name_E")->get();
        $fromDate = $request->txtFromDate;
        $toDate = $request->txtToDate;


        if (($fromDate == "") or ($toDate == "")) {
            $fromDate = "01-Jan-2009";
            $toDate = date("d-M-Y");

        }

        $data = array(
            'RIDlist' => $RIDlist,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        );
        return view("/ngo/report/summary/select_ngo_status")->with($data);
    });

});