<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ActualCommitmentModel;
use App\Models\ngo\MultiBilateralCommitmentModel;

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
//    $ActualCommitmentModel = DB::table('tbl_ngo_planned_budget_allocation')->where('PRN', '=', $PRN)->orderBy('Year');
    $TotalPlanBudget = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('PlanBudget');
    $TotalOwnFund = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('OwnFund');
    $ActualCommitmentModel = $ActualCommitmentModel->paginate();
    $yearAc=ActualCommitmentModel::select("year")->where('PRN', '=', $PRN)->get();

    $totalAmountNgoSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)
            ->where('SourceType',3)->whereIn('year',$yearAc)->sum("Amount");
    $totalMbSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->whereIn('year',$yearAc)
            ->whereIn('SourceType',[1,2])->sum("Amount");


} else {
    $ActualCommitmentModel = null;
}
$trNumAC = 0;
        $totalMB=0;
        $totalNGO=0;
?>

{!!MyUtility::ajaxPaging($ActualCommitmentModel, "pagingAC")!!}
<div align="left">
<table border="1" width="99%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0">
 
	<tr>

                        <th width="4%" bgcolor="#ECE9D8" nowrap valign="middle" rowspan="2" style="text-align: center; padding: 4px">
                            <font color="#333333">No</font></th>
                        <th style="padding:4px; align:center; text-align:center" nowrap bgcolor="#ECE9D8" valign="middle"
                            width="147" rowspan="2">
                            <font color="#333333">ActualCommitment</font></th>

                        <th style="padding:4px; align:center; text-align:center" nowrap bgcolor="#ECE9D8" valign="middle"
                            width="147" rowspan="2">
                            <font color="#333333">ActualCommitment</font></th>

                        <th bgcolor="#ECE9D8" colspan="4" style="text-align: center; padding: 4px">
                            Commitment
                        </th>

                        <th bgcolor="#ECE9D8" rowspan="2" width="13%" style="text-align: center; padding: 4px">
                            <font color="#333333">Funding Gap</font></th>

                    </tr>
	<tr>
	
                            <th bgcolor="#ECE9D8" width="14%" style="text-align: center; padding: 4px">
                                <font color="#333333">Own Fund(**)</font></th>

                            <th bgcolor="#ECE9D8" width="17%" style="text-align: center; padding: 4px">
                                <font color="#333333">
                                    Multilateral/Bilateral</font></th>
                            <th bgcolor="#ECE9D8" width="14%" style="text-align: center; padding: 4px">
                                <font color="#333333">NGOs/Others</font></th>
                            <th bgcolor="#ECE9D8" width="26%" style="text-align: center; padding: 4px">
                                <font color="#333333">Total</font></th>
 
	</tr>
	
    @foreach($ActualCommitmentModel as $ActualCommitment )
	<tr>

                                <td align="center" nowrap class="fontNormal">{{++$trNo}}</td>
                                <td align="left" class="fontNormal" id="tdAcCYear{{$trNumAC}}0" width="147">
                                    {{$ActualCommitment->Year}}</td>
                                <td align="left" class="fontNormal" id="tdACPlanBudget{{$trNumAC}}0" width="147">
                                    {{MyUtility::formatThousand($ActualCommitment->PlanBudget)}}</td>
                                <td align="right" style="padding-right: 5px" id="tdACOwnFund{{$trNumAC}}0" nowrap
                                    class="fontNormal"
                                    width="14%">{{MyUtility::formatThousand($ActualCommitment->OwnFund)}}</td>
                                <td align="right" style="padding-right: 5px" nowrap class="fontNormal" bgcolor="#ECE9D8"
                                    width="16%">{{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicMB))}}</td>
                                <td align="right" style="padding-right: 5px" nowrap class="fontNormal" bgcolor="#ECE9D8"
                                    width="13%">{{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

                                <td align="right" bgcolor="#ECE9D8" style="padding-right: 5px" nowrap
                                    class="fontNormalBlue" width="26%">{{MyUtility::formatThousand($ActualCommitment->OwnFund + MyUtility::getDictData($ActualCommitment->Year,$dicMB) + MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

                                <td align="right" bgcolor="#ECE9D8" class="fontNormalBlue"
                                    width="13%">{{MyUtility::formatThousand($ActualCommitment->PlanBudget - ($ActualCommitment->OwnFund + MyUtility::getDictData($ActualCommitment->Year,$dicMB)+MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources)))}}</td>

                            </tr>
	<tr>
	@endforeach
                            <td align="center" colspan="2" class="fontNormal" nowrap bgcolor="#FFFFFF">
                                Total
                            </td>

                            <td align="right" class="fontNormalBlue" nowrap style="padding-right: 5px" height="20"
                                valign="middle" width="14%" bgcolor="#FFFFFF">
                                <font color="#0000FF">{{MyUtility::formatThousand($TotalPlanBudget)}}</font></td>
                            <td align="right" class="fontNormalBlue" nowrap valign="middle" style="padding-right: 5px"
                                height="20" width="16%">
                                <font color="#0000FF">{{MyUtility::formatThousand($TotalOwnFund)}}</font></td>
                            <td align="right" class="fontNormalBlue" nowrap valign="middle" style="padding-right: 5px"
                                height="20" width="13%">
                                {{MyUtility::formatThousand($totalMbSource)}}</td>

                            <td align="right" class="fontNormalBlue" nowrap style="padding-right: 5px" height="20"
                                valign="middle" width="12%">
                                {{MyUtility::formatThousand($totalAmountNgoSource)}}</td>

                            <td align="right" class="fontNormalBlue" nowrap valign="bottom" height="20" width="13%">
                                {{MyUtility::formatThousand($TotalOwnFund+$totalAmountNgoSource + $totalMbSource)}}</td>
                            <td align="right" class="fontNormalBlue" nowrap valign="bottom" height="20" width="13%">
                                {{MyUtility::formatThousand($TotalPlanBudget-($TotalOwnFund+$totalAmountNgoSource + $totalMbSource))}}</td>
                        </tr>
	</table></div>
