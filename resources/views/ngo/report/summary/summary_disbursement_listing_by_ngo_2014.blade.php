@include("ngo.layout.no-cache")
<?php

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Bootstrap\Bootstrap;
use App\Http\Controllers\MyUtility;
use App\Http\Controllers\ngo\OwnReportController;
set_time_limit(60);
ini_set('memory_limit', '-1');

if ($toExcel == true) {
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Summary_of_Disbursement_by_Project_for_the_Year_2008.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
}

$tmpDsCount = clone $ds;
$tmpDsCount = $tmpDsCount->get();
$isProjectNull = 0;
$countRID = 0;

$gTotalOwn2014 = "";
$gTotalOther2014 = "";
$gTotalNgo2014 = "";
$gTotal2014 = "";

$gTotalOwn2015 = "";
$gTotalOther2015 = "";
$gTotalNgo2015 = "";
$gTotal2015 = "";

$gTotalPlan2016 = "";
$gTotalPlan2017 = "";
$gTotalPlan2018 = "";
?>
        <!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>COUNCIL FOR THE DEVELOPMENT OF CAMBODIA (CDC)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if($toExcel !=true)
        <?php echo (new Bootstrap())->inludeCSS() ?>
        <?php echo (new Bootstrap())->inludeJS() ?>
    @endif
</head>
<body style="background-color: #FFFFFF;">

</body>

</html>
                <form id="myform" name="myform" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(count($tmpDsCount)>0)

                        @foreach($dsCore as $row)

                            <?php
                            $tmpDisbSum = clone $dsDisbSum;
                            $tmpDisbSum = $tmpDisbSum->where("RID", $row->RID)->first();

                            $TotalOwn2014 = "";
                            $TotalOther2014 = "";
                            $TotalNgo2014 = "";
                            $Total2014 = "";

                            $TotalOwn2015 = "";
                            $TotalOther2015 = "";
                            $TotalNgo2015 = "";
                            $Total2015 = "";

                            $TotalPlan2016 = "";
                            $TotalPlan2017 = "";
                            $TotalPlan2018 = "";
                            $countRID = $countRID + 1;

                            if (count($tmpDisbSum) > 0) {
                                $TotalOwn2014 = $tmpDisbSum->TotalOwn2014;
                                $TotalOther2014 = $tmpDisbSum->TotalOther2014;
                                $TotalNgo2014 = $tmpDisbSum->TotalNgo2014;
                                $Total2014 = $tmpDisbSum->Total2014;

                                $TotalOwn2015 = $tmpDisbSum->TotalOwn2015;
                                $TotalOther2015 = $tmpDisbSum->TotalOther2015;
                                $TotalNgo2015 = $tmpDisbSum->TotalNgo2015;
                                $Total2015 = $tmpDisbSum->Total2015;

                                $TotalPlan2016 = $tmpDisbSum->TotalPlan2016;
                                $TotalPlan2017 = $tmpDisbSum->TotalPlan2017;
                                $TotalPlan2018 = $tmpDisbSum->TotalPlan2018;

                                $gTotalOwn2014 = +$TotalOwn2014;
                                $gTotalOther2014 = +$TotalOther2014;
                                $gTotalNgo2014 += $TotalNgo2014;
                                $gTotal2014 += $Total2014;


                                $gTotalOwn2015 = +$TotalOwn2015;
                                $gTotalOther2015 = +$TotalOther2015;
                                $gTotalNgo2015 += $TotalNgo2015;
                                $gTotal2015 += $Total2015;

                                $gTotalPlan2016 += $TotalPlan2016;
                                $gTotalPlan2017 += $TotalPlan2017;
                                $gTotalPlan2018 += $TotalPlan2018;

                                $getSum = $TotalOwn2014 + $TotalOther2014 + $TotalNgo2014 + $Total2014;
                                $getSum += $TotalOwn2015 + $TotalOther2015 + $TotalNgo2015 + $Total2015;

                                $getSum += $TotalPlan2016 + $TotalPlan2017 + $TotalPlan2018;
                            }
                            ?>


                            @if((count($tmpDisbSum)>0) && ($getSum >0) ||(count($dsCore) == ($countRID)))
                                <table border="0" width="100%" id="{{++$isProjectNull}}" style="border-collapse: collapse">
                                    <tr>
                                        <td align="center">
                                            <table class="fontNormal" border="0" cellpadding="2" style="border-collapse: collapse"
                                                   width="100%"
                                                   bordercolor="#E9EFFE" bordercolordark="#C0C0C0">
                                                <tr>
                                                    <td colspan="2" align="center">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center"><font color="#800000" size="3"><b>
                                                                Summary of Disbursement by Project for the Year 2015</b></font></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" width="42%">NGO's Name:</td>
                                                    <td width="57%"><b><font color="#008000"> {{$row->Org_Name_E}}</font></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" width="42%">Project Duration From:</td>
                                                    <td width="57%"><b><font color="#800080">{{$fromDate}}</font></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" width="42%">To:</td>
                                                    <td width="57%"><b><font color="#800080">{{$toDate}}</font></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" width="42%">NGO Type:</td>
                                                    <td width="57%"><b><font
                                                                    color="#008080">{{MyUtility::getNgoType($row->TypeCode)}} </font></b>
                                                    </td>
                                                </tr>
                                            </table>
                                            @if($toExcel !=true)
                                                <div align="right" class="fontNormal">
                                                    <a href="#none" onclick="toExcel();"><img
                                                                border="0" src="/images/excel.BMP" width="16"
                                                                height="16"
                                                                align="absmiddle">To Excel</a> <a href="#none"
                                                                                                  onclick="window.print()"><img
                                                                src="/images/print.gif" width="18" height="18" border="0"
                                                                align="absmiddle">Print</a>
                                                </div>
                                            @endif
                                            <div align="center">

                                                <table class="fontTiny" width="100%" border="1" bordercolor="#CCCCCC"
                                                       style="border-collapse: collapse; border-left-width:0px; border-right-width:0px"
                                                       cellpadding="3" cellspacing="0">
                                                    <tr>
                                                        <th width="20" rowspan="2" bgcolor="#ECE9D8"
                                                            style="border-left-color: #CCCCCC; border-left-width: 1px"><font
                                                                    size="1">No</font></th>
                                                        <th width="498" rowspan="2" bgcolor="#ECE9D8"><font size="1">Project Name</font>
                                                        </th>
                                                        <th rowspan="2" bgcolor="#ECE9D8"><font size="1">Status</font></th>
                                                        <td height="25" colspan="4" bgcolor="#ECE9D8" align="center"><b>
                                                                <font size="1">Total Disbursement reported
                                                                    for 2014</font></b></td>
                                                        <td height="25" colspan="4" bgcolor="#ECE9D8" align="center"><b>
                                                                <font size="1">Total Disbursement reported
                                                                    for 2015</font></b></td>
                                                        <td colspan="3" bgcolor="#ECE9D8" align="center"
                                                            style="border-right:1px solid #CCCCCC; "><b><font
                                                                        size="1">Reported
                                                                    Planned
                                                                    Allocation</font></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25" bgcolor="#ECE9D8" align="center"><b><font size="1">Own
                                                                    Resource</font></b>
                                                        </td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">Multilateral/<br>
                                                                    Bilateral</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">NGOs</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">Total</font></b></td>
                                                        <td height="25" bgcolor="#ECE9D8" align="center"><b><font size="1">Own
                                                                    Resource</font></b>
                                                        </td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">Multilateral/<br>
                                                                    Bilateral</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">NGOs</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">Total</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">2016</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"><b><font size="1">2017</font></b></td>
                                                        <td bgcolor="#ECE9D8" align="center"
                                                            style="border-right:1px solid #CCCCCC; "><b><font
                                                                        size="1">2018</font></b></td>
                                                    </tr>
                                                    <?php
                                                    $id = 0;
                                                    $tmpDs = clone $ds;
                                                    $tmpDs = $tmpDs->where("RID", "=", $row->RID)->get();
                                                    ?>
                                                    @if(count($tmpDs)>0)
                                                        @foreach($tmpDs as $row)
                                                            <?php
                                                            $own2014 = MyUtility::e2z($row->own2014);
                                                            $other2014 = MyUtility::e2z($row->other2014);
                                                            $ngo2014 = MyUtility::e2z($row->ngo2014);

                                                            $own2015 = MyUtility::e2z($row->own2015);
                                                            $other2015 = MyUtility::e2z($row->other2015);
                                                            $ngo2015 = MyUtility::e2z($row->ngo2015);

                                                            $plan2016 = MyUtility::e2z($row->plan2016);
                                                            $plan2017 = MyUtility::e2z($row->plan2017);
                                                            $plan2018 = MyUtility::e2z($row->plan2018);
                                                            $sumAmountProject =$own2014 + $other2014 + $ngo2014 + $own2015 + $other2015 + $ngo2015 + $plan2016 + $plan2017 + $plan2018;

                                                            ?>
                                                            @if(($sumAmountProject)!= 0)
                                                                @if($id %2 ==1)
                                                                    <tr valign="top" bgcolor="#EEEEEE">
                                                                @else
                                                                    <tr>
                                                                        @endif
                                                                        <td width="20" align="center"
                                                                            style="border-left-color: #CCCCCC; border-left-width: 1px">
                                                                            <font size="1">{{++$id}}.</font>
                                                                        </td>
                                                                        <td>
	  	                        <span id="printRegion">
																<a
                                                                        href="individual_project_preview?PRN={{$row->PRN}}"
                                                                        target="_blank">
                                                                    <font size="1">{{$row->PName_E}}</font></a><font
                                            size="1">
                                    </font>
																</span>
                                                                        </td>
                                                                        <td align="center" nowrap>
                                <span id="printRegion5">
																		<span id="printRegion4">
																																				<font size="1">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</font></span></span>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->own2014)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->other2014)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->ngo2014)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->own2014+$row->other2014+$row->ngo2014)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->own2015)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->other2015)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->ngo2015)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->own2015+$row->other2015+$row->ngo2015)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->plan2016)}}</font>
                                                                        </td>
                                                                        <td align="right"><font
                                                                                    size="1">{{MyUtility::formatThousand($row->plan2017)}}</font>
                                                                        </td>
                                                                        <td align="right"
                                                                            style="border-right:1px solid #CCCCCC; ">
                                                                            <font
                                                                                    size="1">{{MyUtility::formatThousand($row->plan2018)}}</font>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                @endforeach
                                                                @if(count($tmpDs)>0)
                                                                    @if($getSum >0)
                                                                        <tr valign="top" bgcolor="#E8E8FF">
                                                                            <td colspan="3" bgcolor="#ECE9D8"
                                                                                style="padding: 2px; border-left-color:#CCCCCC; border-left-width:1px"
                                                                                align="right">
                                                                                <b><font size="1">TOTAL:</font></b></td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalOwn2014)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalOther2014)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalNgo2014)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($Total2014)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalOwn2015)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalOther2015)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalNgo2015)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($Total2015)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalPlan2016)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8" style="padding: 2px">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalPlan2017)}}</font></b>
                                                                            </td>
                                                                            <td align="right" bgcolor="#ECE9D8"
                                                                                style="border-right:1px solid #CCCCCC; padding:2px; ">
                                                                                <b><font
                                                                                            size="1">{{MyUtility::formatThousand($TotalPlan2018)}}</font></b>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr valign="top">
                                                                        <th colspan="14" align="center"
                                                                            style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium">
                                                                            &nbsp;</th>
                                                                    </tr>

                                                                @endif


                                                                @if(count($dsCore) == ($countRID))

                                                                    <tr valign="middle" bgcolor="#ECE9D8" class="fontNormal">
                                                                        <td height="25" class="BoldBlue" colspan="3" align="right"
                                                                            style="border-left-color: #CCCCCC; border-left-width: 1px">
                                                                            <font color="#0000FF"><b>
                                                                                    GRAND TOTAL:</b></font></td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalOwn2014)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalOther2014)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalNgo2014)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotal2014)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalPlan2016)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalOther2015)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalNgo2015)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotal2015)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalPlan2016)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8" style="padding: 2px"><b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalPlan2017)}}</font></b>
                                                                        </td>
                                                                        <td align="right" bgcolor="#ECE9D8"
                                                                            style="border-right:1px solid #CCCCCC; padding:2px; ">
                                                                            <b>
                                                                                <font size="1"
                                                                                      color="#0000FF">
                                                                                    {{MyUtility::formatThousand($gTotalPlan2018)}}</font></b>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endif
                                                </table>

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            @endif
                        @endforeach
                    @endif
                    @if($isProjectNull == 0)
                        <table border="0" width="100%" style="border-collapse: collapse" id="{{$isProjectNull=1}}">
                            <tr>
                                <td align="center">

                                    <font size="3" color="#FF0066" face="Verdana"
                                          style="font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
                                        No Disbursement Information</font><br
                                            style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
                                </td>
                            </tr>
                        </table>
                    @endif
                </form>

				<html>

    <script>
        function toExcel() {
            $('#myform').attr('action', '/ngo/report/summary/summary_disbursement_listing_by_ngo_2015?ToExcel=true');
            ById("myform").submit();
        }
    </script>
				</p>
</p>

</html>