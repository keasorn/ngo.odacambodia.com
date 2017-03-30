<body style="text-align: left">

@extends("ngo.layout.report")

<?php
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\MultiBilateralCommitmentModel;
use App\Models\ngo\ProjectCounterpartModel;
use App\Http\Controllers\MyUtility;
use App\Models\ngo\ImplementingNgo;
use App\Models\ngo\ProjectStaffModel;
use App\Models\ngo\DisbursementByProjectModel;
use App\Models\ngo\ActualCommitmentModel;
use App\Models\ngo\NgoProjectThematicMakerModel;
use App\Models\ngo\NgoProjectLinkDocModel;

use App\Models\oda\project\ProvinceModel;
use App\Models\ngo\NgoProjectDocModel;

$Own2014FTC = "";
$Other2014FTC = "";
$Ngo2014FTC = "";
$Total2014FTC = "";
$Own2015FTC = "";
$Other2015FTC = "";
$Ngo2015FTC = "";
$Total2015FTC = "";
$Own2016FTC = "";
$Other2016FTC = "";
$Ngo2016FTC = "";
$Total2016FTC = "";
$Plan2017FTC = "";
$Plan2018FTC = "";
$Plan2019FTC = "";

$Own2014ITC = "";
$Own2014ITC = "";
$Other2014ITC = "";
$Ngo2014ITC = "";
$Total2014ITC = "";
$Own2015ITC = "";
$Other2015ITC = "";
$Ngo2015ITC = "";
$Total2015ITC = "";
$Own2016ITC = "";
$Other2016ITC = "";
$Ngo2016ITC = "";
$Total2016ITC = "";
$Plan2017ITC = "";
$Plan2018ITC = "";
$Plan2019ITC = "";

$Own2014IPA = "";
$Own2014IPA = "";
$Other2014IPA = "";
$Ngo2014IPA = "";
$Total2014IPA = "";
$Own2015IPA = "";
$Other2015IPA = "";
$Ngo2015IPA = "";
$Total2015IPA = "";
$Own2016IPA = "";
$Other2016IPA = "";
$Ngo2016IPA = "";
$Total2016IPA = "";
$Plan2017IPA = "";
$Plan2018IPA = "";
$Plan2019IPA = "";

$Own2014FOA = "";
$Own2014FOA = "";
$Other2014FOA = "";
$Ngo2014FOA = "";
$Total2014FOA = "";
$Own2015FOA = "";
$Other2015FOA = "";
$Ngo2015FOA = "";
$Total2015FOA = "";
$Own2016FOA = "";
$Other2016FOA = "";
$Ngo2016FOA = "";
$Total2016FOA = "";
$Plan2017FOA = "";
$Plan2018FOA = "";
$Plan2019FOA = "";

$Own2014ERA = "";
$Own2014ERA = "";
$Other2014ERA = "";
$Ngo2014ERA = "";
$Total2014ERA = "";
$Own2015ERA = "";
$Other2015ERA = "";
$Ngo2015ERA = "";
$Total2015ERA = "";
$Own2016ERA = "";
$Other2016ERA = "";
$Ngo2016ERA = "";
$Total2016ERA = "";
$Plan2017ERA = "";
$Plan2018ERA = "";
$Plan2019ERA = "";

$Own2014NOT = "";
$Own2014NOT = "";
$Other2014NOT = "";
$Ngo2014NOT = "";
$Total2014NOT = "";
$Own2015NOT = "";
$Other2015NOT = "";
$Ngo2015NOT = "";
$Total2015NOT = "";
$Own2016NOT = "";
$Other2016NOT = "";
$Ngo2016NOT = "";
$Total2016NOT = "";
$Plan2017NOT = "";
$Plan2018NOT = "";
$Plan2019NOT = "";

$TotalOwn2014 = "";
$TotalOther2014 = "";
$TotalNgo2014 = "";
$TotalTotal2014 = "";

$TotalOwn2015 = "";
$TotalOther2015 = "";
$TotalNgo2015 = "";
$TotalTotal2015 = "";

$TotalOwn2016 = "";
$TotalOther2016 = "";
$TotalNgo2016 = "";
$TotalTotal2016 = "";

$TotalPlan2017 = "";
$TotalPlan2018 = "";
$TotalPlan2019 = "";

$trNumImp ="";
$ActualCommitmentModel = ActualCommitmentModel::all();



if (count($project) > 0) {
    $PRN = $project->PRN;


    $totalActualComAmount = MultiBilateralCommitmentModel::select("year")
            ->addSelect(DB::Raw("sum(Amount) as Amount"))
            ->where('PRN', '=', $PRN)->whereIn('SourceType', [1, 2])->groupBy('year')->groupBy("PRN")->get();
    $dicMB = array();
    foreach ($totalActualComAmount as $row) {
        $dicMB[$row->year] = $row->Amount;
    }

    $totalNgoSource = MultiBilateralCommitmentModel::select("year")
            ->addSelect(DB::Raw("sum(Amount) as Amount"))
            ->where('PRN', '=', $PRN)->where('SourceType',3)->groupBy('year')->groupBy("PRN")->get();
    $dicNgoSources = array();
    foreach ($totalNgoSource as $row) {
        $dicNgoSources[$row->year] = $row->Amount;
    }

    $ActualCommitmentModel = ActualCommitmentModel::where('PRN', '=', $PRN)->orderBy('Year');
    $TotalPlanBudget = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('PlanBudget');
    $TotalOwnFund = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('OwnFund');
    $TotalRGCFund = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('RGCFund');
    $ActualCommitmentModel = $ActualCommitmentModel->paginate();

    $yearAc=ActualCommitmentModel::select("year")->where('PRN', '=', $PRN)->get();

    $totalAmountNgoSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)
            ->where('SourceType',3)->whereIn('year',$yearAc)->sum("Amount");
    $totalMbSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->whereIn('year',$yearAc)
            ->whereIn('SourceType',[1,2])->sum("Amount");


    $PRN = $project->PRN;
    $ProjectTwgModel = DB::table('v_ngo_sub_project_of_twg')->where('PRN', '=', $PRN)->get();

    //  $actualCommitment = MultiBilateralCommitmentModel::where('PRN', '=', $PRN);
    $actualCommitment = DB::table('v_ngo_sub_porject_of_multibilateral_commitment')->where('PRN', '=', $PRN)->whereIn('SourceType',[1,2])->orderBy('Org_Name_E')->get();
    $totalActualComAmount = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->whereIn('SourceType',[1,2])->sum('Amount');
    $thematicMarker = NgoProjectThematicMakerModel::where('PRN', "=", $PRN)->get();
    $pro_doc = NgoProjectDocModel::where("PRN", $PRN)->get();
    $pro_link_doc = NgoProjectLinkDocModel::where("PRN", $PRN)->get();

    $actualCommitmentOther = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->where('SourceType', '=', '3')->orderBy('OtherSourceName')->get();
    $totalActualComAmountOther = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->where('SourceType', '=', '3')->sum('Amount');
    $trNo=0;

    $impModel = ImplementingNgo::where('PRN', '=', $PRN)->get();
    $totalImp = ImplementingNgo::where('PRN', '=', $PRN)->sum('Amount');

    $counterpartModel = ProjectCounterpartModel::where('PRN', '=', $PRN)->get();
    $ProjectStaffModel = ProjectStaffModel::where('PRN', '=', $PRN)->orderBy('Year')->get();


    $tag = DB::table("v_ngo_sub_project_new_targetlocatoin")->where("PRN", $PRN)->get();

    $tag_sum = DB::table("v_ngo_sub_project_new_targetlocatoin")->where("PRN", $PRN)->sum("Percent2016");


    $DisbModel=DisbursementByProjectModel::where('PRN',$PRN)->get();
    $mu=new MyUtility();


    //start FTC
    $Own2014FTC=$mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");
    $Own2015FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015FTC  = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");
    $Own2016FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','1')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");
    $Plan2017FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','1')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','1')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019FTC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','1')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End FTC

//start ITC
    $Own2014ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2015ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2016ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','2')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");


    $Plan2017ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','2')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','2')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019ITC = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','2')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End ITC

//start IPA
    $Own2014IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2015IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2016IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','3')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");


    $Plan2017IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','3')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','3')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019IPA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','3')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End IPA

//start FOA
    $Own2014FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2015FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2016FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','6')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Plan2017FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','6')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','6')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019FOA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','6')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End FOA

//start ERA
    $Own2014ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2015ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2016ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','7')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");


    $Plan2017ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','7')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','7')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019ERA = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','7')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End ERA

//start NOT
    $Own2014NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2014NOT  = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2014NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2014)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2015NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2015NOT  = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2015NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2015)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");

    $Own2016NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','1')->first(),"Amount");
    $Other2016NOT  = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','2')->first(),"Amount");
    $Ngo2016NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2016)
            ->where('TypeOfAssistance','8')->where('DisbType','1')->where('AmountType','5')->first(),"Amount");


    $Plan2017NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2017)
            ->where('TypeOfAssistance','8')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2018NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2018)
            ->where('TypeOfAssistance','8')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
    $Plan2019NOT = $mu->obj2n(DisbursementByProjectModel::where('PRN',$PRN)->select('Amount')->where('DisbYear',2019)
            ->where('TypeOfAssistance','8')->where('DisbType','2')->where('AmountType','4')->first(),"Amount");
//End NOT


    $TotalOwn2014=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2014)->where('DisbType','1')->where('AmountType','1')->sum("Amount");
    $TotalOther2014=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2014)->where('DisbType','1')->where('AmountType','2')->sum("Amount");
    $TotalNgo2014=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2014)->where('DisbType','1')->where('AmountType','5')->sum("Amount");

    $TotalOwn2015=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2015)->where('DisbType','1')->where('AmountType','1')->sum("Amount");
    $TotalOther2015=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2015)->where('DisbType','1')->where('AmountType','2')->sum("Amount");
    $TotalNgo2015=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2015)->where('DisbType','1')->where('AmountType','5')->sum("Amount");

    $TotalOwn2016=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2016)->where('DisbType','1')->where('AmountType','1')->sum("Amount");
    $TotalOther2016=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2016)->where('DisbType','1')->where('AmountType','2')->sum("Amount");
    $TotalNgo2016=DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2016)->where('DisbType','1')->where('AmountType','5')->sum("Amount");

    $TotalPlan2019 = DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2019)->where('DisbType','2')->where('AmountType','4')->sum('Amount');
    $TotalPlan2018 = DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2018)->where('DisbType','2')->where('AmountType','4')->sum('Amount');
    $TotalPlan2017 = DisbursementByProjectModel::where('PRN',$PRN)->where('DisbYear',2017)->where('DisbType','2')->where('AmountType','4')->sum('Amount');


} else {
    $actualCommitment = null;
}



if (count($project) > 0) {
    $RID = $project->RID;


    $core_detail = \App\Models\ngo\CoreDetailModel::find($RID);
    $min_id = $core_detail->RegistrationWith;
    $registrationWith = MyUtility::getRegistrationWith($min_id);
    $registrationDate = MyUtility::formatKhDate($core_detail->RegistrationDate);
    $registrationExpiry = MyUtility::formatKhDate($core_detail->RegistrationExpiry);



    $Acronym = $project->Acronym;
    $Org_Name_E = $project->Org_Name_E;
    $PRN = $project->PRN;
    $ProjectStatusName = $project->ProjectStatusName;
    $PName_E = $project->PName_E;
    $PName_K = $project->PName_K;
    $ProjectAim = $project->ProjectAim;
    $DateQCompleted = $project->DateQCompleted;
    $idpNumber = $project->idpNumber;
    $isFundProvider = $project->isFundProvider;
    $StatusPdate = $project->StatusPdate;
    $Remark = $project->Remark;
    $Dateline = $project->Dateline;
    $AgencyE = $project->AgencyE;
    $AgencyK = $project->AgencyK;
    $PDateStart = $project->PDateStart;
    $PDateFinish = $project->PDateFinish;

    $Project_Org_Name_E= $project->Project_Org_Name_E;
    $Project_Contact_Name_E= $project->Project_Contact_Name_E;
    $Project_Contact_Title_E= $project->Project_Contact_Title_E;
    $Project_Tel_No= $project->Project_Tel_No;
    $Project_eMail= $project->Project_eMail;

    $MinCode = $project->MinCode;
    $Min_Name_E = \App\Models\oda\odaadmin\MinistryModel::find($MinCode);
    $Min_Name_E = $Min_Name_E == null ? "": $Min_Name_E->Min_Name_E;

    $MDateExpire = $project->MDateExpire;
    $MDateStart = $project->MDateStart;
    $MinRef = $project->MinRef;
    $Docs = $project->Docs;
    $isDocSigned=$project->isDocSigned;
}


$Acronym="";
?>
@section("content")

    <table border="1" width="100%" style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px" cellpadding="2">
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; padding: 2px">&nbsp;</td>
            <td colspan="7" style="border-style: none; border-width: medium; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="9%" colspan="2" align="right" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>NGO Name:</b></td>
            <td width="53%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px" colspan="3">
                <font color="#0033CC" class="fontlarge"><b>{{$Org_Name_E}}</b></font></td>
            <td width="17%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px" align="right">
                <b>Currency use:</b></td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <font color="#0000FF"><b>&nbsp;USD</b></font></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="9%" colspan="2" align="right" style="border: medium none #CCCCCC; padding: 2px">
                <b>Register with:</b></td>
            <td width="41%" style="border: medium none #CCCCCC; padding: 2px" colspan="2">{{$registrationWith}} </td>
            <td width="17%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="9%" colspan="2" align="right" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <b>Date of Registration:</b></td>
            <td width="41%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" colspan="2">{{$registrationDate}}</td>
            <td width="17%" align="center" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                &nbsp;</td>
            <td width="12%" align="right" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                Date Expiry:</td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">{{$registrationDate}}</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; padding: 2px" height="31">
                <b><font color="#0000FF"><span lang="en-us">
		I.</span></font></b></td>
            <td width="97%" colspan="7" style="border-style: none; border-width: medium; padding: 2px" height="30">
                <b><font color="#0000FF">Project Information</font></b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px; border-top-color:#CCCCCC">
                <b><span lang="en-us">(1).</span></b></td>
            <td width="8%" align="right" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px; border-top-color:#CCCCCC">
                Project ID:</td>
            <td width="41%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px; border-top-color:#CCCCCC" colspan="2"><font color="#0033CC"><b>
                        {{$PRN}}</b></font></td>
            <td width="29%" align="right" height="28" style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; " colspan="2">Date Questionnaire Completed:</td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><font color="#0033CC">
                    {{MyUtility::formatKhDate($DateQCompleted)}}</font></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">
                <b>(2).</b></td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">
                <b>Project/Program Title:</b></td>
            <td width="41%" style="border: medium none #CCCCCC; padding: 2px" colspan="2">
                <font color="#0033CC"><b>
                        {{$PName_E}}
                    </b></font>
            </td>
            <td width="29%" align="right" height="30" style="border: medium none #CCCCCC; padding: 2px" colspan="2">IDP Project Number:</td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <font color="#0033CC">{{$idpNumber}}
                </font></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">
                <b>(3).</b></td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">
                Project/Program Objective(s):</td>
            <td width="41%" rowspan="5" valign="top" style="border: medium none #C0C0C0; padding: 2px" colspan="2"><font color="#0033CC">
                    {{$ProjectAim}}</font></td>
            <td width="17%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="29" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="29" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="17%" align="center" height="29" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="24" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="24" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="17%" align="center" height="24" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
            <td width="20%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="17%" align="center" height="28" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="28" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="28" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="17%" align="center" height="30" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px"><b>(4).</b></td>
            <td width="8%" align="right" height="29" style="border: medium none #CCCCCC; padding: 2px">
                Project/Program :</td>
            <td align="left" width="25%" height="29" style="border:medium none #CCCCCC; padding:2px; ">
                Start Date:</td>
            <td align="left" width="16%" height="29" style="border:medium none #CCCCCC; padding:2px; ">
                Completion Date:</td>
            <td width="17%" align="center" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" height="29" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="25%" style="border:medium none #CCCCCC; padding:2px; ">
                <font color="#0033CC">
                    {{MyUtility::formatKhDate($PDateStart)}}</font></td>
            <td width="13%" style="border:medium none #CCCCCC; padding:2px; "><font color="#0033CC">
                    {{MyUtility::formatKhDate($PDateFinish)}} </font></td>
            <td width="17%" align="center" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" align="center" style="border: medium none #CCCCCC; padding: 2px">
                <b>(5).</b></td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">
                Project/Program
                Status:</td>
            <td width="41%" style="border:medium none #CCCCCC; padding:2px; " colspan="2"><font color="#0033CC"><b>{{MyUtility::getProjectStatusName($ProjectStatusName)}}</b></font></td>
            <td width="17%" align="center" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="41%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="center" height="30" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="center" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="right" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(6).</b></td>
            <td width="78%" align="left" valign="middle" colspan="5" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>Was a
                    Program/Project Document signed with Government Ministry(ies)</b></b><font color="#0033CC">
                    <img src="/images/{{MyUtility::getRadio($isDocSigned,1)}}">
                    Yes
                    <img src="/images/{{MyUtility::getRadio($isDocSigned,0)}}">
                    No </font></td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="31%" align="left" valign="middle" colspan="3" style="border: medium none #CCCCCC; padding: 2px">
                If yes, then please specify the name of the Government institution(s) with whom the agreement was signed:</td>
            <td width="17%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="31%" align="left" valign="middle" colspan="3" style="border: medium none #CCCCCC; padding: 2px">Cooperation Agreement with
                Ministry:
                <font color="#0033CC">
                    {{$Min_Name_E}}</font></td>
            <td width="17%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border: medium none #CCCCCC; padding: 2px">Date Signed:</td>
            <td width="41%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px" colspan="2"><font color="#0033CC">
                    {{MyUtility::formatKhDate($MDateStart)}} </font></td>
            <td width="17%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">Date Expiry:</td>
            <td width="41%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" colspan="2"><font color="#0033CC">
                    {{MyUtility::formatKhDate($MDateExpire)}}
                </font></td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(7).</b></td>
            <td width="66%" align="left" valign="middle" colspan="4" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><font color="#333333"><b>&nbsp; If your NGO
                        provide fund to another NGOs to implement the project?&nbsp; </b></font><img src="/images/{{MyUtility::getRadio($isFundProvider,1)}}">
                Yes
                <img src="/images/{{MyUtility::getRadio($isFundProvider,0)}}">
                No </font></td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;	 If yes, please specify the name of the NGO(s) with whom the fund was provided:
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" width="80%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                           name="tblImpNgo" id="tblImpNgo">
                        <tr>

                            <td width="4%" bgcolor="#ECE9D8" nowrap align="center" style="padding: 2px">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td align="center" style="padding:2px; align:center" nowrap bgcolor="#ECE9D8"
                                width="100">
                                <b>
                                    <font color="#333333">Year</font></b></td>

                            <td nowrap bgcolor="#ECE9D8" width="35%" align="center" style="padding: 2px">
                                <b>
                                    <font color="#333333">Receipient NGOs</font></b></td>

                            <td nowrap bgcolor="#ECE9D8" width="35%" align="center" style="padding: 2px">
                                <b>Program/Project Name</b></td>

                            <td align="center" nowrap bgcolor="#ECE9D8" width="19%" class="" style="padding: 2px">
                                <b>
                                    <font color="#333333">Amount</font></b></td>

                        </tr>

                        @if(count($impModel)>0)
                            <?php
                            $trNumImp = 0;
                            $trNo =0;
                            ?>
                            @foreach($impModel as $Imp )
                                <tr id="trImp{{++$trNumImp}}">

                                    <td align="center" nowrap class="fontNormal" style="padding: 2px">
                                        {{++$trNo}}.</td>
                                    <td align="center" class="fontNormal" id="yearImp{{$trNumImp}}" width="100" style="padding: 2px">
                                        {{$Imp->Year}}</td>
                                    <td align="left" class="fontNormal"
                                        width="35%" id="Receipient{{$trNumImp}}" style="padding: 2px">
                                        {{$Imp->Receipient}}</td>
                                    <td align="left" class="fontNormal"
                                        width="35%" id="ReceipientNgoProjectName{{$trNumImp}}" style="padding: 2px">
                                        {{$Imp->ReceipientNgoProjectName}}</td>
                                    <td align="right" style="padding:2px; "
                                        class="fontNormal"
                                        id="amountImp{{$trNumImp}}">{{MyUtility::formatThousand($Imp->Amount)}}</td>

                                </tr>
                            @endforeach
                            @endIf
                            <tr id="trImp{{++$trNumImp}}">

                                <td align="center" nowrap class="fontNormal" style="padding: 2px" colspan="4">
                                    Total:</td>
                                <td align="right" style="padding:2px; "
                                    class="fontNormal"
                                    id="amountImp{{$trNumImp}}">{{MyUtility::formatThousand($totalImp)}}</td>

                            </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="31" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(8).</b></td>
            <td width="66%" align="left" valign="middle" colspan="4" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>
                    List all the Technical Working Group that play some coordinating function in the management of this project/program, or in which this project/program otherwise participates or is represented. </b></td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" width="80%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                           name="tblProjectTwg" id="tblProjectTwg">
                        <tr>

                            <td width="30" bgcolor="#ECE9D8" nowrap style="text-align: center; padding: 4px">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td align="left" style="padding:4px; align:center; text-align:center" nowrap bgcolor="#ECE9D8"
                                width="158">
                                <b>
                                    <font color="#333333">TWG</font></b></td>

                            <td align="left" nowrap bgcolor="#ECE9D8" width="63%" style="text-align: center; padding: 4px">
                                <b>
                                    <font color="#333333">Detail</font></b></td>

                        </tr>

                        @if(count($ProjectTwgModel)>0)
                            <?php
                            $trNumProjectTwg = 0;
                            $trNo = 0;
                            ?>
                            @foreach($ProjectTwgModel as $ProjectTwg )
                                <tr id="trProjectTwg{{++$trNumProjectTwg}}">

                                    <td align="center" nowrap class="fontNormal" width="30">{{++$trNo}}</td>
                                    <td align="left" class="fontNormal" id="tdTwg{{$trNumProjectTwg}}" width="158">
                                        {{$ProjectTwg->twg}}</td>
                                    <td align="left" style="padding-right: 5px"
                                        class="fontNormal"
                                        id="TWGDetailProjectTwg{{$trNumProjectTwg}}">{{$ProjectTwg->TWGDetail}}</td>

                                </tr>
                            @endforeach
                            @endIf
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(9).</b></td>
            <td width="31%" align="left" valign="middle" colspan="3" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>Planned budget allocation/expenditure for each year of the Program/Project duration (based on Project Document)</b></td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>(a). From Development Partner</b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" colspan="6" nowrap class="fontNormal" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" id="tblAc0" style="border-collapse: collapse" bordercolor="#C0C0C0"
                           bgcolor="#FFFFFF" width="80%" cellpadding="2">

                        <tr height="20">

                            <td width="30" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td align="center" style="padding:2px; width:50px;align:center; text-align:center" bgcolor="#ECE9D8">
                                <b>
                                    <font color="#333333">Year</font></b></td>
                            <td align="center" bgcolor="#ECE9D8" style="padding:2px; width:189px;align:center; text-align:center">
                                <b>
                                    <font color="#333333">Development
                                        Partner Type</font></b></td>

                            <td align="center" bgcolor="#ECE9D8" class="" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">List of
                                        Development Partner</font></b></td>

                            <td bgcolor="#ECE9D8" width="426" style="padding: 2px; " align="center">
                                <b>Program/Project
                                    Name</b></td>

                            <td bgcolor="#ECE9D8" width="100" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">Amount</font></b></td>

                        </tr>
                        @if(count($actualCommitment)>0)
                            <?php
                            $trNumAc = 0;
                            $trNo = 0;
                            ?>

                            @foreach($actualCommitment as $ac )
                                <tr id="trAc{{++$trNumAc}}" bgcolor="white">

                                    <td align="center" class="fontNormal" width="30">
                                        {{++$trNo}}. </td>
                                    <td align="center" class="fontNormal" id="yearAc{{$trNumAc}}" width="54">
                                        {{$ac->Year}}</td>


                                    <td align="left" class="fontNormal"
                                        width="193">{{MyUtility::getSourceType($ac->SourceType)}}</td>
                                    <td align="left" class="fontNormal"
                                        width="166">{{$ac->Org_Name_E}}</td>
                                    <td align="left" style="padding-right: 5px"
                                        class="fontNormal"
                                        id="OdaProjectName{{$trNumAc}}0">{{$ac->OdaProjectName}}</td>

                                    <td align="right" style="padding:2px; "
                                        class="fontNormal"
                                        id="amountAc{{$trNumAc}}" width="100">{{MyUtility::formatThousand($ac->Amount)}}</td>

                                </tr>


                            @endforeach @endif

                        <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" width="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
                            &nbsp;</td>

                        <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
                            &nbsp;</td>
                        <td align="right" class="fontNormal" bgcolor="#FFFFFF" height="20" colspan="3" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
                            <b>TOTAL</b></td>

                        <td align="right" class="fontNormal" height="20" width="100"
                            bgcolor="#FFFFFF" style="padding: 2px"><b>{{MyUtility::formatThousand($totalActualComAmount)}}</b></td>
                        </tr>


                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="78%" align="left" valign="middle" colspan="5" style="border: medium none #CCCCCC; padding: 2px"><b>(b). From NGO(s)/CSO</b></td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" id="tblAcOther" style="border-collapse: collapse; " bordercolor="#C0C0C0"
                           bgcolor="#FFFFFF" cellpadding="2" width="80%">

                        <tr height="20">

                            <td bgcolor="#ECE9D8" nowrap style="text-align: center; padding: 2px; " width="30">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td style="padding:2px; align:center; text-align:center" nowrap bgcolor="#ECE9D8"
                                width="50">
                                <b>
                                    <font color="#333333">Year</font></b></td>

                            <td nowrap bgcolor="#ECE9D8" width="294" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">NGO Provider(s) of Funds/Others(*)</font></b></td>

                            <td nowrap bgcolor="#ECE9D8" width="210" style="text-align: center; padding: 2px; ">
                                <b>Program/Project
                                    Name</b></td>

                            <td nowrap bgcolor="#ECE9D8" width="60" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">Amount</font></b></td>

                        </tr>
                        @if(count($actualCommitmentOther)>0)
                            <?php
                            $trNumAcOther = 0;
                            $trNo = 0;
                            ?>
                            @foreach($actualCommitmentOther as $AcOther )
                                <tr id="trAcOther{{++$trNumAcOther}}" bgcolor="white">

                                    <td align="center" nowrap class="fontNormal" width="30" valign="middle" style="padding: 2px">
                                        {{++$trNo}}.</td>
                                    <td  class="fontNormal" id="yearAcOther{{$trNumAcOther}}" align="center" style="padding: 2px">
                                        {{$AcOther->Year}}</td>
                                    <td align="left" class="fontNormal"
                                        width="298" id="OtherSourceName{{$trNumAcOther}}" valign="middle" style="padding: 2px">
                                        {{$AcOther->OtherSourceName}}</td>
                                    <td align="left" style="padding:2px; "
                                        class="fontNormal"
                                        id="NgoProjectName{{$trNumAcOther}}" width="211" valign="middle">{{$AcOther->NgoProjectName}}</td>

                                    <td align="right" style="padding:2px; "
                                        class="fontNormal"
                                        id="amountAcOther{{$trNumAcOther}}" width="60" valign="middle">{{MyUtility::formatThousand($AcOther->Amount)}}</td>

                                </tr>


                            @endforeach @endif
                        <tr>

                            <td align="center" class="fontNormal" nowrap bgcolor="#FFFFFF" height="20" style="padding:2px; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" width="30">
                                &nbsp;</td>

                            <td align="right" class="fontNormal" nowrap bgcolor="#FFFFFF" height="20" colspan="3" style="padding:2px; border-left-style: none; border-left-width: medium; border-bottom-style:solid; border-bottom-width:1px">
                                <b>TOTAL&nbsp;&nbsp;&nbsp;                        </b></td>

                            <td align="right" class="fontNormal" nowrap bgcolor="#FFFFFF" valign="middle"
                                style="padding:2px; " height="20"
                                width="60">{{MyUtility::formatThousand($totalActualComAmountOther)}}</td>

                        </tr>

                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>&nbsp;(c). Planned Budget Allocation/Commitment</b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" width="80%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                           name="tblActualCommitment" id="tblActualCommitment">
                        <tr>

                            <td width="30" bgcolor="#ECE9D8" rowspan="2" style="text-align: center; padding: 4px">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td style="padding:4px; align:center; text-align:center" bgcolor="#ECE9D8"
                                width="133" rowspan="2">
                                <b>Year</b></td>

                            <td style="padding:4px; align:center; text-align:center" bgcolor="#ECE9D8"
                                width="171" rowspan="2">
                                <b>
                                    <font color="#333333">Budget</font></b></td>

                            <td bgcolor="#ECE9D8" colspan="5" style="text-align: center; padding: 2px; ">
                                <b>Commitment
                                </b>
                            </td>

                            <td bgcolor="#ECE9D8" rowspan="2" width="13%" style="text-align: center; padding: 4px">
                                <b>
                                    <font color="#333333">Funding Gap</font></b></td>

                        </tr>


                        <tr id="">
                            <td bgcolor="#ECE9D8" width="14%" style="text-align: center; padding: 2px; ">
                                <b>Own Fund(**)</b></td>


                            <td bgcolor="#ECE9D8" width="14%" style="text-align: center; padding: 2px; ">
                                <b>RGC Financial Contribution</b></td>

                            <td bgcolor="#ECE9D8" width="17%" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">
                                        Multilateral/Bilateral</font></b></td>
                            <td bgcolor="#ECE9D8" width="14%" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">NGOs/Others</font></b></td>
                            <td bgcolor="#ECE9D8" width="12%" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#333333">Total</font></b></td>

                        </tr>

                        @if(count($ActualCommitmentModel)>0)
                            <?php
                            $trNumAC = 0;
                            $trNo =0;
                            ?>
                            @foreach($ActualCommitmentModel as $ActualCommitment )

                                <tr id="trActualCommitment{{++$trNumAC}}">

                                    <td align="center" class="fontNormal" style="text-align: center" width="30">
                                        {{++$trNo}}.</td>
                                    <td align="center" class="fontNormal" id="tdAcCYear{{$trNumAC}}" width="137" style="text-align: center">
                                        {{$ActualCommitment->Year}}</td>
                                    <td align="center" class="fontNormal" id="tdACPlanBudget{{$trNumAC}}" width="175" style="padding:2px; text-align: right">
                                        {{MyUtility::formatThousand($ActualCommitment->PlanBudget)}}</td>
                                    <td align="center" style="padding:2px; text-align:right" id="tdACOwnFund{{$trNumAC}}"
                                        class="fontNormal"
                                        width="14%">
                                        {{MyUtility::formatThousand($ActualCommitment->OwnFund)}}</td>
                                    <td align="center" style="padding:2px; text-align:right" id="tdACRGCFund{{$trNumAC}}"
                                        class="fontNormal"
                                        width="14%">
                                        {{MyUtility::formatThousand($ActualCommitment->RGCFund)}}</td>
                                    <td align="center" style="padding:2px; text-align:right" class="fontNormal" bgcolor="#ECE9D8"
                                        width="16%">
                                        {{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicMB))}}</td>
                                    <td align="center" style="padding:2px; text-align:right" class="fontNormal" bgcolor="#ECE9D8"
                                        width="13%">
                                        {{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

                                    <td align="center" bgcolor="#ECE9D8" style="padding:2px; text-align:right"
                                        class="fontNormalBlue" width="12%">
                                        {{MyUtility::formatThousand($ActualCommitment->OwnFund
                                        +$ActualCommitment->RGCFund+
                                        MyUtility::getDictData($ActualCommitment->Year,$dicMB)+MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

                                    <td align="center" bgcolor="#ECE9D8" class="fontNormalBlue"
                                        width="13%" style="padding:2px; text-align: right">
                                        {{MyUtility::formatThousand($ActualCommitment->PlanBudget
                                        -
                                        ($ActualCommitment->OwnFund+$ActualCommitment->RGCFund
                                        +
                                        MyUtility::getDictData($ActualCommitment->Year,$dicMB)+MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources)))}}</td>

                                </tr>
                            @endforeach @endIf
                            <tr>
                                <td align="center" class="fontNormal" nowrap bgcolor="#FFFFFF" style="text-align: right" colspan="2" width="30">
                                    Total
                                </td>
                                <td align="center" class="fontNormal" nowrap bgcolor="#FFFFFF" width="175" style="text-align: right">
                                    <font color="#0000FF">
                                        {{MyUtility::formatThousand($TotalPlanBudget)}}</font></td>

                                <td align="center" class="fontNormalBlue" nowrap style="padding-right: 5px; text-align:right" height="20" width="14%" bgcolor="#FFFFFF">
                                    <font color="#0000FF">
                                        {{MyUtility::formatThousand($TotalOwnFund)}}</font></td>

                                <td align="center" class="fontNormalBlue" nowrap style="padding-right: 5px; text-align:right" height="20" width="14%" bgcolor="#FFFFFF">
                                    <font color="#0000FF">
                                        {{MyUtility::formatThousand($TotalRGCFund)}}</font></td>
                                <td align="center" class="fontNormalBlue" nowrap style="padding-right: 5px; text-align:right"
                                    height="20" width="16%">
                                    <font color="#0000FF">{{MyUtility::formatThousand($totalMbSource)}}</font></td>
                                <td align="center" class="fontNormalBlue" nowrap style="padding-right: 5px; text-align:right"
                                    height="20" width="13%">
                                    <font color="#0000FF">{{MyUtility::formatThousand($totalAmountNgoSource)}}</font></td>

                                <td align="center" class="fontNormalBlue" nowrap style="padding-right: 5px; text-align:right" height="20" width="12%">
                                    <font color="#0000FF">{{MyUtility::formatThousand($TotalOwnFund+$totalAmountNgoSource
								+ $totalMbSource)}}</font></td>

                                <td align="center" class="fontNormalBlue" nowrap height="20" width="13%" style="text-align: right">
                                    <font color="#0000FF">{{MyUtility::formatThousand($TotalPlanBudget-($TotalOwnFund+$totalAmountNgoSource
								+ $totalMbSource))}}</font></td>
                            </tr>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" height="37">
                <font color="#0000FF"><b>II.&nbsp; </b></font> </td>
            <td width="95%" colspan="7" style="border-style: none; border-width: medium; padding: 2px" height="35">
                <b><font color="#114DFF">Disbursements and Projections</font></b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(10). </b> </td>
            <td width="8%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>Disbursements</b></td>
            <td width="41%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" colspan="6">


                <table id="table3" border="1" style="border-collapse: collapse" id="table3"
                       bordercolor="#C0C0C0" class="fontTiny" cellpadding="2" width="100%">
                    <tr>
                        <th bgcolor="#ECE9D8" rowspan="3" valign="middle" width="4%"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center">
                            <font color="#333333">Type of Assistance</font></th>
                        <th bgcolor="#ECE9D8" colspan="4"
                            style=";  padding:1px; text-align:center; border-bottom-style:solid; border-bottom-width:1px"
                            height="35">
                            <font color="#333333">2014 </font>Disbursements
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            colspan="4" height="35">
                            <font color="#333333">2015 </font>Disbursements
                        </th>
                        <th bgcolor="#ECE9D8" colspan="4"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            height="35">
                            <font color="#333333">2016 Disbursements</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            rowspan="3" width="6%">
                            <font color="#333333">2017 (Plan)</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            rowspan="3" width="6%">
                            <font color="#333333">2018 (Plan)</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            rowspan="3" width="6%">
                            <font color="#333333">2019 (Plan)</font></th>
                    </tr>
                    <tr>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Total</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Total</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  border-style:solid; border-width:1px; padding:1px; text-align:center"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px"
                            rowspan="2" width="6%">
                            <font color="#333333">Total</font></th>
                    </tr>
                    <tr>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-top-style:solid; border-top-width:1px" width="6%">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-right-style:solid; border-right-width:1px" width="6%">
                            NGOs
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" width="6%">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" width="6%">
                            NGOs
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" width="6%">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8"
                            style=";  padding:1px; text-align:center; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px" width="6%">
                            NGOs
                        </th>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:medium none #C0C0C0; border-bottom:medium none #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            height="24" align="left" width="4%">
                            <font color="#000080">Free-Standing Technical
                                Cooperation</font></td>
                        <td style="border-color:#C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Own2014FTC" id="Own2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{MyUtility::formatThousand($Own2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Other2014FTC" id="Other2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Other2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly="true" name="Ngo2014FTC" id="Ngo2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Ngo2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2014FTC" id="Total2014FTC" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2014FTC+$Other2014FTC+$Ngo2014FTC)}}" size="8" maxlength="15"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Own2015FTC" id="Own2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none;;"
                                   value="{{ MyUtility::formatThousand($Own2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Other2015FTC" id="Other2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none"
                                   value="{{ MyUtility::formatThousand($Other2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Ngo2015FTC" id="Ngo2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Ngo2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2015FTC" id="Total2015FTC" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2015FTC+$Other2015FTC+$Ngo2015FTC)}}" size="8" maxlength="15"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Own2016FTC" id="Own2016FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Own2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Other2016FTC" id="Other2016FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Other2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Ngo2016FTC" id="Ngo2016FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none; "
                                   value="{{ MyUtility::formatThousand($Ngo2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2016FTC" id="Total2016FTC" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2016FTC+$Other2016FTC+$Ngo2016FTC)}}" size="8" maxlength="15"></td>
                        <td style="border-top:medium none #C0C0C0; border-bottom:medium none #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; "
                            align="center" height="24" width="6%">
                            <input readOnly name="Plan2017FTC" id="Plan2017FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2017FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td                             align="center" height="24" width="6%">
                            <input readOnly name="Plan2018FTC" id="Plan2018FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2018FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:medium none #C0C0C0; border-bottom:medium none #C0C0C0; ;  padding-top:1px; padding-bottom:1px"
                            align="center" height="24" width="6%">
                            <input readOnly name="Plan2019FTC" id="Plan2019FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2019FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left" width="4%">
                            <font color="#000080">Investment- Related Technical
                                Cooperation</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-bottom-color:#C0C0C0" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2014ITC" id="Own2014ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Own2014ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2014ITC" id="Other2014ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Other2014ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2014ITC" id="Ngo2014ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2014ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2014ITC" id="Total2014ITC" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2014ITC+$Other2014ITC+$Ngo2014ITC)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2015ITC" id="Own2015ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Own2015ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2015ITC" id="Other2015ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Other2015ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2015ITC" id="Ngo2015ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2015ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2015ITC" id="Total2015ITC" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2015ITC+$Other2015ITC+$Ngo2015ITC)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2016ITC" id="Own2016ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Own2016ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2016ITC" id="Other2016ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Other2016ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2016ITC" id="Ngo2016ITC" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2016ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2016ITC" id="Total2016ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Own2016ITC+$Other2016ITC+$Ngo2016ITC)}}" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; " width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2017ITC" id="Plan2017ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2017ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2018ITC" id="Plan2018ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2018ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2019ITC" id="Plan2019ITC" size="8"
                                   style="text-align: right; border:none;"
                                   value="{{ MyUtility::formatThousand($Plan2019ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left" width="4%">
                            <font color="#000080">Investment Project/Programme</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2014IPA" id="Own2014IPA"
                                   value="{{ MyUtility::formatThousand($Own2014IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2014IPA" id="Other2014IPA"
                                   value="{{ MyUtility::formatThousand($Other2014IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2014IPA" id="Ngo2014IPA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2014IPA)}}"
                                   maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2014IPA" id="Total2014IPA"
                                   value="{{ MyUtility::formatThousand($Own2014IPA+$Other2014IPA+$Ngo2014IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2015IPA" id="Own2015IPA"
                                   value="{{ MyUtility::formatThousand($Own2015IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2015IPA" id="Other2015IPA"
                                   value="{{ MyUtility::formatThousand($Other2015IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2015IPA" id="Ngo2015IPA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2015IPA)}}"
                                   maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2015IPA" id="Total2015IPA"
                                   value="{{ MyUtility::formatThousand($Own2015IPA+$Other2015IPA+$Ngo2015IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <font face="Tahoma,Verdana">
                                <input readOnly type="text" class="TextBoxDisb" name="Own2016IPA" id="Own2016IPA"
                                       value="{{ MyUtility::formatThousand($Own2016IPA)}}" size="8"
                                       style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></font></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2016IPA" id="Other2016IPA"
                                   value="{{ MyUtility::formatThousand($Other2016IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2016IPA" id="Ngo2016IPA"
                                   value="{{ MyUtility::formatThousand($Ngo2016IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2016IPA" id="Total2016IPA"
                                   value="{{ MyUtility::formatThousand($Own2016IPA+$Other2016IPA+$Ngo2016IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; " width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2017IPA" id="Plan2017IPA"
                                   value="{{ MyUtility::formatThousand($Plan2017IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2018IPA" id="Plan2018IPA"
                                   value="{{ MyUtility::formatThousand($Plan2018IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2019IPA" id="Plan2019IPA"
                                   value="{{ MyUtility::formatThousand($Plan2019IPA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshIPA(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left" width="4%">
                            <font color="#000080">Food Aid</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2014FOA" id="Own2014FOA"
                                   value="{{ MyUtility::formatThousand($Own2014FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2014FOA" id="Other2014FOA"
                                   value="{{ MyUtility::formatThousand($Other2014FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2014FOA" id="Ngo2014FOA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2014FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2014FOA" id="Total2014FOA" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2014FOA+$Other2014FOA+$Ngo2014FOA)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2015FOA" id="Own2015FOA"
                                   value="{{ MyUtility::formatThousand($Own2015FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2015FOA" id="Other2015FOA"
                                   value="{{ MyUtility::formatThousand($Other2015FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2015FOA" id="Ngo2015FOA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2015FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2015FOA" id="Total2015FOA" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2015FOA+$Other2015FOA+$Ngo2015FOA)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2016FOA" id="Own2016FOA"
                                   value="{{ MyUtility::formatThousand($Own2016FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2016FOA" id="Other2016FOA"
                                   value="{{ MyUtility::formatThousand($Other2016FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2016FOA" id="Ngo2016FOA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2016FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2016FOA" id="Total2016FOA"
                                   value="{{ MyUtility::formatThousand($Own2016FOA+$Other2016FOA+$Ngo2016FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; " width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2017FOA" id="Plan2017FOA"
                                   value="{{ MyUtility::formatThousand($Plan2017FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2018FOA" id="Plan2018FOA"
                                   value="{{ MyUtility::formatThousand($Plan2018FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2019FOA" id="Plan2018FOA0"
                                   value="{{ MyUtility::formatThousand($Plan2019FOA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left" width="4%">
                            <font color="#000080">Emergency and Relief Assistance</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2014ERA" id="Own2014ERA"
                                   value="{{ MyUtility::formatThousand($Own2014ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2014ERA" id="Other2014ERA"
                                   value="{{ MyUtility::formatThousand($Other2014ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2014ERA" id="Ngo2014ERA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2014ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2014ERA" id="Total2014ERA" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2014ERA+$Other2014ERA+$Ngo2014ERA)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2015ERA" id="Own2015ERA"
                                   value="{{ MyUtility::formatThousand($Own2015ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2015ERA" id="Other2015ERA"
                                   value="{{ MyUtility::formatThousand($Other2015ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2015ERA" id="Ngo2015ERA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2015ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2015ERA" id="Total2015ERA" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2015ERA+$Other2015ERA+$Ngo2015ERA)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2016ERA" id="Own2016ERA"
                                   value="{{ MyUtility::formatThousand($Own2016ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2016ERA" id="Other2016ERA"
                                   value="{{ MyUtility::formatThousand($Other2016ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2016ERA" id="Ngo2016ERA" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2016ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2016ERA" id="Total2016ERA"
                                   value="{{ MyUtility::formatThousand($Own2016ERA+$Other2016ERA+$Ngo2016ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; " width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2017ERA" id="Plan2017ERA"
                                   value="{{ MyUtility::formatThousand($Plan2017ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2018ERA" id="Plan2018ERA"
                                   value="{{ MyUtility::formatThousand($Plan2018ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2019ERA" id="Plan2019ERA"
                                   value="{{ MyUtility::formatThousand($Plan2019ERA)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left" width="4%">
                            <font color="#000080">Other</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2014NOT" id="Own2014NOT"
                                   value="{{ MyUtility::formatThousand($Own2014NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2014NOT" id="Other2014NOT"
                                   value="{{ MyUtility::formatThousand($Other2014NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2014NOT" id="Ngo2014NOT" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2014NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2014NOT" id="Total2014NOT" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2014NOT+$Other2014NOT+$Ngo2014NOT)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2015NOT" id="Own2015NOT"
                                   value="{{ MyUtility::formatThousand($Own2015NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2015NOT" id="Other2015NOT"
                                   value="{{ MyUtility::formatThousand($Other2015NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2015NOT" id="Ngo2015NOT" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2015NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="true" name="Total2015NOT" id="Total2015NOT" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;"
                                   value="{{ MyUtility::formatThousand($Own2015NOT+$Other2015NOT+$Ngo2015NOT)}}" size="8"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Own2016NOT" id="Own2016NOT"
                                   value="{{ MyUtility::formatThousand($Own2016NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Other2016NOT" id="Other2016NOT"
                                   value="{{ MyUtility::formatThousand($Other2016NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Ngo2016NOT" id="Ngo2016NOT" size="8"
                                   style="text-align: right; border:none;" value="{{ MyUtility::formatThousand($Ngo2016NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" bgcolor="#ECE9D8" width="6%">
                            <input readOnly="readonly" class="TextBoxDisb"
                                   style="text-align: right; border:medium none;color:#000080; background-color:#ECE9D8;" name="Total2016NOT" id="Total2016NOT"
                                   value="{{ MyUtility::formatThousand($Own2016NOT+$Other2016NOT+$Ngo2016NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; " width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2017NOT" id="Plan2017NOT"
                                   value="{{ MyUtility::formatThousand($Plan2017NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2018NOT" id="Plan2018NOT"
                                   value="{{ MyUtility::formatThousand($Plan2018NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; ;  padding-top:1px; padding-bottom:1px" width="6%">
                            <input readOnly type="text" class="TextBoxDisb" name="Plan2019NOT" id="Plan2019NOT"
                                   value="{{ MyUtility::formatThousand($Plan2019NOT)}}" size="8"
                                   style="text-align: right; border:none;" maxlength="15"></td>
                    </tr>
                    <tr>
                        <td class="fontTiny"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            bgcolor="#ECE9D8" align="center" height="20" width="4%">
                            <b>Total:</b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; "
                            height="20" width="6%">
                            <b>
                                {{MyUtility::formatThousand($TotalOwn2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>
                                {{MyUtility::formatThousand($TotalOther2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>
                                {{MyUtility::formatThousand($TotalNgo2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>
                                {{MyUtility::formatThousand($TotalOwn2014+$TotalOther2014+$TotalNgo2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>&nbsp;{{MyUtility::formatThousand($TotalOwn2015)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalOther2015)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalNgo2015)}}                        </b>

                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalOwn2015+$TotalOther2015+$TotalNgo2015)}}         </b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalOwn2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalOther2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalOwn2016+$TotalOther2016+$TotalNgo2016)}}
                            </b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style=";  padding:2px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"
                            height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalTotal2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style=";  border-style:solid; border-width:1px; padding:2px; "
                            bgcolor="#ECE9D8" height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalPlan2017)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style=";  border-style:solid; border-width:1px; padding:2px; "
                            bgcolor="#ECE9D8" height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalPlan2018)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style=";  border-style:solid; border-width:1px; padding:2px; "
                            bgcolor="#ECE9D8" height="20" width="6%">
                            <b>{{MyUtility::formatThousand($TotalPlan2019)}}
                            </b>
                        </td>
                    </tr>
                </table> </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">
                <b>(11)a.</b></td>
            <td width="8%" align="left" valign="middle" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px"><b>Disbursements and Projections by Sector and Activity</b></td>
            <td width="41%" align="left" valign="middle" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #C0C0C0; border-right: 1px solid #C0C0C0; border-top: 1px solid #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #C0C0C0; border-right: medium none #C0C0C0; border-top: medium none #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #C0C0C0; border-right: 1px solid #C0C0C0; border-top: medium none #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">
                Enter the amount disbursed (in reporting currency) to each sector and sub-sector from your own core resources</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #C0C0C0; border-right: medium none #C0C0C0; border-top: medium none #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #C0C0C0; border-right: 1px solid #C0C0C0; border-top: medium none #C0C0C0; border-bottom: medium none #C0C0C0; padding: 2px">
                <div align="left">

                    <table                                    style="border-collapse: collapse; "
                                                              class="fontNormal"
                                                              cellspacing="1"
                                                              bordercolor="#C0C0C0" border="1" width="80%">
                        <tbody>
                        <?php
                        $PRN = $project->PRN;
                        $project_sector = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->get();

                        $total2014 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2014");
                        $total2015 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2015");
                        $total2016 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2016");
                        $total2017 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2017");
                        $total2018 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2018");
                        $total2019 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2019");
                        ?>
                        <tr>

                            <td class="fontNormal" width="30" nowrap=""
                                bgcolor="#ECE9D8" align="center"
                                height="18" style="text-align: center; padding: 2px; ">
                                <b>No</b></td>
                            <td class="fontNormal" width="25%" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">Sector</font>
                                </b></td>
                            <td class="fontNormal" width="20%" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">
                                        Sub-Sector</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2014</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2015</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2016</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2017</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2018</font>
                                </b></td>

                            <td class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="center" style="text-align: center; padding: 2px; ">
                                <b>
                                    <font color="#000000">2019</font>
                                </b></td>

                        </tr>
                        <?php
                        $numSec = 0;
                        ?>

                        @foreach($project_sector as $pro_sector)

                            <tr id="tblProjectSectorRow{{++$numSec}}" class="fontNormal" bgcolor="#FFFFFF">


                                <td width="30" valign="middle" nowrap="" align="center" style="padding: 2px">
                                    {{$numSec}}</td>
                                <td id="SectorName_E{{$numSec}}" style="padding:2px; " width="25%"
                                    valign="middle"
                                    align="left">
                                    {{$pro_sector->SectorName_E}}</td>
                                <td id="SubSectorName_E{{$numSec}}" width="20%" valign="middle" align="left" style="padding: 2px">
                                    {{$pro_sector->SubSectorName_E}}
                                </td>

                                <td id="Amount2014{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2014)}}
                                </td>

                                <td id="Amount2015{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2015)}}
                                </td>

                                <td id="Amount2016{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2016)}}
                                </td>

                                <td id="Amount2017{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2017)}}
                                </td>

                                <td id="Amount2018{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2018)}}
                                </td>

                                <td id="Amount2019{{$numSec}}" style="padding:2px; " width="9%"
                                    align="right">
                                    {{MyUtility::formatThousand($pro_sector->y2018)}}
                                </td>

                            </tr>

                        @endforeach
                        <tr class="fontNormal">

                            <td colspan="3" class="fontNormal" nowrap=""
                                bgcolor="#ECE9D8" align="right" width="30" style="padding: 2px">
                                <b><font color="#0066FF">

                                        TOTAL:&nbsp;&nbsp; </font></b>
                            </td>
                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2014)}}
                                    </font></b>
                            </td>

                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2015)}}
                                    </font></b>
                            </td>

                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2016)}}
                                    </font></b>
                            </td>

                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2017)}}
                                    </font></b>
                            </td>

                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2018)}}
                                    </font></b>
                            </td>

                            <td style="padding:2px; "
                                class="fontNormal" width="9%"
                                bgcolor="#ECE9D8" align="right">
                                <b><font color="#0066FF">
                                        {{MyUtility::formatThousand($total2019)}}
                                    </font></b>
                            </td>

                        </tr>

                        </tbody>
                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #C0C0C0; border-right: medium none #C0C0C0; border-top: medium none #C0C0C0; border-bottom: 1px solid #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #C0C0C0; border-right: medium none #C0C0C0; border-top: medium none #C0C0C0; border-bottom: 1px solid #C0C0C0; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #C0C0C0; border-right: 1px solid #C0C0C0; border-top: medium none #C0C0C0; border-bottom: 1px solid #C0C0C0; padding: 2px">
                <p align="left"><font color="#0066CC"><b>
                            ** Own Fund</b>: Fund that NGOs mobilized by themselves,
                        including private donation and sponsorship and all other
                        contributions that ARE NOT from other NGOs, government
                        and development partner organizations.
                    </font>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(11)b.</b></td>
            <td width="8%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>Thematic Marker </b></td>
            <td width="41%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">In addition
                to the sectors receiving financial support, identified in 15a above,
                many projects have additional objectives
                that may not be funded as a
                &quot;sector&quot; (for example, capacity development or gender mainstreaming). Indicate below
                the additional objectives, if any, associated with this
                project.</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" style="border-collapse: collapse; width: 80%;" id="table20"

                           class="table-responsive" width="592" cellpadding="2" bordercolor="#C0C0C0"

                           cellspacing="0">

                        <tbody>

                        <tr>

                            <td width="50" bgcolor="#ECE9D8" align="center" style="padding: 2px"><b>
                                    No</b></td>

                            <td width="405" bgcolor="#ECE9D8" align="center" style="padding: 2px"><b>
                                    Thematic Marker</b></td>

                            <td align="center" bgcolor="#ECE9D8" width="57" style="padding: 2px"><b>
                                    NO</b></td>

                            <td align="center" bgcolor="#ECE9D8" width="57" style="padding: 2px"><b>
                                    Minor</b></td>

                            <td align="center" bgcolor="#ECE9D8" width="57" style="padding: 2px"><b>
                                    Moderate</b></td>

                            <td align="center" bgcolor="#ECE9D8" width="57" style="padding: 2px"><b>
                                    Very<br>
                                    &nbsp;Significant</b></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                1.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Builds or strengthens Government capacity/systems</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdBuildCapacity" id="thematicMarker10_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdBuildCapacity" id="thematicMarker10_1"></td>

                            <td valign="top" align="center" width="56" style="padding: 2px">

                                <input type="radio" value="2" name="rdBuildCapacity" id="thematicMarker10_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdBuildCapacity" id="thematicMarker10_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 2px">
                                2.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Supports Public Financial Management reform implementations</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdFinancial" id="thematicMarker14_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdFinancial" id="thematicMarker14_1"></td>

                            <td valign="top" align="center" width="56" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdFinancial" id="thematicMarker14_2"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdFinancial" id="thematicMarker14_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                3.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Supports Public Admin Reform implementation</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdAdminReform" id="thematicMarker15_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdAdminReform" id="thematicMarker15_1"></td>

                            <td valign="top" align="center" width="56" style="padding: 2px">

                                <input type="radio" value="2" name="rdAdminReform" id="thematicMarker15_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdAdminReform" id="thematicMarker15_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 2px">
                                4.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Support Decentralization Reform implementation</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdDecentralize" id="thematicMarker16_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdDecentralize" id="thematicMarker16_1"></td>

                            <td valign="top" align="center" width="56" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdDecentralize" id="thematicMarker16_2"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdDecentralize" id="thematicMarker16_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                5.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Support Legal &amp; Judicial Reform Implementation</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdJudicial" id="thematicMarker17_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdJudicial" id="thematicMarker17_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdJudicial" id="thematicMarker17_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdJudicial" id="thematicMarker17_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 2px">
                                6.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Gender equality and women's empowerment</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdGender" id="thematicMarker5_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdGender" id="thematicMarker5_1"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdGender" id="thematicMarker5_2"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdGender" id="thematicMarker5_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                7.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Environmental protection (other than climate change-related)</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdEnvironment" id="thematicMarker9_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdEnvironment" id="thematicMarker9_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdEnvironment" id="thematicMarker9_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdEnvironment" id="thematicMarker9_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 2px">
                                8.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Climate change</td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdClimate" id="thematicMarker8_0" checked></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdClimate" id="thematicMarker8_1" ></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdClimate" id="thematicMarker8_2" ></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdClimate" id="thematicMarker8_3" ></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                9.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                HIV/AIDS (awareness, prevention and treatment)</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdHIV" id="thematicMarker6_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdHIV" id="thematicMarker6_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdHIV" id="thematicMarker6_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdHIV" id="thematicMarker6_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 2px">
                                10.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Industrial Development Policy (non-sector support)</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdIndustrialDev" id="thematicMarker18_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdIndustrialDev" id="thematicMarker18_1"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdIndustrialDev" id="thematicMarker18_2"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdIndustrialDev" id="thematicMarker18_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                11.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Income and employment generation</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdIncome" id="thematicMarker3_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdIncome" id="thematicMarker3_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdIncome" id="thematicMarker3_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdIncome" id="thematicMarker3_3"></td>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 2px">
                                12.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Private Sector Development</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdPrivate" id="thematicMarker13_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdPrivate" id="thematicMarker13_1" ></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdPrivate" id="thematicMarker13_2" ></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdPrivate" id="thematicMarker13_3" ></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                13.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                South-South and/or Triangular Cooperation</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdSouthSouth" id="thematicMarker12_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdSouthSouth" id="thematicMarker12_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdSouthSouth" id="thematicMarker12_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdSouthSouth" id="thematicMarker12_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 2px">
                                14.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Community-based project</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" name="rdCommunity" id="thematicMarker7_0" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" name="rdCommunity" id="thematicMarker7_1"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" name="rdCommunity" id="thematicMarker7_2"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" name="rdCommunity" id="thematicMarker7_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" style="padding: 2px">
                                15.</td>

                            <td valign="top" width="405" nowrap="" style="padding: 2px">
                                Engagement with civil society or non-state actors</td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdEngagement" id="thematicMarker11_0" checked></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdEngagement" id="thematicMarker11_1"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdEngagement" id="thematicMarker11_2"></td>

                            <td valign="top" align="center" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdEngagement" id="thematicMarker11_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 2px">
                                16.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Food security</td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="0" id="thematicMarker1_0" name="rdFoodSecurity" checked></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="1" id="thematicMarker1_1" name="rdFoodSecurity"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="2" id="thematicMarker1_2" name="rdFoodSecurity"></td>

                            <td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 2px">

                                <input type="radio" value="3" id="thematicMarker1_3" name="rdFoodSecurity"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#FFFFFF" align="center" style="padding: 2px">
                                17.</td>

                            <td valign="top" width="405" nowrap="" bgcolor="#FFFFFF" style="padding: 2px">
                                Social protection</td>

                            <td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdSocialProtection" id="thematicMarker2_0" checked></td>

                            <td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdSocialProtection" id="thematicMarker2_1"></td>

                            <td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdSocialProtection" id="thematicMarker2_2"></td>

                            <td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdSocialProtection" id="thematicMarker2_3"></td>

                        </tr>

                        <tr>

                            <td valign="top" width="50" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 2px">
                                18.

                            </td>

                            <td valign="top" width="405" nowrap="" bgcolor="#E3EBFD" style="padding: 2px">
                                Youth support and development</td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="0" name="rdYouth" id="thematicMarker4_0" checked></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="1" name="rdYouth" id="thematicMarker4_1"></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="2" name="rdYouth" id="thematicMarker4_2"></td>

                            <td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 2px">

                                <input type="radio" value="3" name="rdYouth" id="thematicMarker4_3"></td>

                        </tr>

                        </tbody>

                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; padding: 2px" height="38">
                <font color="#0000FF"><b>III.</b></font></td>
            <td width="95%" colspan="7" style="border-style: none; border-width: medium; padding: 2px" height="37">
                <b><font color="#0000FF">Target Geographic
                        Location(s) of Program/Project Activities</font></b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="left" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">Indicate the
                estimated geographical percentage allocation of total program/project
                resources from your own core resources for the entire project period.
                (N.B. Project based in Phnom Penh that serve the whole country should be
                classified as &quot;Nation-wide&quot; not &quot;Phnom Penh&quot;) </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="93%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">

                    <table id="tblTargetLocation" bordercolor="#C0C0C0" class="fontNormal" cellpadding="2"
                           style="border-collapse: collapse; " border="1" width="50%">


                        <tr>

                            <td bgcolor="#ECE9D8" align="center" height="25" width="30" style="padding: 2px">No</td>

                            <td bgcolor="#ECE9D8" align="center" height="25" style="padding: 2px"><b>Province</b></td>

                            <td class="text-center" bgcolor="#ECE9D8" align="right" height="25" style="padding: 2px">
                                <p align="center"><b>%</b></td>

                        </tr>

                        <?php

                        $tar_num = 0;

                        ?>

                        @foreach($tag as $g)

                            <tr id="tar_tr{{$tar_num++}}">

                                <td align="center" class="fontNormal" style="padding:2px; width: 30px">

                                    {{$tar_num}}</td>

                                <td align="left" class="fontNormal" style="padding:2px; width: 330px">

                                    <a href="#NONE" id="pro_name{{$tar_num}}"

                                       onclick="editTarget('{{$g->ProjectProvinceId}}','{{$tar_num}}')">{{$g->Province}}</a>

                                </td>

                                <td align="center" class="fontNormal text-center"

                                    id="percent{{$tar_num}}" style="padding: 2px">{{$g->Percent2016}}</td>

                            </tr>@endforeach

                        @if(count($tag)>0)

                            <tr>

                                <td width="30" class="fontNormal" height="20" nowrap="" bgcolor="#ECE9D8" align="right" style="padding: 2px">

                                    &nbsp;</td>

                                <td width="330" class="fontNormal" height="20" nowrap="" bgcolor="#ECE9D8" align="right" style="padding: 2px">

                                    <font color="#000080"><b>TOTAL: </b></font></td>

                                <td class="fontNormal" height="20" bgcolor="#ECE9D8" align="center" style="padding: 2px">

                                    <b>{{$tag_sum}}</b></td>

                            </tr>@endif


                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; padding: 2px" height="39">
                <font color="#0000FF"><b>IV. </b></font> </td>
            <td width="95%" colspan="7" style="border-style: none; border-width: medium; padding: 2px" height="38">
                <b><font color="#0000FF">Contact Details and
                        Additional Comment</font></b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="padding: 2px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td width="2%" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
                <b>(12).</b></td>
            <td width="8%" align="right" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
                <font color="#0000FF">NGO Name:</font></td>
            <td width="41%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium" colspan="2">
                <b>{{$Project_Org_Name_E}}</b></td>
            <td width="17%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td align="left" width="20%" height="30" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:none; border-bottom-width:medium">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="padding: 2px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td width="2%" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">
                <font color="#0000FF">Contact Name:
                </font></td>
            <td width="41%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; " colspan="2">{{$Project_Contact_Name_E}}</td>
            <td width="17%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="padding: 2px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td width="2%" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">
                <font color="#0000FF">Contact Title:</font></td>
            <td width="41%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; " colspan="2">{{$Project_Contact_Title_E}}</td>
            <td width="17%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="padding: 2px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">&nbsp;</td>
            <td width="2%" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">
                <font color="#0000FF">Phone:
                </font></td>
            <td width="41%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; " colspan="2">{{$Project_Tel_No}}</td>
            <td width="17%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-style:none; border-width:medium; padding:2px; ">&nbsp;</td>
            <td align="left" width="20%" height="30" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="padding: 2px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
            <td width="2%" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">
                <font color="#0000FF">Email:</font></td>
            <td width="41%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" colspan="2">{{$Project_eMail}}</td>
            <td width="17%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="padding: 2px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="right" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="41%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <b>(13).</b></td>
            <td width="8%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>Project Staff</b></td>
            <td width="41%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px" colspan="2">&nbsp;</td>
            <td width="17%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="12%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td align="left" width="20%" height="30" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                &nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="105%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">
                    <table border="1" width="50%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                           name="tblProjectStaff" id="tblProjectStaff">
                        <tr>

                            <td width="30" bgcolor="#ECE9D8" valign="middle" style="text-align: center; padding: 2px; " height="20">
                                <b>
                                    <font color="#333333">No</font></b></td>
                            <td style="padding:2px; align:center; text-align:center" bgcolor="#ECE9D8" valign="middle"
                                width="147" height="20">
                                <b>
                                    <font color="#333333">Year</font></b></td>

                            <td style="padding:2px; align:center; text-align:center" bgcolor="#ECE9D8" valign="middle"
                                width="401" height="20">
                                <b>
                                    <font color="#333333">Foreign Staff</font></b></td>

                            <td bgcolor="#ECE9D8" style="text-align: center; padding: 2px; " height="20">
                                <b>National Staff</b></td>

                            <td bgcolor="#ECE9D8" width="13%" style="text-align: center; padding: 2px; " height="20">
                                <b>Total</b></td>

                        </tr>

                        @if(count($ProjectStaffModel)>0)
                            <?php
                            $trNumPS = 0;
                            ?>
                            @foreach($ProjectStaffModel as $ProjectStaff )

                                <tr>

                                    <td align="center" class="fontNormal" width="30" style="padding: 2px" height="20">{{++$trNumPS }}</td>
                                    <td align="left" class="fontNormal" id="tdPSYear{{$trNumPS}}" width="147" style="padding: 2px" height="20">
                                        {{$ProjectStaff->Year}}</td>
                                    <td align="right" class="fontNormal" id="tdStaffExpatriate{{$trNumPS}}" width="401" style="padding: 2px" height="20">
                                        {{MyUtility::formatThousand($ProjectStaff->StaffExpatriate)}}</td>
                                    <td align="right" style="padding:2px; " id="tdLocalStaff{{$trNumPS}}"
                                        class="fontNormal" width="15%" height="20">{{MyUtility::formatThousand($ProjectStaff->LocalStaff)}}</td>

                                    <td align="right" bgcolor="#ECE9D8" class="fontNormalBlue"
                                        width="13%" style="padding: 2px" height="20">{{MyUtility::formatThousand($ProjectStaff->LocalStaff+$ProjectStaff->StaffExpatriate)}}</td>

                                </tr>
                            @endforeach
                            @endIf
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium; padding: 2px" height="30">
                <font color="#0000FF"><b>V. </b></font> </td>
            <td width="107%" colspan="7" style="border-style: none; border-width: medium; padding: 2px" height="29">
                <b><font color="#0000FF">Attachment of
                        Project Document(s)</font></b></td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="105%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                <div align="left">

                    <table class="fontNormal" id="tblImp" cellpadding="2" style="border-collapse: collapse" border="1" bordercolor="#C0C0C0" width="50%">

                        <thead>

                        <tr>

                            <td class="text-center" bgcolor="#ECE9D8" width="30" height="26" style="padding: 2px" align="center">
                                <b>No</b></td>

                            <td class="text-center" bgcolor="#ECE9D8" height="26" style="padding: 2px" align="center">
                                <b>PDF Document</b></td>

                        </tr>

                        </thead>

                        <tbody>

                        <?php

                        $numDoc = 0;

                        ?>

                        @foreach($pro_doc as $doc)

                            <tr id="trDoc{{++$numDoc}}">

                                <td  align="center" width="30" style="padding: 2px" >{{$numDoc }}</td>

                                <td style="padding: 2px">

                                    <a href="/assets/ngo_attachment/{{$PRN}}/{{$doc->pdfDoc}}" target="_blank">{{$doc->pdfDoc}}</a></td>



                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
            <td width="105%" align="right" valign="middle" colspan="6" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                <div align="left">
                    <table class="fontNormal" id="tbl_pro_link" cellpadding="2" style="border-collapse: collapse" width="50%" border="1"
                           bordercolor="#C0C0C0">

                        <thead>

                        <tr>

                            <td class="text-center" bgcolor="#ECE9D8" width="28" style="padding: 2px" >
                                <b>No</b></td>

                            <td class="text-center" style="padding:2px; width: 94%" bgcolor="#ECE9D8" height="27">
                                <b>Link Document (Full path)</b></td>

                        </tr>

                        </thead>

                        <tbody>

                        <?php

                        $i = 0;

                        ?>

                        <b>@foreach($pro_link_doc as $link) </b>

                        <tr id="trlink{{++$i}}">
                            <td class="text-center" align="center" width="28" style="padding: 2px">
                                <b>{{$i}}</b></td>

                            <td height="28" style="padding: 2px">

                                <b>

                                    <a href="{{$link->link}}" id="link{{$i}}" target="_blank">{{$link->link}}</a>

                                </b>

                            </td>

                        </tr>

                        <b>@endforeach

                        </b>

                        </tbody>

                    </table>

                </div>
            </td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="2%" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="8%" align="left" valign="middle" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
            <td width="90%" align="left" valign="middle" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; padding: 2px">&nbsp;</td>
        </tr>
        <tr>
            <td width="2%" align="center" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" height="27">&nbsp;</td>
            <td width="2%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" height="27">&nbsp;</td>
            <td width="8%" align="left" valign="middle" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" height="27"><b>Remark:</b></td>
            <td width="90%" align="left" valign="middle" colspan="5" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px" height="27">
                <font color="#0033CC">{{$Remark}}</font></td>
        </tr>
    </table>
@endsection