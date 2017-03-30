<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\ngo\ReportController;
use App\Http\Controllers\MyUtility;

Route::group(['middleware' => ['web', 'ngoIsLogin']], function () {

    Route::get('/ngo/report/report_core', function (Request $request) {

        $NgoStatusId = $request->NgoStatusId;
        $numberOfProject = null;
        if ($NgoStatusId == "") {
            $numberOfProject = DB::table("v_ngo_listing_core_details")
                ->orderBy("Acronym");
            $sum_projects = DB::table("v_ngo_listing_core_details")
                ->sum("number_of_projects");
        } else {
            $numberOfProject = DB::table("v_ngo_listing_core_details")
                ->orderBy("Acronym")
                ->where("NGOStatusName", "=", $NgoStatusId);
            $sum_projects = DB::table("v_ngo_listing_core_details")
                ->where("NGOStatusName", "=", $NgoStatusId)
                ->sum("number_of_projects");

        }
        if ($request->print != true) {
            $numberOfProject = $numberOfProject->paginate(50);
        } else {
            $numberOfProject = $numberOfProject->get();
        }
        $data = array(
            'report_by_ngo' => $numberOfProject,
            'CountAllPRN' => $sum_projects,
            'NgoStatusId' => $NgoStatusId,
            'page' => 1
        );

        if ($request->print) {
            $data["print"] = "report_by_ngo_form";
            $data["page"] = "0";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/report_by_ngo')->with($data);
        }
    });

    Route::get('/ngo/report/listing_by_ngo', function (Request $request) {
        $ProjectStatusId = $request->ProjectStatusId;
        $coreDetailLookUp = CoreDetailModel::select("RID")
            ->addSelect("Acronym")
            ->orderBy("Acronym")
            ->get();
        if ($ProjectStatusId != "") {
            $projects = ProjectMainModel::where("RID", "=", $request->RID)->where("ProjectStatusName", "=", $ProjectStatusId)->orderBy("PName_E")->get();
        } else {
            $projects = ProjectMainModel::where("RID", "=", $request->RID)->orderBy("PName_E")->get();
        }
        $data = array(
            "RID" => $request->RID,
            "coreDetailLookUp" => $coreDetailLookUp,
            "projects" => $projects,
            "ProjectStatusId" => $ProjectStatusId
        );
        if ($request->print) {
            $data["print"] = "listing_by_ngo";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_ngo')->with($data);
        }
    });


    Route::get("/own_report/detail", function (Request $request) {
        $report = new \App\Http\Controllers\ngo\ReportController();
        $putListPRNs = $report->getProjectDetail($request->RID);
        return view("ngo.own_report.preview_detail");
    });

    Route::get("/own_report/detail_by_status", function (Request $request) {
        $report = new \App\Http\Controllers\ngo\ReportController();
        $putListPRNs = $report->getProjectDetailByStatus($request->ProjectStatusName);
        return view("ngo.own_report.preview_detail");
    });

    Route::get("/ngo/report/print/print_report_by_ngo", function (Request $request) {
        $NgoStatusId = $request->NgoStatusId;
        if ($NgoStatusId == "") {
            $numberOfProject = DB::table("v_ngo_listing_core_details")
                ->orderBy("Acronym")
                ->get();
            $sum_projects = DB::table("v_ngo_listing_core_details")
                ->sum("number_of_projects");
        } else {
            $numberOfProject = DB::table("v_ngo_listing_core_details")
                ->orderBy("Acronym")
                ->where("NGOStatusName", "=", $NgoStatusId)
                ->get();
            $sum_projects = DB::table("v_ngo_listing_core_details")
                ->where("NGOStatusName", "=", $NgoStatusId)
                ->sum("number_of_projects");
        }
        $data = array(
            'report_by_ngo' => $numberOfProject,
            'CountAllPRN' => $sum_projects,
            'NgoStatusId' => $NgoStatusId,
            'page' => "0"
        );
        if ($request->print) {
            $data["print"] = "print_report_by_ngo";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view("/ngo/report/print/print_report_by_ngo")->with($data);
        }
    });

    Route::get('/ngo/report/search_project/report_by_ngo_type', function (Request $request) {
        $NgoStatusId = $request->NgoStatusId;
        $ProjectStatus = $request->ProjectStatus;
        $data = array(
            'NgoStatusId' => $NgoStatusId,
            'ProjectStatus' => $ProjectStatus,
        );
        if ($request->print) {
            $data["print"] = "report_by_ngo_type";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/report_by_ngo_type')->with($data);
        }
    });
    Route::get('/ngo/report/search_project/report_by_ngo_status', function (Request $request) {
        $rp = new ReportController();
        $dictPRNByStatus = $rp->getPRNByStatus();
        $dictRIDByStatus = $rp->getRIDByStatus();

        $totalAllPRN = DB::table("v_ngo_count_PRN_by_ngo_status")->sum("countPRN");
        $totalAllRID = DB::table("v_ngo_count_RID_by_status")->sum("countRID");

        $data = array(
            "dictPRNByStatus" => $dictPRNByStatus,
            "dictRIDByStatus" => $dictRIDByStatus,
            "totalAllRID" => $totalAllRID,
            "totalAllPRN" => $totalAllPRN
        );

        if ($request->print) {
            $data["print"] = "report_by_ngo_status";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/report_by_ngo_status')->with($data);
        }
    });

    Route::get('/ngo/report/search_project/listing_by_projectstatus', function (Request $request) {
        if ($request->print) {
            $data["print"] = "listing_by_projectstatus";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_projectstatus');
        }
    });

    Route::get('/ngo/report/search_project/listing_by_province', function (Request $request) {
        $ProjectStatusId = $request->ProjectStatusId;
        $ProvinceId = $request->ProvinceId;
        $dsProvince = DB::table("province")->where("ProvinceID", "<>", "90")->lists("Province", "ProvinceID");
        if ($ProvinceId != 0 && $ProvinceId != 99) {
            $dsProvinceId = DB::table("province")->where("ProvinceID", "=", $ProvinceId)->lists("Province", "ProvinceID");
        } elseif ($ProvinceId == 99) {
            $dsProvinceId[99] = "(Not Reported)";
        } else {
            $dsProvinceId = $dsProvince;
            $ProvinceId = 0;
            $dsProvinceId[99] = "(Not Reported)";
        }
        $data = array(
            "dsProvince" => $dsProvince,
            "ProvinceId" => $ProvinceId,
            "ProjectStatusName" => $ProjectStatusId,
            "dsProvinceId" => $dsProvinceId,
            "ProvinceId" => $ProvinceId
        );
        if ($request->print) {
            $data["print"] = "listing_by_province";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_province')->with($data);
        }
    });

    Route::get("/ngo/report/search_project/listing_by_province/detail", function (Request $request) {
        $report = new \App\Http\Controllers\ngo\ReportController();

        $ProjectStatusName = $request->ProjectStatusName;
        $ProvinceId = $request->ProvinceId;
        $putListPRNs = $report->getProjectDetailByProvince($ProjectStatusName, $ProvinceId);
        return view("ngo.own_report.preview_detail");
    });

    Route::get('/ngo/report/search_project/listing_by_duration', function (Request $request) {
        $ProjectStatusName = $request->ProjectStatusId;
        $durationType = MyUtility::n2z($request->Duration);
        if ($ProjectStatusName == "") {
            $ProjectStatusName = 1;
        }
        if ($ProjectStatusName != 0) {
            $dsProjectStatusName = [$ProjectStatusName];
        } else {
            $dsProjectStatusName = [1, 2, 3, 4, 5,];
        }
        $data = array(
            'ProjectStatusName' => $ProjectStatusName,
            'dsProjectStatusName' => $dsProjectStatusName,
            'durationType' => $durationType
        );
        if ($request->print) {
            $data["print"] = "listing_by_duration";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_duration')->with($data);
        }
    });

    Route::get('/ngo/report/search_project/listing_by_type_of_assistance', function (Request $request) {
        $ds = DB::table("v_ngo_PRN_type_of_assistance");
        $TypeOfAssistance = $request->TypeOfAssistance;
        $ProjectStatusName = $request->ProjectStatusId;
        if ($ProjectStatusName == "") {
            $ProjectStatusName = 1;
        }

        if ($ProjectStatusName != 0) {
            $ds = DB::table("v_ngo_PRN_type_of_assistance")->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $ds = $ds->orderBy("Acronym");
        $data = array(
            'ds' => $ds,
            'TypeOfAssistance' => $TypeOfAssistance,
            'ProjectStatusName' => $ProjectStatusName
        );

        if ($request->print) {
            $data["print"] = "listing_by_type_of_assistance";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_type_of_assistance')->with($data);
        }
    });

    Route::get('/ngo/report/search_project/report_by_project_mou', function (Request $request) {
        $ds = DB::table("v_ngo_PRN_project_mou");
        $minds = DB::table("tbl_ministry")->select("Min_ID", "Min_Name_E")->orderBy("Min_Name_E")->get();
        $ProjectStatusName = $request->ProjectStatusId;
        if ($ProjectStatusName == "") {
            $ProjectStatusName = 1;
        }
        if ($ProjectStatusName != 0) {
            $ds = DB::table("v_ngo_PRN_project_mou")->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $ds = $ds->orderBy("Acronym");

        $data = array(
            'ds' => $ds,
            'ProjectStatusName' => $ProjectStatusName,
            'minds' => $minds,
        );

        if ($request->print) {
            $data["print"] = "report_by_project_mou";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/report_by_project_mou')->with($data);
        }
    });

    Route::get('/ngo/report/search_project/listing_by_sector', function (Request $request) {
        $ds = DB::table("v_ngo_listing_PRN_sub_sector");
        $dsCount = DB::table("v_ngo_PRN_sector_code");


        $subSectorCode = MyUtility::e2z($request->subSectorCode);

        $ProjectStatusName = $request->ProjectStatusId;
        if ($ProjectStatusName == "") {
            $ProjectStatusName = 1;
        }
        $mainSectorValue = substr($subSectorCode, 0, 1);
        $sectorValue = substr($subSectorCode, 0, 3);
        $subSectorValue = substr($subSectorCode, 0, 5);
        if (strlen($subSectorCode) < 5) {
            $subSectorValue = 0;
        }

        if ($ProjectStatusName != 0) {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
            $dsCount = $dsCount->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        if ($subSectorValue != 0) {
            $ds = $ds->where("SubSectorName_E", "=", $subSectorValue);
        }


        $report = new ReportController();
        $dsMainSector = DB::table("tbl_main sector")->get();
        $dsSector = DB::table("primary aid sector")
            ->select("SectorCode")
            ->addSelect("MainSector")
            ->addSelect("SectorName_E");
        $dsSubsector = DB::table("aid sub-sector")
            ->select("SectorCode")
            ->addSelect("subSectorCode")
            ->addSelect("SubSectorName_E");
        $request->session()->put("display", "none");

        $countPRNBySubSector = $report->getCountPRNBySubSector($ds);
        $countPRNBySector = $report->getCountPRNBySector($dsCount);

        $data = array(
            'dsMainSector' => $dsMainSector,
            'dsSector' => $dsSector,
            'dsSubSector' => $dsSubsector,
            'countPRNBySubSector' => $countPRNBySubSector,
            'countPRNBySector' => $countPRNBySector,
            'subSectorCode' => $subSectorValue,
            'sectorCode' => $sectorValue,
            'mainSectorCode' => $mainSectorValue,
            'ProjectStatusName' => $ProjectStatusName,
        );

        if ($request->print) {
            $data["print"] = "listing_by_sector";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_sector')->with($data);
        }

    });

    Route::get('/ngo/report/sub-listing_by_sector', function (Request $request) {
        $subSectorCode = MyUtility::e2z($request->subSectorCode);
        $ds = DB::table("v_ngo_listing_PRN_sub_sector")->where("SubSectorName_E", $subSectorCode)->get();
        $data = array(
            'ds' => $ds,
        );
        return view("/ngo/report/sub-listing_by_sector")->with($data);
    });

    Route::get("/ngo/report/search_project/listing_by_sector/detail", function (Request $request) {
        $report = new \App\Http\Controllers\ngo\ReportController();

        $dsPRN = DB::table("v_ngo_listing_PRN_sub_sector")->select("PRN");
        if ($request->subSectorCode != "") {
            $dsPRN = $dsPRN->where("SubSectorName_E", $request->subSectorCode);
        }
        if ($request->sectorCode != "") {
            $dsPRN = $dsPRN->where("SectorCode", $request->sectorCode);
        }
        if ($request->ProjectStatusName != 0) {
            $dsPRN = $dsPRN->where("ProjectStatusName", $request->ProjectStatusName);
        }
        $putListPRNs = $report->putPRNDetail($dsPRN);

        return view("ngo.own_report.preview_detail");
    });

    Route::get('/ngo/report/search_project/external_listing_by_sector', function (Request $request) {
        $sectorCode = $request->sector;
        $countPRN = $request->countPRN;

        $ProjectStatusName = $request->ProjectStatusName;

        $SectorName_E = DB::table("primary aid sector")
            ->where("SectorCode", $sectorCode)->first()->SectorName_E;

        $dsSubsector = DB::table("aid sub-sector")
            ->addSelect("subSectorCode")
            ->addSelect("SubSectorName_E")
            ->where("SectorCode", $sectorCode)
            ->get();


        $ds = DB::table("v_ngo_listing_PRN_sub_sector");

        if ($ProjectStatusName != 0) {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $data = array(
            'ds' => $ds,
            'ProjectStatusName' => $ProjectStatusName,
            'SectorName_E' => $SectorName_E,
            'countPRN' => $countPRN,
            'dsSubsector' => $dsSubsector,
        );
        return view("ngo.report.external_listing_by_sector")->with($data);
    });

    Route::get('/ngo/report/search_project/listing_by_twg', function (Request $request) {

        $ProjectStatusName = $request->ProjectStatusId;
        if ($ProjectStatusName == "") {
            $ProjectStatusName = 1;
        }
        $report = new ReportController();

        $dsTwg = DB::table("tbl_oda_twg");
        $ds = DB::table("v_ngo_listing_PRN_twg");

        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $dsTwg = $report->getTwgDs($dsTwg);
        $countPRNByTwg = $report->getCountPRNByTwg($ds);

        $data = array(
            'ProjectStatusName' => $ProjectStatusName,
            'dsTwg' => $dsTwg,
            'ds' => $ds,
            'countPRNByTwg' => $countPRNByTwg,
        );

        if ($request->print) {
            $data["print"] = "listing_by_twg_form";
            return view('/ngo/report/print/print_form')->with($data);
        } else {
            return view('/ngo/report/search_project/listing_by_twg')->with($data);
        }
    });

    Route::get('/ngo/report/search_project/sub-listing_by_twg', function (Request $request) {

        $twg_id = $request->twg_id;
        $ProjectStatusName = $request->ProjectStatusId;

        $ds = DB::table("v_ngo_listing_PRN_twg");;
        if ($twg_id != "") {
            $ds = $ds->where("TWG", "=", $twg_id);
        } else {
            $ds = $ds->whereNull("TWG");
        }
        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }
        $ds = $ds->get();
        $data = array(
            'ds' => $ds,
        );
        return view('/ngo/report/search_project/sub-listing_by_twg')->with($data);
    });

    Route::get("/ngo/report/search_project/sub-listing_by_twg/detail", function (Request $request) {
        $report = new \App\Http\Controllers\ngo\ReportController();
        $twg_id = $request->twg_id;
        $ProjectStatusName = $request->ProjectStatusId;

        $ds = DB::table("v_ngo_listing_PRN_twg");;
        if ($twg_id != "") {
            $ds = $ds->where("TWG", "=", $twg_id);
        } else {
            $ds = $ds->whereNull("TWG");
        }
        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }

        $putListPRNs = $report->putPRNDetail($ds);

        return view("ngo.own_report.preview_detail");
    });

    Route::get("/ngo/report/search_project/external_sub-listing_by_twg", function (Request $request) {

        $report = New ReportController();
        $twg_id = $request->twg_id;
        $dsTwg = DB::table("tbl_oda_twg");

        $dsTwg = $report->getTwgDs($dsTwg);

        $ProjectStatusName = $request->ProjectStatusId;

        $ds = DB::table("v_ngo_listing_PRN_twg");;
        if ($twg_id != "") {
            $ds = $ds->where("TWG", "=", $twg_id);
        } else {
            $ds = $ds->whereNull("TWG");
        }
        if ($ProjectStatusName != "0") {
            $ds = $ds->where("ProjectStatusName", "=", $ProjectStatusName);
        }
        $ds = $ds->get();
        $data = array(
            'ds' => $ds,
            'ProjectStatusName' => $ProjectStatusName,
            'Twg' => $dsTwg[$twg_id],
        );
        return view('/ngo/report/search_project/external_sub-listing_by_twg')->with($data);
    });

    Route::get('/ngo/report/listing_by_lastupdate', function (Request $request) {

        $report = New ReportController();

        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;
        $TypeCode = $request->TypeCode;


        if (($StartDate == "") or ($EndDate == "")) {

            $StartDate = "01-Jan-" . date("Y");
            $EndDate = date("d-M-Y");

        }


        $StartDateKh = $StartDate;
        $EndDateKh = $EndDate;

        $StartDate = MyUtility::toMySqlDate($StartDate);
        $EndDate = MyUtility::toMySqlDate($EndDate);

        $ds = DB::table("v_ngo_listing_by_last_update")->whereBetween("DateQCompleted", array($StartDate, $EndDate));


        $CountPRNByLastUpdate = $report->getCountPRNByLastUpdate($ds);
        $CountPRNByTypeCode = $report->getCountPRNByTypeCode($ds);
        if ($TypeCode == "All") {
            $ForeignNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 1)->orderBy("Acronym")->get();
            $CambodianNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 2)->orderBy("Acronym")->get();
            $associationDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 3)->orderBy("Acronym")->get();
        } else if ($TypeCode == "1") {
            $ForeignNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 1)->orderBy("Acronym")->get();
            $CambodianNGOsDs = null;
            $associationDs = null;
        } elseif ($TypeCode == "2") {
            $ForeignNGOsDs = null;
            $CambodianNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 2)->orderBy("Acronym")->get();
            $associationDs = null;
        } else {
            $ForeignNGOsDs = null;
            $CambodianNGOsDs = null;
            $associationDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 3)->orderBy("Acronym")->get();
        }

        $StartDate = MyUtility::formatKhDate($StartDate);
        $EndDate = MyUtility::formatKhDate($EndDate);
        $data = array(
            'ds' => $ds,
            'ForeignNGOsDs' => $ForeignNGOsDs,
            'CambodianNGOsDs' => $CambodianNGOsDs,
            'associationDs' => $associationDs,
            'CountPRNByLastUpdate' => $CountPRNByLastUpdate,
            'CountPRNByTypeCode' => $CountPRNByTypeCode,
            'StartDate' => $StartDate,
            'EndDate' => $EndDate,
        );

        return view('/ngo/report/listing_by_lastupdate')->with($data);
    });

    Route::get('/ngo/report/listing_by_lastupdate_sub', function (Request $request) {


        $report = New ReportController();

        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;
        $TypeCode = $request->TypeCode;


        if (($StartDate == "") or ($EndDate == "")) {

            $StartDate = "01-Jan-" . date("Y");
            $EndDate = date("d-M-Y");

        }


        $StartDateKh = $StartDate;
        $EndDateKh = $EndDate;

        $StartDate = MyUtility::toMySqlDate($StartDate);
        $EndDate = MyUtility::toMySqlDate($EndDate);

        //return $EndDate. $StartDate;

        $ds = DB::table("v_ngo_listing_by_last_update")->whereBetween("DateQCompleted", array($StartDate, $EndDate));

        $CountPRNByLastUpdate = $report->getCountPRNByLastUpdate($ds);
        $CountPRNByTypeCode = $report->getCountPRNByTypeCode($ds);
        if ($TypeCode == "All") {
            $ForeignNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 1)->orderBy("Acronym")->get();
            $CambodianNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 2)->orderBy("Acronym")->get();
            $associationDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 3)->orderBy("Acronym")->get();
        } else if ($TypeCode == "1") {
            $ForeignNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 1)->orderBy("Acronym")->get();
            $CambodianNGOsDs = null;
            $associationDs = null;
        } elseif ($TypeCode == "2") {
            $ForeignNGOsDs = null;
            $CambodianNGOsDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 2)->orderBy("Acronym")->get();
            $associationDs = null;
        } else {
            $ForeignNGOsDs = null;
            $CambodianNGOsDs = null;
            $associationDs = DB::table("tbl_ngo_core_details")->where("TypeCode", "=", 3)->orderBy("Acronym")->get();
        }
        $data = array(
            'ds' => $ds,
            'ForeignNGOsDs' => $ForeignNGOsDs,
            'CambodianNGOsDs' => $CambodianNGOsDs,
            'associationDs' => $associationDs,
            'CountPRNByLastUpdate' => $CountPRNByLastUpdate,
            'CountPRNByTypeCode' => $CountPRNByTypeCode,
            'StartDate' => $StartDate,
            'EndDate' => $EndDate,
        );

        return view('/ngo/report/listing_by_lastupdate_sub')->with($data);
    });

    Route::get('/ngo/report/listing_by_lastupdate_sub_listing', function (Request $request) {

        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;
        $RID = $request->RID;


        if (($StartDate == "") or ($EndDate == "")) {

            $StartDate = "01-Jan-" . date("Y");
            $EndDate = date("d-M-Y");

        }


        $StartDateKh = $StartDate;
        $EndDateKh = $EndDate;

        $StartDate = MyUtility::toMySqlDate($StartDate);
        $EndDate = MyUtility::toMySqlDate($EndDate);

        $ds = DB::table("v_ngo_listing_by_last_update")->where("RID",$RID)->whereBetween("DateQCompleted", array($StartDate, $EndDate))->orderBy("PName_E")->get();

        $data = array(
            'ds' => $ds,
        );

        return view('/ngo/report/listing_by_lastupdate_sub_listing')->with($data);
    });

    Route::get('/ngo/report/reports_by_updated', function (Request $request) {
        return view('/ngo/report/reports_by_updated');
    });

    Route::get('/ngo/report/funding_source_listing_by_project', function (Request $request) {
        return view('/ngo/report/funding_source_listing_by_project');
    });
    Route::get('/ngo/ngo/report/source_fund_by_ngo_frame', function (Request $request) {
        return view('/ngo/ngo/report/source_fund_by_ngo_frame');
    });


});