<?php

namespace App\Http\Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Models\ngo\RunningProjectModel;
use App\Models\oda\project\RunningIDModel;

/**
 * Description of MyUtility
 *
 * @author Sreyhuy Leng
 */
class MyUtility extends Controller
{


    public static function getNewPRN($RID)
    {


        $runningModel = RunningProjectModel::find($RID);
        $hasProject = ($runningModel != null);

        $runningNumber = 1;

        if ($hasProject) {
            $runningNumber = $runningModel->RuningNumber + 1;
        } else {

            // for new record
            $runningModel = new RunningProjectModel();
        }

        $runningModel->RID = $RID;
        $runningModel->RuningNumber = $runningNumber;
        $runningModel->save();

        $newPRN = $RID . str_pad($runningNumber, 4, "0", STR_PAD_LEFT);

        return $newPRN;

    }

    // $mySqlDate = Y-m-d --> dd-mm-yyyy
    public static function toKhDate($mySqlDate)
    {


        $mySqlDate = MyUtility::n2e($mySqlDate);
        if ($mySqlDate == "") return "";

        //  echo $mySqlDate;

        $t = ($mySqlDate == "0000-00-00 00:00:00");
        $t |= ($mySqlDate == "00-00-0000 00:00:00");
        $t |= ($mySqlDate == "00-00-0000");
        $t |= ($mySqlDate == "0000-00-00");

        if ($t) {
            return "";
        } else {
            $date = explode(" ", $mySqlDate);
            $date = explode("-", $date[0]);
            return $date[2] . "-" . $date[1] . "-" . $date[0];
        }
    }


    // dd-mm-yyyy --> y-m-d
    public static function toMySqlDate($strDate)
    {

        $mySqlDate = MyUtility::n2e($strDate);
        if ($mySqlDate == "") return "";

        if ($strDate == "00-00-0000") {
            return "";
        } else {
            $date = explode("-", $strDate);

            $day = $date[0];
            $month = $date[1];
            $year = $date[2];

            if (!is_numeric($month)) {

                $month3 = array(
                    'dec' => 12, 'nov' => 11, 'oct' => 10, 'sep' => 9, 'aug' => 8, 'jul' => 7,
                    'jun' => 6, 'may' => 5, 'apr' => 4, 'mar' => 3, 'feb' => 2, 'jan' => 1
                );
                $month = $month3[strtolower($month)];
            }
            return $year . "-" . $month . "-" . $day;
        }
    }


    public static function e2z($str)
    {
        if ($str == "") {
            return 0;
        } elseif ($str == "0.00") {
            return 0;
        } else {
            return $str;
        }
    }

    public static function z2n($str)
    {
        if ($str == "") {
            return null;
        } elseif ($str == "0.00") {
            return null;
        } elseif ($str == "0") {
            return null;
        } else {
            return $str;
        }
    }

    public static function n2z($str)
    {
        if ($str == null) {
            return 0;
        } else {
            return $str;
        }
    }

    public static function n2e($str)
    {
        if ($str == null) {
            return "";
        } else {
            return $str;
        }
    }

    public static function n2v($str, $val)
    {
        if ($str == null) {
            return $val;
        } else {
            return $str;
        }
    }

    public static function getProjectStatusName($status)
    {
        switch ($status) {
            case 1:
                return "On-going";
            case 2:
                return "Completed";
            case 3:
                return "Suspended";
            case 4:
                return "Pipleline";
            case 5:
                return "(Not Reported)";
            case 0:
                return "All";
            default:
                return "";

        }
    }

    public static function getImplementingAgencyName($id)
    {
        if ($id == 1) return "Royal Government of Cambodia (RGC)";
        elseif ($id == 2) return "Development Partner";
        elseif ($id == 3) return "NGO/CSO";
        elseif ($id == 4) return "Private Sector";
        elseif ($id == 5) return "Other";
    }

    public static function setSortIcon($column, $sortColumn, $sortDirection)
    {
        $result = "";
        if ($column == $sortColumn) {
            if ($sortDirection == "asc") {
                $result = "&nbsp;<img src='/images/sort-up.png' height='11'>";
            } else {
                $result = "&nbsp;<img src='/images/sort-down.png' height='11'>";
            }
        }
        return $result;
    }

    public static function getSourceType($idType)
    {
        switch ($idType) {
            case 1:
                return "Bilateral";
            case 2:
                return "Multilateral";
        }
    }

    public static function removeRightComma($str)
    {
        $str = trim($str);

        $len = strlen($str);
        $rChar = substr($str, $len - 1);
        if ($rChar == ",") {
            $str = substr($str, 0, $len - 1);
        }
        return $str;
    }

    public static function getColumnNames($dataSet)
    {
        foreach ($dataSet->first() as $key => $value) {

        }
    }


    public static function getTermOA($termOACode)
    {
        if ($termOACode == "GR") {
            return "Grant";
        } else {
            return "Loan";
        }
    }

    public static function getYesNo($value1, $value2)
    {
        if ($value1 == $value2) {
            return "Yes";
        } else {
            return "No";
        }
    }

    public static function getNgoStatusName($status)
    {
        switch ($status) {
            case 1:
                return "Active";
            case 2:
                return "Close";
            case 3:
                return "Not Reported";
            case 4:
                return "No Active";
            default:
                return "";

        }
    }

    public static function getColFromArray($col, $array)
    {
        if ($array == null) {
            return "";
        } else {
            return $array->$col;
        }
    }

    public static function getRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            $result = "radio_checked.gif";
        } else {
            $result = "radio_unchecked.gif";
        }

        return $result;
    }

    public static function formatThousand($val, $decimals = 0)
    {
        if ($val == 0) {
            return "";
        } else {
            return number_format($val, $decimals);
        }
    }

    public static function getRegistrationWith($min_id)
    {

        $min_name = "NONE";

        switch ($min_id) {
            case 1:
                $min_name = "Council Of Minister";
                break;
            case 2:
                $min_name = "Ministry Of Interior";
                break;
            case 3:
                $min_name = "Ministry Of Foreign Affairs, International Cooperation";
                break;

        }

        return $min_name;

    }

    public static function ajaxPaging($dataset, $eventName)
    {

        if (count($dataset) == 0) {
            return "";
        } else {
            $pageCount = ceil($dataset->total() / $dataset->perPage());

            $result = "";

            if ($pageCount > 1) {
                $result = "<ul class='pagination'>";
                for ($i = 1; $i <= $pageCount; $i++) {
                    if ($dataset->currentPage() == $i) {
                        $result .= "<li class='active'>";
                        $result .= "<span>" . $i . "</span>";
                        $result .= "</li>";
                    } else {
                        $result .= "<li>";
                        $result .= "<a href='#none' onclick='" . $eventName . "(" . $i . ")'>" . $i . "</a>";
                        $result .= "</li>";
                    }

                }
                $result .= "</ul>";
            }

            return $result;

        }
    }

    public static function getCounterpartName($id)
    {
        $str = "";
        switch ($id) {
            case 1:
                $str = "Line Ministry";
                break;
            case 2:
                $str = "Other Government Departments";
                break;
            case 3:
                $str = "Non-Gov Official Bodies";
                break;
            case 4:
                $str = "UN Agencies";
                break;
            case 5:
                $str = "Foregin NGO";
                break;
            case 6:
                $str = "Cambodian NGO";
                break;
            case 7:
                $str = "Other";
                break;
            case 8:
                $str = "No Information";
                break;
            default:
                break;
        }
        return $str;

    }

    public static function obj2n($obj, $proper)
    {
        if (count($obj) > 0) {
            return $obj->$proper;
        } else {
            return null;
        }
    }

    public static function selectTopMenu($id1, $id2)
    {

        if ($id1 == $id2) {
            return "actived";
        } else {
            return "";
        }
    }

    public static function selectLeftMenu($id1, $id2)
    {

        if ($id1 == $id2) {
            return "activeLeft";
        } else {
            return "";
        }
    }

    public static function getDictData($key, $dict)
    {
        if ($dict != null) {
            if (array_key_exists($key, $dict)) {
                return $dict[$key];
            } else {
                return "";
            }
        } else {
            return null;
        }
    }

    public static function formatKhDate($date)
    {
        if (($date == "") || ($date == "0000-00-00 00:00:00")) {
            return "";
        } else {
            $date = date_create($date);
            $date = date_format($date, "d-M-Y");
            return $date;
        }
    }

    public static function getPathLogo($typeNgo)
    {
        $path = "";

        if ($typeNgo == 1) {
            $path = "Foreign NGO";
        } else if ($typeNgo == 2) {
            $path = "Cambodian NGO";
        } else if ($typeNgo == 3) {
            $path = "Association";
        }
        return $path;
    }

    public static function getNgoType($TypeCode)
    {
        if ($TypeCode == 1) {
            return "Foreign NGO";
        } else if ($TypeCode == 2) {
            return "Cambodian NGO";
        } else {
            return "Association";

        }
    }

    public static function getSelected($value, $setvalue)
    {
        $selected = "";
        if (trim($setvalue) == trim($value)) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        return $selected;
    }
}
