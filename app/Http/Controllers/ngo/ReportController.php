<?php
namespace App\Http\Controllers\ngo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\MyUtility;
use DB;

class ReportController extends Controller
{
    private $PRNs = array();
    private $projectDataSet;
    public $ds;

    public function getProjectDetail($RID)
    {
        $ds = ProjectMainModel::select("PRN")->where("RID", $RID)->get();
        foreach ($ds as $row) {
            $this->PRNs[$row->PRN] = $row->PRN;
        }
        Session::put("PRNs", $this->PRNs);
    }
    public function getRIDList($dsRID)
    {
        $ds = clone $dsRID;
        $ds = $ds -> get();
        $data = array();
        foreach ($ds as $row) {
            $data[$row->RID] = $row->Org_Name_E;
        }

        return $data;

    }

    public function putPRNDetail($dsPRN)
    {
        $dsPRN = clone $dsPRN;
        $dsPRN = $dsPRN->get();
        foreach ($dsPRN as $row) {
            $this->PRNs[$row->PRN] = $row->PRN;
        }
        Session::put("PRNs", $this->PRNs);
    }

    public function getCountPRNBySubSector($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("SubSectorName_E")
            ->addSelect(DB::Raw("count(PRN) as countPRN"))
            ->groupBy("SubSectorName_E")
            ->get();
        $countPRNBySubSector = array();
        foreach ($tmpds as $row) {
            $countPRNBySubSector[$row->SubSectorName_E] = $row->countPRN;
        }
        return $countPRNBySubSector;
    }

    public function getCountPRNBySector($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("SectorCode")
            ->addSelect(DB::Raw("count(PRN) as countPRN"))
            ->groupBy("SectorCode")
            ->distinct()
            ->get();
        $countPRNBySector = array();
        foreach ($tmpds as $row) {
            $countPRNBySector[$row->SectorCode] = $row->countPRN;
        }

        return $countPRNBySector;

    }

    public function getCountPRNByTwg($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("TWG")
            ->addSelect(DB::Raw("count(PRN) as countPRN"))
            ->groupBy("TWG")
            ->distinct()
            ->get();
        $countPRNByTwg = array();
        foreach ($tmpds as $row) {
            $countPRNByTwg[$row->TWG] = $row->countPRN;
        }

        return $countPRNByTwg;

    }

    public function getCountPRNByLastUpdate($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("RID")
            ->addSelect(DB::Raw("count(PRN) as countPRN"))
            ->groupBy("RID")
            ->get();
        $data = array();
        foreach ($tmpds as $row) {
            $data[$row->RID] = $row->countPRN;
        }

        return $data;

    }

    public function getCountPRNByTypeCode($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("TypeCode")
            ->addSelect(DB::Raw("count(PRN) as countPRN"))
            ->groupBy("TypeCode")
            ->get();
        $data = array();
        foreach ($tmpds as $row) {
            $data[$row->TypeCode] = $row->countPRN;
        }

        return $data;

    }

    public function getTwgDs($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("TWG")
            ->addSelect("TWG_ID")
            ->get();
        $data = array();
        foreach ($tmpds as $row) {
            $data[$row->TWG_ID] = $row->TWG;
        }

        $data[""] = "Not Reported";
        return $data;

    }

    public function getForeignNGOsDs($ds)
    {
        $tmpds = clone $ds;
        $tmpds = $tmpds->select("RID")
            ->addSelect("Acronym")
            ->get();
        $data = array();
        foreach ($tmpds as $row) {
            $data[$row->RID] = $row->Acronym;
        }
        return $data;

    }

    public function getProjectDetailByStatus($ProjectStatus)
    {
        $ds = ProjectMainModel::select("PRN")->where("ProjectStatusName", $ProjectStatus)->get();
        foreach ($ds as $row) {
            $this->PRNs[$row->PRN] = $row->PRN;
        }
        Session::put("PRNs", $this->PRNs);
    }

    public function getProjectDetailByProvince($ProjectStatusName, $ProvinceId)
    {
        $selectPRNbyProvince = DB::table("v_ngo_project_location_by_PRN")->select("PRN");
        if ($ProvinceId != 0) {
            $selectPRNbyProvince = $selectPRNbyProvince->where("Province", $ProvinceId);
        }
        if ($ProjectStatusName != 0) {
            $selectPRNbyProvince = $selectPRNbyProvince->where("ProjectStatusName", $ProjectStatusName);
        }
        $selectPRNbyProvince = $selectPRNbyProvince->get();
        foreach ($selectPRNbyProvince as $row) {
            $this->PRNs[$row->PRN] = $row->PRN;
        }
        Session::put("PRNs", $this->PRNs);
    }

    public function getCountProjectByStatus($NgoStatusId, $projectStatus, $key)
    {
        $ds = DB::table("v_ngo_count_by_project_or_ngo_status");

        //fixed selected from view

        $ds = $ds->select("RID")
            ->addSelect("NGOStatusName")
            ->addSelect("Acronym")
            ->addSelect("Org_Name_E")
            ->addSelect("TypeCode");
        //end fixed selected from view
        if ($projectStatus == 1) {
            $ds = $ds->addSelect("OnGoing");
        } elseif ($projectStatus == 2) {
            $ds = $ds->addSelect("Completed");
        } elseif ($projectStatus == 3) {
            $ds = $ds->addSelect("Suspended");
        } elseif ($projectStatus == 4) {
            $ds = $ds->addSelect("Pipeline");
        } elseif ($projectStatus == 5) {
            $ds = $ds->addSelect("NotReported");
        } else {
            $ds = $ds->addSelect("AllProjectStatus");
        }


        if ($NgoStatusId == 0) {
        } else {
            $ds = $ds->where("NGOStatusName", "=", $NgoStatusId);
        }
        $ds = $ds->where("TypeCode", "=", $key)->orderBy("Acronym");
        return $ds->get();
    }

    public function getCountNgoByType($NgoStatusId, $projectStatus, $key)
    {
        $ds = DB::table("v_ngo_count_by_project_or_ngo_status");

        if ($NgoStatusId != 0) {
            $ds = $ds->where("NGOStatusName", $NgoStatusId);
        }
        $recCountByNgoType = $ds->where("TypeCode", $key)->count("RID");
        return $recCountByNgoType;
    }

    public function getCountProjectByType($NgoStatusId, $projectStatus, $key)
    {
        $ds = DB::table("v_ngo_count_by_project_or_ngo_status")->where("TypeCode", $key);

        if ($NgoStatusId != 0) {
            $ds = $ds->where("NGOStatusName", $NgoStatusId);
        }
        if ($projectStatus == 1) {
            $projectsCount = $ds->sum("OnGoing");
        } elseif ($projectStatus == 2) {
            $projectsCount = $ds->sum("Completed");
        } elseif ($projectStatus == 3) {
            $projectsCount = $ds->sum("Suspended");
        } elseif ($projectStatus == 4) {
            $projectsCount = $ds->sum("Pipeline");
        } elseif ($projectStatus == 5) {
            $projectsCount = $ds->sum("NotReported");
        } else {
            $projectsCount = $ds->sum("AllProjectStatus");
        }
        return $projectsCount;
    }

    public function getCountAllProjectByType($NgoStatusId, $projectStatus)
    {
        $ds = DB::table("v_ngo_count_by_project_or_ngo_status");
        if ($NgoStatusId != 0) {
            $ds = $ds->where("NGOStatusName", $NgoStatusId);
        }
        if ($projectStatus == 1) {
            $projectsAllCount = $ds->sum("OnGoing");
        } elseif ($projectStatus == 2) {
            $projectsAllCount = $ds->sum("Completed");
        } elseif ($projectStatus == 3) {
            $projectsAllCount = $ds->sum("Suspended");
        } elseif ($projectStatus == 4) {
            $projectsAllCount = $ds->sum("Pipeline");
        } elseif ($projectStatus == 5) {
            $projectsAllCount = $ds->sum("NotReported");
        } else {
            $projectsAllCount = $ds->sum("AllProjectStatus");
        }
        return $projectsAllCount;
    }

    public function getPRNByStatus()
    {
        $dsPRN = DB::table("v_ngo_count_PRN_by_ngo_status")->get();
        $dictPRNByStatus = array();
        foreach ($dsPRN as $row) {
            $dictPRNByStatus[$row->NGOStatusName] = $row->countPRN;
        }
        return $dictPRNByStatus;
    }

    public function getRIDByStatus()
    {
        $dsRID = DB::table("v_ngo_count_RID_by_status")->get();

        $dictRIDByStatus = array();
        foreach ($dsRID as $row) {
            $dictRIDByStatus[$row->NGOStatusName] = $row->countRID;
        }
        return $dictRIDByStatus;
    }
}
