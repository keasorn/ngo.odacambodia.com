<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2017
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo\project;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ngo\DisbursementByProjectModel;
use App\Http\Controllers\MyUtility;


class DisbursementByProjectController extends Controller
{
    private $disModel;

    function insert(Request $request){
        $mu=new MyUtility();
        $PRN = $request->PRN;
        $this->delete($request);

        //FTC
        $Own2014FTC = $mu->z2n(str_replace(",", "", $request->Own2014FTC));
        $Other2014FTC = $mu->z2n(str_replace(",", "", $request->Other2014FTC));
        $NGO2014FTC = $mu->z2n(str_replace(",", "", $request->Ngo2014FTC));

        $Own2015FTC = $mu->z2n(str_replace(",", "", $request->Own2015FTC));
        $Other2015FTC = $mu->z2n(str_replace(",", "", $request->Other2015FTC));
        $NGO2015FTC = $mu->z2n(str_replace(",", "", $request->Ngo2015FTC));

        $Own2016FTC = $mu->z2n(str_replace(",", "", $request->Own2016FTC));
        $Other2016FTC = $mu->z2n(str_replace(",", "", $request->Other2016FTC));
        $NGO2016FTC = $mu->z2n(str_replace(",", "", $request->Ngo2016FTC));

        $Plan2017FTC = $mu->z2n(str_replace(",", "", $request->Plan2017FTC));
        $Plan2018FTC = $mu->z2n(str_replace(",", "", $request->Plan2018FTC));
        $Plan2019FTC = $mu->z2n(str_replace(",", "", $request->Plan2019FTC));

        //2014
        if($Own2014FTC>0){
            $data_dis_FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($data_dis_FTC);
        }

        if($Other2014FTC>0){
            $Other2014FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Other2014FTC);
        }
        if($NGO2014FTC>0){
            $NGO2014FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($NGO2014FTC);
        }

        //2015

        if($Own2015FTC>0){
            $data_dis_FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($data_dis_FTC);
        }

        if($Other2015FTC>0){
            $Other2015FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Other2015FTC);
        }
        if($NGO2015FTC>0){
            $NGO2015FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($NGO2015FTC);
        }

        //2016

        if($Own2016FTC>0){
            $data_dis_FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($data_dis_FTC);
        }

        if($Other2016FTC>0){
            $Other2016FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Other2016FTC);
        }
        if($NGO2016FTC>0){
            $NGO2016FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($NGO2016FTC);
        }
        //Plan

        if($Plan2017FTC>0){
            $Plan2017FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Plan2017FTC);
        }
        if($Plan2018FTC>0){
            $Plan2018FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Plan2018FTC);
        }
        if($Plan2019FTC>0){
            $Plan2019FTC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 1, 'SubTypeOfAssistance' => 1,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019FTC],
            );
            $insert_dis_ftc = DisbursementByProjectModel::insert($Plan2019FTC);
        }
        //End FTC
        //start ITC
        $Own2014ITC = $mu->z2n(str_replace(",", "", $request->Own2014ITC));
        $Other2014ITC = $mu->z2n(str_replace(",", "", $request->Other2014ITC));
        $NGO2014ITC = $mu->z2n(str_replace(",", "", $request->Ngo2014ITC));

        $Own2015ITC = $mu->z2n(str_replace(",", "", $request->Own2015ITC));
        $Other2015ITC = $mu->z2n(str_replace(",", "", $request->Other2015ITC));
        $NGO2015ITC = $mu->z2n(str_replace(",", "", $request->Ngo2015ITC));

        $Own2016ITC = $mu->z2n(str_replace(",", "", $request->Own2016ITC));
        $Other2016ITC = $mu->z2n(str_replace(",", "", $request->Other2016ITC));
        $NGO2016ITC = $mu->z2n(str_replace(",", "", $request->Ngo2016ITC));

        $Plan2017ITC = $mu->z2n(str_replace(",", "", $request->Plan2017ITC));
        $Plan2018ITC = $mu->z2n(str_replace(",", "", $request->Plan2018ITC));
        $Plan2019ITC = $mu->z2n(str_replace(",", "", $request->Plan2019ITC));

        //2014
        if($Own2014ITC>0){
            $data_dis_ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($data_dis_ITC);
        }

        if($Other2014ITC>0){
            $Other2014ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Other2014ITC);
        }
        if($NGO2014ITC>0){
            $NGO2014ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($NGO2014ITC);
        }

        //2015

        if($Own2015ITC>0){
            $data_dis_ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($data_dis_ITC);
        }

        if($Other2015ITC>0){
            $Other2015ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Other2015ITC);
        }
        if($NGO2015ITC>0){
            $NGO2015ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($NGO2015ITC);
        }

        //2016

        if($Own2016ITC>0){
            $data_dis_ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($data_dis_ITC);
        }

        if($Other2016ITC>0){
            $Other2016ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Other2016ITC);
        }
        if($NGO2016ITC>0){
            $NGO2016ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($NGO2016ITC);
        }
        //Plan

        if($Plan2017ITC>0){
            $Plan2017ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Plan2017ITC);
        }
        if($Plan2018ITC>0){
            $Plan2018ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Plan2018ITC);
        }
        if($Plan2019ITC>0){
            $Plan2019ITC = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 2, 'SubTypeOfAssistance' => 5,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019ITC],
            );
            $insert_dis_ITC = DisbursementByProjectModel::insert($Plan2019ITC);
        }
        //End ITC

        //start IPA
        $Own2014IPA = $mu->z2n(str_replace(",", "", $request->Own2014IPA));
        $Other2014IPA = $mu->z2n(str_replace(",", "", $request->Other2014IPA));
        $NGO2014IPA = $mu->z2n(str_replace(",", "", $request->Ngo2014IPA));

        $Own2015IPA = $mu->z2n(str_replace(",", "", $request->Own2015IPA));
        $Other2015IPA = $mu->z2n(str_replace(",", "", $request->Other2015IPA));
        $NGO2015IPA = $mu->z2n(str_replace(",", "", $request->Ngo2015IPA));

        $Own2016IPA = $mu->z2n(str_replace(",", "", $request->Own2016IPA));
        $Other2016IPA = $mu->z2n(str_replace(",", "", $request->Other2016IPA));
        $NGO2016IPA = $mu->z2n(str_replace(",", "", $request->Ngo2016IPA));

        $Plan2017IPA = $mu->z2n(str_replace(",", "", $request->Plan2017IPA));
        $Plan2018IPA = $mu->z2n(str_replace(",", "", $request->Plan2018IPA));
        $Plan2019IPA = $mu->z2n(str_replace(",", "", $request->Plan2019IPA));

        //2014
        if($Own2014IPA>0){
            $data_dis_IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($data_dis_IPA);
        }

        if($Other2014IPA>0){
            $Other2014IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Other2014IPA);
        }
        if($NGO2014IPA>0){
            $NGO2014IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($NGO2014IPA);
        }

        //2015

        if($Own2015IPA>0){
            $data_dis_IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($data_dis_IPA);
        }

        if($Other2015IPA>0){
            $Other2015IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Other2015IPA);
        }
        if($NGO2015IPA>0){
            $NGO2015IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($NGO2015IPA);
        }

        //2016

        if($Own2016IPA>0){
            $data_dis_IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($data_dis_IPA);
        }

        if($Other2016IPA>0){
            $Other2016IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Other2016IPA);
        }
        if($NGO2016IPA>0){
            $NGO2016IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($NGO2016IPA);
        }
        //Plan

        if($Plan2017IPA>0){
            $Plan2017IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Plan2017IPA);
        }
        if($Plan2018IPA>0){
            $Plan2018IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Plan2018IPA);
        }
        if($Plan2019IPA>0){
            $Plan2019IPA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 3, 'SubTypeOfAssistance' => 6,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019IPA],
            );
            $insert_dis_IPA = DisbursementByProjectModel::insert($Plan2019IPA);
        }
        //End IPA

        //start FOA
        $Own2014FOA = $mu->z2n(str_replace(",", "", $request->Own2014FOA));
        $Other2014FOA = $mu->z2n(str_replace(",", "", $request->Other2014FOA));
        $NGO2014FOA = $mu->z2n(str_replace(",", "", $request->Ngo2014FOA));

        $Own2015FOA = $mu->z2n(str_replace(",", "", $request->Own2015FOA));
        $Other2015FOA = $mu->z2n(str_replace(",", "", $request->Other2015FOA));
        $NGO2015FOA = $mu->z2n(str_replace(",", "", $request->Ngo2015FOA));

        $Own2016FOA = $mu->z2n(str_replace(",", "", $request->Own2016FOA));
        $Other2016FOA = $mu->z2n(str_replace(",", "", $request->Other2016FOA));
        $NGO2016FOA = $mu->z2n(str_replace(",", "", $request->Ngo2016FOA));

        $Plan2017FOA = $mu->z2n(str_replace(",", "", $request->Plan2017FOA));
        $Plan2018FOA = $mu->z2n(str_replace(",", "", $request->Plan2018FOA));
        $Plan2019FOA = $mu->z2n(str_replace(",", "", $request->Plan2019FOA));

        //2014
        if($Own2014FOA>0){
            $data_dis_FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($data_dis_FOA);
        }

        if($Other2014FOA>0){
            $Other2014FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Other2014FOA);
        }
        if($NGO2014FOA>0){
            $NGO2014FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($NGO2014FOA);
        }

        //2015

        if($Own2015FOA>0){
            $data_dis_FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($data_dis_FOA);
        }

        if($Other2015FOA>0){
            $Other2015FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Other2015FOA);
        }
        if($NGO2015FOA>0){
            $NGO2015FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($NGO2015FOA);
        }

        //2016

        if($Own2016FOA>0){
            $data_dis_FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($data_dis_FOA);
        }

        if($Other2016FOA>0){
            $Other2016FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Other2016FOA);
        }
        if($NGO2016FOA>0){
            $NGO2016FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($NGO2016FOA);
        }
        //Plan

        if($Plan2017FOA>0){
            $Plan2017FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Plan2017FOA);
        }
        if($Plan2018FOA>0){
            $Plan2018FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Plan2018FOA);
        }
        if($Plan2019FOA>0){
            $Plan2019FOA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 6, 'SubTypeOfAssistance' => 10,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019FOA],
            );
            $insert_dis_FOA = DisbursementByProjectModel::insert($Plan2019FOA);
        }
        //End FOA

        //start ERA
        $Own2014ERA = $mu->z2n(str_replace(",", "", $request->Own2014ERA));
        $Other2014ERA = $mu->z2n(str_replace(",", "", $request->Other2014ERA));
        $NGO2014ERA = $mu->z2n(str_replace(",", "", $request->Ngo2014ERA));

        $Own2015ERA = $mu->z2n(str_replace(",", "", $request->Own2015ERA));
        $Other2015ERA = $mu->z2n(str_replace(",", "", $request->Other2015ERA));
        $NGO2015ERA = $mu->z2n(str_replace(",", "", $request->Ngo2015ERA));

        $Own2016ERA = $mu->z2n(str_replace(",", "", $request->Own2016ERA));
        $Other2016ERA = $mu->z2n(str_replace(",", "", $request->Other2016ERA));
        $NGO2016ERA = $mu->z2n(str_replace(",", "", $request->Ngo2016ERA));

        $Plan2017ERA = $mu->z2n(str_replace(",", "", $request->Plan2017ERA));
        $Plan2018ERA = $mu->z2n(str_replace(",", "", $request->Plan2018ERA));
        $Plan2019ERA = $mu->z2n(str_replace(",", "", $request->Plan2019ERA));

        //2014
        if($Own2014ERA>0){
            $data_dis_ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($data_dis_ERA);
        }

        if($Other2014ERA>0){
            $Other2014ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Other2014ERA);
        }
        if($NGO2014ERA>0){
            $NGO2014ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($NGO2014ERA);
        }

        //2015

        if($Own2015ERA>0){
            $data_dis_ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($data_dis_ERA);
        }

        if($Other2015ERA>0){
            $Other2015ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Other2015ERA);
        }
        if($NGO2015ERA>0){
            $NGO2015ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($NGO2015ERA);
        }

        //2016

        if($Own2016ERA>0){
            $data_dis_ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($data_dis_ERA);
        }

        if($Other2016ERA>0){
            $Other2016ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Other2016ERA);
        }
        if($NGO2016ERA>0){
            $NGO2016ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($NGO2016ERA);
        }
        //Plan

        if($Plan2017ERA>0){
            $Plan2017ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Plan2017ERA);
        }
        if($Plan2018ERA>0){
            $Plan2018ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Plan2018ERA);
        }
        if($Plan2019ERA>0){
            $Plan2019ERA = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 7, 'SubTypeOfAssistance' => 11,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019ERA],
            );
            $insert_dis_ERA = DisbursementByProjectModel::insert($Plan2019ERA);
        }
        //End ERA

        //start NOT
        $Own2014NOT = $mu->z2n(str_replace(",", "", $request->Own2014NOT));
        $Other2014NOT = $mu->z2n(str_replace(",", "", $request->Other2014NOT));
        $NGO2014NOT = $mu->z2n(str_replace(",", "", $request->Ngo2014NOT));

        $Own2015NOT = $mu->z2n(str_replace(",", "", $request->Own2015NOT));
        $Other2015NOT = $mu->z2n(str_replace(",", "", $request->Other2015NOT));
        $NGO2015NOT = $mu->z2n(str_replace(",", "", $request->Ngo2015NOT));

        $Own2016NOT = $mu->z2n(str_replace(",", "", $request->Own2016NOT));
        $Other2016NOT = $mu->z2n(str_replace(",", "", $request->Other2016NOT));
        $NGO2016NOT = $mu->z2n(str_replace(",", "", $request->Ngo2016NOT));

        $Plan2017NOT = $mu->z2n(str_replace(",", "", $request->Plan2017NOT));
        $Plan2018NOT = $mu->z2n(str_replace(",", "", $request->Plan2018NOT));
        $Plan2019NOT = $mu->z2n(str_replace(",", "", $request->Plan2019NOT));

        //2014
        if($Own2014NOT>0){
            $data_dis_NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2014NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($data_dis_NOT);
        }

        if($Other2014NOT>0){
            $Other2014NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2014NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Other2014NOT);
        }
        if($NGO2014NOT>0){
            $NGO2014NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2014','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2014NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($NGO2014NOT);
        }

        //2015

        if($Own2015NOT>0){
            $data_dis_NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2015NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($data_dis_NOT);
        }

        if($Other2015NOT>0){
            $Other2015NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2015NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Other2015NOT);
        }
        if($NGO2015NOT>0){
            $NGO2015NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2015','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2015NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($NGO2015NOT);
        }

        //2016

        if($Own2016NOT>0){
            $data_dis_NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'1','Amount'=>$Own2016NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($data_dis_NOT);
        }

        if($Other2016NOT>0){
            $Other2016NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'2','Amount'=>$Other2016NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Other2016NOT);
        }
        if($NGO2016NOT>0){
            $NGO2016NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2016','DisbType'=>'1','AmountType'=>'5','Amount'=>$NGO2016NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($NGO2016NOT);
        }
        //Plan

        if($Plan2017NOT>0){
            $Plan2017NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2017','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2017NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Plan2017NOT);
        }
        if($Plan2018NOT>0){
            $Plan2018NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2018','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2018NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Plan2018NOT);
        }
        if($Plan2019NOT>0){
            $Plan2019NOT = array(
                ['PRN' => $PRN, 'TypeOfAssistance' => 8, 'SubTypeOfAssistance' => 12,'DisbYear'=>'2019','DisbType'=>'2','AmountType'=>'4','Amount'=>$Plan2019NOT],
            );
            $insert_dis_NOT = DisbursementByProjectModel::insert($Plan2019NOT);
        }
        //End NOT

    }

    function delete(Request $request){
        $this->disModel=DisbursementByProjectModel::where('PRN',$request->PRN);
        if($this->disModel->delete()){
            return true;
        }
    }


}