<?php
namespace App\Http\Controllers\ngo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MyUtility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OwnReportController extends Controller
{

    private $selectedColumns = array();
    private $PRNs = array();

    private $projectDataSet;

    private function buildSelectedColumns(Request $request)
    {

        $ds = DB::table("v_ngo_listing_project_for_own_report_main");

        // fixed column

        $ds = $ds->addSelect("RID");
        $ds = $ds->addSelect("PRN");

        // end if fixed column
        if ($request->chkNGOField == "ON") {
            $ds->addSelect("Acronym");
            $ds->orderBy("Acronym");
        }

        if ($request->chkPNameEField == "ON") {
            $ds->addSelect("PName_E");
        }
        if ($request->chkPDateStartField == "ON") {
            $ds->addSelect("PDateStart");
        }
        if ($request->chkPDateFinishField == "ON") {
            $ds->addSelect("PDateFinish");
        }

        if ($request->chkProjectStatusField == "ON") {
            $ds->addSelect("ProjectStatusName");
        }

        if ($request->chkProjectDateQCompletedField == "ON") {
            $ds->addSelect("ProjectDateQCompleted");
        }
        if ($request->chkIDPNumber == "ON") {
            $ds->addSelect("idpNumber");
        }
        if ($request->chkMinCodeField == "ON") {
            $ds->addSelect("Min_Name_E");
        }
        if ($request->chkProvinceField == "ON") {
            $ds->addSelect("Province");
        }

        if ($request->chkNgoDateCommencedField == "ON") {
            $ds->addSelect("DateCommenced");
        }
        if ($request->chkNgoDateQCompletedField == "ON") {
            $ds->addSelect("NgoDateQCompleted");
        }
        if ($request->chkContactName == "ON") {
            $ds->addSelect("Contact_Name_E");
        }
        if ($request->chkContactPhone == "ON") {
            $ds->addSelect("Tel_No");
        }

        if ($request->chkContactEmail == "ON") {
            $ds->addSelect("eMail");
        }
        if ($request->chkContactTitle == "ON") {
            $ds->addSelect("Contact_Title_E");
        }
        if ($request->chkContactFax == "ON") {
            $ds->addSelect("Fax_No");
        }
        if ($request->chkContactAddress == "ON") {
            $ds->addSelect("Address_1_E");
        }
        if ($request->chkOwn2014Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Own2014");
        if ($request->chkNgo2014Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Other2014");
        if ($request->chkNgo2014Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Ngo2014");
        if ($request->chkTotal2014Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Total2014");

        if ($request->chkOwn2015Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Own2015");
        if ($request->chkNgo2015Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Other2015");
        if ($request->chkNgo2015Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Ngo2015");
        if ($request->chkTotal2015Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Total2015");

        if ($request->chkOwn2016Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Own2016");
        if ($request->chkNgo2016Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Other2016");
        if ($request->chkNgo2016Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Ngo2016");
        if ($request->chkTotal2016Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Total2016");


        if ($request->chkPlan2017Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Plan2017");
        if ($request->chkPlan2018Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Plan2018");
        if ($request->chkPlan2019Field == "ON") $ds = $ds->addSelect("TMP_COLUMN as Plan2019");


        $table = "tmp_ngo_own_report_main";
        DB::insert(DB::raw("CREATE TEMPORARY TABLE " . $table . " as " . $ds->toSql()));

        $i = 0;
        $tmp_ds = DB::table($table)->first();
        foreach ($tmp_ds as $key => $value) {
            $this->selectedColumns[$i] = $key;
            $i++;
        }

        $this->projectDataSet = DB::table($table);
    }

    public function getSelectedColumns()
    {
        return $this->selectedColumns;
    }


    private function makePRNs()
    {
        $ds = $this->projectDataSet->get();
        foreach ($ds as $row) {
            $this->PRNs[$row->PRN] = $row->PRN;
        }
        Session::put("PRNs", $this->PRNs);
    }

    public function getPRNs()
    {

        return Session::get("PRNs");
    }

    public function buildWhere(Request $request)
    {
        $ds = $this->projectDataSet;

        //criteria of project status
        if ($request->chkAllProjectStatus != "ON") {
            if ($request->chkProjectStatus != "") $ds = $ds->whereIn("ProjectStatusName", $request->chkProjectStatus);
        }
        if (($request->chkAllForeignNGO != "ON") || ($request->chkAllCambodianNGO != "ON") || ($request->chkAllAsspciation != "ON")) {
            if ($request->chkNgo != "") $ds = $ds->whereIn("RID", $request->chkNgo);
        }
        //end criteria of project status

        //criteria of sectors
        if ($request->AllSectors != "ON") {
            if ($request->chkSubSectorCriteria != "") {
                $subquery = DB::table("tbl_ngo_project_sector");
                $subquery = $subquery
                    ->whereIn("SubSectorName_E", $request->chkSubSectorCriteria)
                    ->where("SectorYear",">","2012")
                    ->groupBy("PRN")->pluck("PRN");
                $ds = $ds->whereIn("PRN", $subquery);
            }
        }
        //criteria of sectors

        //criteria of type of assistance
        if ($request->chkAllTypeOA != "ON") {
            if ($request->chkTypeOACriteria != "") {

                $subquery = DB::table("tbl_ngo_disbursement_by_project");
                $subquery = $subquery
                    ->whereIn("SubTypeOfAssistance", $request->chkTypeOACriteria)
                    ->groupBy("PRN")->pluck("PRN");

                $ds = $ds->whereIn("PRN", $subquery);

            }
        }
        //end criteria of type assistance

        // criteria of province

        if ($request->chkAllProvince != "ON") {


            if ($request->chkProvinceCriteria != "") {

                $subquery = DB::table("tbl_ngo_new_targetlocation");
                $subquery = $subquery
                    ->whereIn("Province", $request->chkProvinceCriteria)
                    ->groupBy("PRN")->pluck("PRN");

                $ds = $ds->whereIn("PRN", $subquery);

            }

            if ($request->chkNotReportedProvince != "") {

                $provinceQuery = DB::table("tbl_ngo_new_targetlocation")
                    ->groupBy("PRN")->pluck("PRN");

                $projectQuery = DB::table("tbl_ngo_project_main")
                    ->whereNotIn("PRN", $provinceQuery)->pluck("PRN");

                if ($request->chkProvince != "") {
                    $ds = $ds->orWhereIn("PRN", $projectQuery);
                } else {
                    $ds = $ds->WhereIn("PRN", $projectQuery);
                }
            }
        }
        // end of criteria of province


        $this->projectDataSet = $ds;
    }

    public static function getDisbursementDictionary()
    {
        $dataSet = DB::table("v_ngo_sum_amount_disbursement_by_PRN")->orderBy("PRN")->get();
        $dict = array();
        foreach ($dataSet as $row) {
            $key = $row->PRN;
            $value = $row;
            $dict[$key] = $value;
        }
        return $dict;

    }

    public function getDataSet(Request $request)
    {

        $this->buildSelectedColumns($request);
        $this->buildWhere($request);

        $this->makePRNs();
        $page = $request->page;
//        $page=1;
        if ($page == 0) {
            // get() = all records
            return $this->projectDataSet->get();
        } else {
            return $this->projectDataSet->paginate(50);
        }


    }
}
