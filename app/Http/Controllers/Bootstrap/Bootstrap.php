<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 10:11 AM
 */

namespace App\Http\Controllers\Bootstrap;


//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;

class Bootstrap extends Controller
{

    public function inludeCSS()
    {
        $str = "<link href='" . '/assets/css/bootstrap.css' . "'rel='stylesheet'>";
        $str .= "<link href='" . '/assets/css/css.css' . "'rel='stylesheet'>";
        $str .= "<link href='" . '/assets/css/menu.css' . "'rel='stylesheet'>";
        return $str;
    }
    public function inludeJS(){
        //bootsrap js
        $str = "<script src='" . '/assets/js/jquery.js' . "'></script>";
        $str .= "<script src='" . '/assets/js/bootstrap.js' . "'></script>";
        $str .= "<script src='" . '/assets/js/ajax_project.js' . "'></script>";
//        date picker
        $str .= "<link href='" . '/assets/datepicker/datepicker.css' . "' rel='stylesheet'>";
        $str .= "<script src='" . '/assets/datepicker/boostrap-datepicker.js' . "'></script>";
//
        $str .= "<script src='" . '/assets/js/my_script.js' . "'></script>";
        $str .= "<script src='" . '/assets/js/total-ftc.js' . "'></script>";
        $str .= "<script src='" . '/assets/js/sector_subsector_click.js' . "'></script>";
        $str .= "<script src='" . '/assets/js/jquery.balloon.js' . "'></script>";
        return $str;
    }
}