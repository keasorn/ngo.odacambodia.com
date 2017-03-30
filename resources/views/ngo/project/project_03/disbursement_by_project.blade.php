<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\DisbursementByProjectModel;
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
if (count($project) > 0) {
    $RID = $project->RID;
    $DisbModel=DisbursementByProjectModel::where('PRN',$PRN)->get();
    $mu=new MyUtility();
    if(count($DisbModel)>0){

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

    }

}

?>


<table border="1" width="100%" id="table2" cellpadding="2" style="border-collapse: collapse">
    <tr>
        <td>
            <div align="right">

                <table id="table3" border="1" width="100%" style="border-collapse: collapse" id="table3"
                       bordercolor="#C0C0C0" class="fontTiny" cellpadding="2">
                    <tr>
                        <th bgcolor="#ECE9D8" rowspan="3" valign="middle" align="center" width="0"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center">
                            <font color="#333333">Type of Assistance</font></th>
                        <th bgcolor="#ECE9D8" colspan="4" align="center"
                            style="padding:1px; border-bottom:1px solid #C0C0C0; border-left-color:#C0C0C0; border-right-color:#C0C0C0; border-top-color:#C0C0C0; text-align:center"
                            height="35">
                            <font color="#333333">2014 </font>Disbursements
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; border-left-color:#C0C0C0; text-align:center"
                            colspan="4" height="35">
                            <font color="#333333">2015 </font>Disbursements
                        </th>
                        <th bgcolor="#ECE9D8" colspan="4" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            height="35">
                            <font color="#333333">2016 Disbursements</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            rowspan="3">
                            <font color="#333333">2017 (Plan)</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            rowspan="3">
                            <font color="#333333">2018 (Plan)</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            rowspan="3">
                            <font color="#333333">2019 (Plan)</font></th>
                    </tr>
                    <tr>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; border-left-color:#C0C0C0; border-top-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Total</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Total</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Own Resources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border:1px solid #C0C0C0; text-align:center"
                            colspan="2">
                            <font color="#333333">Other Sources</font></th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center"
                            rowspan="2">
                            <font color="#333333">Total</font></th>
                    </tr>
                    <tr>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-right-color:#C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-right:1px solid #C0C0C0; border-left-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            NGOs
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            NGOs
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            Multilateral<br>
                            /Bilateral
                        </th>
                        <th bgcolor="#ECE9D8" align="center"
                            style="padding:1px; border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom-color:#C0C0C0; text-align:center">
                            NGOs
                        </th>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-top:medium none #C0C0C0; border-bottom:medium none #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            height="24" align="left">
                            <font color="#000080">Free-Standing Technical
                                Cooperation</font></td>
                        <td style="border-color:#C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Own2014FTC" id="Own2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{MyUtility::formatThousand($Own2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Other2014FTC" id="Other2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Other2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Ngo2014FTC" id="Ngo2014FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Ngo2014FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Total2014FTC" id="Total2014FTC" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2014FTC)}}" size="8"
                                   readonly="true" maxlength="15"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Own2015FTC" id="Own2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; ;"
                                   value="{{ MyUtility::formatThousand($Own2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Other2015FTC" id="Other2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right;"
                                   value="{{ MyUtility::formatThousand($Other2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Ngo2015FTC" id="Ngo2015FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; "
                                   value="{{ MyUtility::formatThousand($Ngo2015FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Total2015FTC" id="Total2015FTC" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2015FTC)}}" size="8"
                                   readonly="true" maxlength="15"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Own2016FTC" id="Own2016FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Own2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Other2016FTC" id="Other2016FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Other2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Ngo2016FTC" id="Ngo2016FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right;  "
                                   value="{{ MyUtility::formatThousand($Ngo2016FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Total2016FTC" id="Total2016FTC" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2016FTC)}}" size="8"
                                   readonly="true" maxlength="15"></td>
                        <td                             align="center" height="24">
                            <input name="Plan2017FTC" id="Plan2017FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2017FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td align="center" height="24">
                            <input name="Plan2018FTC" id="Plan2018FTC" type="text" class="TextBoxDisb"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2018FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                        <td style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:medium none #C0C0C0; border-bottom:medium none #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            align="center" height="24">
                            <input name="Plan2019FTC" id="Plan2019FTC" type="text" class="TextBoxDisb"
                                   style=" text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2019FTC)}}" size="8"
                                   maxlength="15" onblur="refreshFTC(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left">
                            <font color="#000080">Investment- Related Technical
                                Cooperation</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-bottom-color:#C0C0C0">
                            <input type="text" class="TextBoxDisb" name="Own2014ITC" id="Own2014ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Own2014ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2014ITC" id="Other2014ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Other2014ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2014ITC" id="Ngo2014ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2014ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2014ITC" id="Total2014ITC" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2014ITC)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2015ITC" id="Own2015ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Own2015ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2015ITC" id="Other2015ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Other2015ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2015ITC" id="Ngo2015ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2015ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2015ITC" id="Total2015ITC" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2015ITC)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2016ITC" id="Own2016ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Own2016ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2016ITC" id="Other2016ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Other2016ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2016ITC" id="Ngo2016ITC" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2016ITC)}}"
                                   maxlength="15" onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2016ITC" id="Total2016ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Total2016ITC)}}" maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; ">
                            <input type="text" class="TextBoxDisb" name="Plan2017ITC" id="Plan2017ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2017ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            >
                            <input type="text" class="TextBoxDisb" name="Plan2018ITC" id="Plan2018ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2018ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Plan2019ITC" id="Plan2019ITC" size="8"
                                   style="text-align: right; "
                                   value="{{ MyUtility::formatThousand($Plan2019ITC)}}" maxlength="15"
                                   onblur="refreshITC(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left">
                            <font color="#000080">Investment Project/Programme</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0">
                            <input type="text" class="TextBoxDisb" name="Own2014IPA" id="Own2014IPA"
                                   value="{{ MyUtility::formatThousand($Own2014IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2014IPA" id="Other2014IPA"
                                   value="{{ MyUtility::formatThousand($Other2014IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2014IPA" id="Ngo2014IPA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2014IPA)}}"
                                   maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2014IPA" id="Total2014IPA"
                                   value="{{ MyUtility::formatThousand($Total2014IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2015IPA" id="Own2015IPA"
                                   value="{{ MyUtility::formatThousand($Own2015IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2015IPA" id="Other2015IPA"
                                   value="{{ MyUtility::formatThousand($Other2015IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2015IPA" id="Ngo2015IPA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2015IPA)}}"
                                   maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2015IPA" id="Total2015IPA"
                                   value="{{ MyUtility::formatThousand($Total2015IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <font face="Tahoma,Verdana">
                                <input type="text" class="TextBoxDisb" name="Own2016IPA" id="Own2016IPA"
                                       value="{{ MyUtility::formatThousand($Own2016IPA)}}" size="8"
                                       style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></font></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2016IPA" id="Other2016IPA"
                                   value="{{ MyUtility::formatThousand($Other2016IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2016IPA" id="Ngo2016IPA"
                                   value="{{ MyUtility::formatThousand($Ngo2016IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2016IPA" id="Total2016IPA"
                                   value="{{ MyUtility::formatThousand($Total2016IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; ">
                            <input type="text" class="TextBoxDisb" name="Plan2017IPA" id="Plan2017IPA"
                                   value="{{ MyUtility::formatThousand($Plan2017IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            >
                            <input type="text" class="TextBoxDisb" name="Plan2018IPA" id="Plan2018IPA"
                                   value="{{ MyUtility::formatThousand($Plan2018IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Plan2019IPA" id="Plan2019IPA"
                                   value="{{ MyUtility::formatThousand($Plan2019IPA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshIPA(this)"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left">
                            <font color="#000080">Food Aid</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0">
                            <input type="text" class="TextBoxDisb" name="Own2014FOA" id="Own2014FOA"
                                   value="{{ MyUtility::formatThousand($Own2014FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2014FOA" id="Other2014FOA"
                                   value="{{ MyUtility::formatThousand($Other2014FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2014FOA" id="Ngo2014FOA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2014FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2014FOA" id="Total2014FOA" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2014FOA)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2015FOA" id="Own2015FOA"
                                   value="{{ MyUtility::formatThousand($Own2015FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2015FOA" id="Other2015FOA"
                                   value="{{ MyUtility::formatThousand($Other2015FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2015FOA" id="Ngo2015FOA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2015FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2015FOA" id="Total2015FOA" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2015FOA)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2016FOA" id="Own2016FOA"
                                   value="{{ MyUtility::formatThousand($Own2016FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2016FOA" id="Other2016FOA"
                                   value="{{ MyUtility::formatThousand($Other2016FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2016FOA" id="Ngo2016FOA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2016FOA)}}"
                                   maxlength="15" onblur="refreshFOA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2016FOA" id="Total2016FOA"
                                   value="{{ MyUtility::formatThousand($Total2016FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; ">
                            <input type="text" class="TextBoxDisb" name="Plan2017FOA" id="Plan2017FOA"
                                   value="{{ MyUtility::formatThousand($Plan2017FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            >
                            <input type="text" class="TextBoxDisb" name="Plan2018FOA" id="Plan2018FOA"
                                   value="{{ MyUtility::formatThousand($Plan2018FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Plan2019FOA" id="Plan2018FOA0"
                                   value="{{ MyUtility::formatThousand($Plan2019FOA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left">
                            <font color="#000080">Emergency and Relief Assistance</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0">
                            <input type="text" class="TextBoxDisb" name="Own2014ERA" id="Own2014ERA"
                                   value="{{ MyUtility::formatThousand($Own2014ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2014ERA" id="Other2014ERA"
                                   value="{{ MyUtility::formatThousand($Other2014ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2014ERA" id="Ngo2014ERA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2014ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2014ERA" id="Total2014ERA" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2014ERA)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2015ERA" id="Own2015ERA"
                                   value="{{ MyUtility::formatThousand($Own2015ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2015ERA" id="Other2015ERA"
                                   value="{{ MyUtility::formatThousand($Other2015ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2015ERA" id="Ngo2015ERA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2015ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2015ERA" id="Total2015ERA" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2015ERA)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2016ERA" id="Own2016ERA"
                                   value="{{ MyUtility::formatThousand($Own2016ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2016ERA" id="Other2016ERA"
                                   value="{{ MyUtility::formatThousand($Other2016ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2016ERA" id="Ngo2016ERA" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2016ERA)}}"
                                   maxlength="15" onblur="refreshERA(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2016ERA" id="Total2016ERA"
                                   value="{{ MyUtility::formatThousand($Total2016ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; ">
                            <input type="text" class="TextBoxDisb" name="Plan2017ERA" id="Plan2017ERA"
                                   value="{{ MyUtility::formatThousand($Plan2017ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            >
                            <input type="text" class="TextBoxDisb" name="Plan2018ERA" id="Plan2018ERA"
                                   value="{{ MyUtility::formatThousand($Plan2018ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Plan2019ERA" id="Plan2019ERA"
                                   value="{{ MyUtility::formatThousand($Plan2019ERA)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                    </tr>
                    <tr>
                        <td style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            align="left">
                            <font color="#000080">Other</font></td>
                        <td align="center"
                            style="border-left:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0; border-bottom-color:#C0C0C0">
                            <input type="text" class="TextBoxDisb" name="Own2014NOT" id="Own2014NOT"
                                   value="{{ MyUtility::formatThousand($Own2014NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2014NOT" id="Other2014NOT"
                                   value="{{ MyUtility::formatThousand($Other2014NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2014NOT" id="Ngo2014NOT" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2014NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2014NOT" id="Total2014NOT" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2014NOT)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2015NOT" id="Own2015NOT"
                                   value="{{ MyUtility::formatThousand($Own2015NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2015NOT" id="Other2015NOT"
                                   value="{{ MyUtility::formatThousand($Other2015NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2015NOT" id="Ngo2015NOT" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2015NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input name="Total2015NOT" id="Total2015NOT" type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   value="{{ MyUtility::formatThousand($Total2015NOT)}}" size="8" readonly="true"
                                   maxlength="15"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Own2016NOT" id="Own2016NOT"
                                   value="{{ MyUtility::formatThousand($Own2016NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Other2016NOT" id="Other2016NOT"
                                   value="{{ MyUtility::formatThousand($Other2016NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Ngo2016NOT" id="Ngo2016NOT" size="8"
                                   style="text-align: right; " value="{{ MyUtility::formatThousand($Ngo2016NOT)}}"
                                   maxlength="15" onblur="refreshNOT(this)"></td>
                        <td align="center"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb"
                                   style="border:1px solid #C0C0C0; text-align: right; color:#000080; background-color:#EEEEEE;"
                                   readonly="readonly" name="Total2016NOT" id="Total2016NOT"
                                   value="{{ MyUtility::formatThousand($Total2016NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; ">
                            <input type="text" class="TextBoxDisb" name="Plan2017NOT" id="Plan2017NOT"
                                   value="{{ MyUtility::formatThousand($Plan2017NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            >
                            <input type="text" class="TextBoxDisb" name="Plan2018NOT" id="Plan2018NOT"
                                   value="{{ MyUtility::formatThousand($Plan2018NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                        <td align="center"
                            style="border-left:medium none #C0C0C0; border-right:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px">
                            <input type="text" class="TextBoxDisb" name="Plan2019NOT" id="Plan2019NOT"
                                   value="{{ MyUtility::formatThousand($Plan2019NOT)}}" size="8"
                                   style="text-align: right; " maxlength="15"></td>
                    </tr>
                    <tr>
                        <td class="fontTiny"
                            style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0"
                            bgcolor="#ECE9D8" align="center" height="20">
                            <b>Total:</b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-color:#C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            height="20">
                            <b>
                                {{MyUtility::formatThousand($TotalOwn2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-right-color:#C0C0C0; border-top-color:#C0C0C0"
                            height="20">
                            <b>
                                {{MyUtility::formatThousand($TotalOther2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-left-color:#C0C0C0; border-top-color:#C0C0C0"
                            height="20">
                            <b>
                                {{MyUtility::formatThousand($TotalNgo2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>
                                {{MyUtility::formatThousand($TotalOwn2014+$TotalOther2014+$TotalNgo2014)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>&nbsp;{{MyUtility::formatThousand($TotalOwn2015)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalOther2015)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalNgo2015)}}                        </b>

                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalOwn2015+$TotalOther2015+$TotalNgo2015)}}         </b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalOwn2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalOther2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalNgo2016)}}
                            </b></td>
                        <td class="fontTiny" align="right" bgcolor="#ECE9D8"
                            style="border-left:1px solid #C0C0C0; border-right:1px solid #C0C0C0; border-bottom:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px; border-top-color:#C0C0C0"
                            height="20">
                            <b>{{MyUtility::formatThousand($TotalOwn2016+$TotalOther2016+$TotalNgo2016)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            bgcolor="#ECE9D8" height="20">
                            <b>{{MyUtility::formatThousand($TotalPlan2017)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            bgcolor="#ECE9D8" height="20">
                            <b>{{MyUtility::formatThousand($TotalPlan2018)}}
                            </b>
                        </td>
                        <td class="fontTiny" align="right"
                            style="border:1px solid #C0C0C0; padding-left:1px; padding-right:1px; padding-top:1px; padding-bottom:1px"
                            bgcolor="#ECE9D8" height="20">
                            <b>{{MyUtility::formatThousand($TotalPlan2019)}}
                            </b>
                        </td>
                    </tr>
                </table>

            </div>

        </td>
    </tr>
</table>

<script type="text/javascript">
    function init(){
        byid("Own2014ITC").onblur()
        byid("Own2014FTC").onblur()
        byid("Own2014IPA").onblur()
        byid("Own2014FOA").onblur()
        byid("Own2014ERA").onblur()
        byid("Own2014NOT").onblur()

    }
    init();
</script>