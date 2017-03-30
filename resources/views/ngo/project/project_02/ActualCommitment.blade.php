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
	$TotalRGCFund = ActualCommitmentModel::where('PRN', '=', $PRN)->sum('RGCFund');
	$ActualCommitmentModel = $ActualCommitmentModel->paginate(5);

	$yearAc=ActualCommitmentModel::select("year")->where('PRN', '=', $PRN)->get();

	$totalAmountNgoSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)
			->where('SourceType',3)->whereIn('year',$yearAc)->sum("Amount");
	$totalMbSource = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->whereIn('year',$yearAc)
			->whereIn('SourceType',[1,2])->sum("Amount");



} else {
	$ActualCommitmentModel = null;
}
$trNumAC = 0;
?>

<table border="0" style="border-collapse: collapse" cellpadding="2" width="80%">
	<tr>
		<td align="center" width="500" height="22">
			<p align="left">{!!MyUtility::ajaxPaging($ActualCommitmentModel, "pagingAC")!!}</td>
	</tr>
	<tr>
		<td align="left" style="padding: 2px">
			<div align="center">
				<table border="1" width="100%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
					   name="tblActualCommitment" id="tblActualCommitment">
					
				
						<tr id="">

						<td bgcolor="#ECE9D8" width="20" style="text-align: center; padding: 2px; ">
							<font color="#0000FF">
								<input type="checkbox" name="ckhActualCommitment[]" id="chkDeleteAllActualCommitment"
									   value="ON"
									   onclick="checkACAll(this)" style="font-weight: 700"></font></td>

						<td bgcolor="#ECE9D8" width="40" style="text-align: center; padding: 2px; ">
							<b>
							<font color="#333333">No</font></b></td>
						<td width="50" style="padding:2px; align:center; " bgcolor="#ECE9D8" align="center">
							<b>Year</b></td>

						<td width="100" style="padding:2px; align:center; text-align:center" bgcolor="#ECE9D8">
							<b>
							<font color="#333333">Budget</font></b></td>

							<td width="100" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
								<b>Own Fund(**)</b></td>
 

							<td width="100" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
								<b>RGC Financial Contribution</b></td>

							<td width="100" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
								<b>
								<font color="#333333">
									Multilateral/Bilateral</font></b></td>
							<td bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
								<b>
								<font color="#333333">NGOs/Others</font></b></td>
							<td width="100" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
								<b>
								<font color="#333333">Total</font></b></td>

						<td bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
							<b>
							<font color="#333333">Funding Gap</font></b></td>

						<td width="50" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
							&nbsp;</td>

						</tr>
						
							@if(count($ActualCommitmentModel)>0)
						<?php
						$pageSize = $ActualCommitmentModel->perPage();
						$currentPage = $ActualCommitmentModel->currentPage();
						$trNumAC = 0;
						$trNo = $currentPage * ($pageSize) - $pageSize;
						?>
						@foreach($ActualCommitmentModel as $ActualCommitment )

							<tr id="trActualCommitment{{++$trNumAC}}">
								<td align="center" style="padding:2px; text-align: center">
									<input type="checkbox" name="chkActualCommitment[]"
										   id="chkActualCommitment{{$trNumAC}}"
										   value="{{$ActualCommitment->ActualCommitmentId}}"
										   onclick="chkActualCommitment(this,'{{$trNumAC}}')"></td>

								<td align="center" class="fontNormal" style="padding:2px; text-align: center">{{++$trNo}}.</td>
								<td align="center" class="fontNormal" id="tdAcCYear{{$trNumAC}}" style="padding:2px; ">
									{{$ActualCommitment->Year}}</td>
								<td align="center" class="fontNormal" id="tdACPlanBudget{{$trNumAC}}" style="padding:2px; text-align: right">
									{{MyUtility::formatThousand($ActualCommitment->PlanBudget)}}</td>
								<td align="center" style="padding:2px; text-align:right" id="tdACOwnFund{{$trNumAC}}"
									class="fontNormal">{{MyUtility::formatThousand($ActualCommitment->OwnFund)}}</td>
								<td align="center" style="padding:2px; text-align:right" id="tdACRGCFund{{$trNumAC}}"
									class="fontNormal">{{MyUtility::formatThousand($ActualCommitment->RGCFund)}}</td>
								<td align="center" style="padding:2px; text-align:right" class="fontNormal" bgcolor="#ECE9D8">{{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicMB))}}</td>
								<td align="center" style="padding:2px; text-align:right" class="fontNormal" bgcolor="#ECE9D8">{{MyUtility::formatThousand(MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

								<td align="center" bgcolor="#ECE9D8" style="padding:2px; text-align:right"
									class="fontNormalBlue">{{MyUtility::formatThousand($ActualCommitment->OwnFund 
								+$ActualCommitment->RGCFund+ MyUtility::getDictData($ActualCommitment->Year,$dicMB)+MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources))}}</td>

								<td align="center" bgcolor="#ECE9D8" class="fontNormalBlue" style="padding:2px; text-align: right">{{MyUtility::formatThousand($ActualCommitment->PlanBudget - ($ActualCommitment->OwnFund+$ActualCommitment->RGCFund + MyUtility::getDictData($ActualCommitment->Year,$dicMB)+MyUtility::getDictData($ActualCommitment->Year,$dicNgoSources)))}}</td>

								<td align="center" style="padding:2px; text-align: center">
									<a href="#none" id="10"
									   onclick="editProjectActualCommitment({{$ActualCommitment->ActualCommitmentId}},{{$trNumAC}})"><img
												src="/images/file-edit.png" title="Edit Record" width="16"
												height="16" border="0"
												align="absmiddle"></a>

									<a href="#none"
									   onclick="
											   ClearSelectionRow('tblActualCommitment')
											   byid('trActualCommitment{{$trNumAC}}').style.background='red';
											   if (confirm('Are you sure to delete?')){
											   var submitValue = '?PRN={{$PRN}}'
											   submitValue += '&ActualCommitmentId={{$ActualCommitment->ActualCommitmentId}}'
											   Ajax_UpdatePanelAsync('/ngo/project/project_02/project_ActualCommitment_delete',submitValue,'spanActualCommitment',true)
											   }
											   else
											   {
											   ClearSelectionRow('tblActualCommitment')
											   }

											   "><img
												border="0" src="/images/delete.png" width="16" height="16"
												title="Delete Record"
												align="middle"></a></td>
								<input type="hidden" name="" id="ActualCommitmentId{{$trNumAC}}"
									   value="{{$ActualCommitment->ActualCommitmentId}}">
							</tr>
						@endforeach
						@endIf
						<tr>
							<td align="center" colspan="3" class="fontNormal" bgcolor="#FFFFFF" style="padding:2px; text-align: center">
								<b>Total
							</b>
							</td>
							<td align="center" class="fontNormal" bgcolor="#FFFFFF" style="padding:2px; text-align: right">
								<b>
								<font color="#0000FF">{{MyUtility::formatThousand($TotalPlanBudget)}}</font></b></td>

							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:right" height="20" bgcolor="#FFFFFF">
								<b>
								<font color="#0000FF">{{MyUtility::formatThousand($TotalOwnFund)}}</font></b></td>

							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:right" height="20" bgcolor="#FFFFFF">
								<b>
								<font color="#0000FF">{{MyUtility::formatThousand($TotalRGCFund)}}</font></b></td>
							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:right"
								height="20">
								<b>{{MyUtility::formatThousand($totalMbSource)}}</b></td>
							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:right"
								height="20">
								<b>{{MyUtility::formatThousand($totalAmountNgoSource)}}</b></td>

							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:right" height="20">
								<b>{{MyUtility::formatThousand($TotalOwnFund+$TotalRGCFund+$totalAmountNgoSource + $totalMbSource)}}</b></td>

							<td align="center" class="fontNormalBlue" height="20" style="padding:2px; text-align: right">
								<b>{{MyUtility::formatThousand($TotalPlanBudget-($TotalOwnFund+$totalAmountNgoSource + $totalMbSource))}}</b></td>
							<td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; text-align: center">
								<b>&nbsp;
						</b>
						</tr>
						</tr>
						<tr>
							<td align="center" colspan="2" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; text-align: center">
								<font color="#FFFF00">
									<a href="#none"
									   onclick="deleteAllActualCommitment({{$trNumAC}})">Delete All</a></font></td>
							<td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; ">
								<select name="AcCYear" id="AcCYear" size="1" class="fontNormal"
										style="width:60px;">
									<option value="0000"></option>
									@for($i=0;$i<30;$i++)
										<option value="{{1993+$i}}">{{1993+$i}}</option>
									@endfor
								</select></td>

							<td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; text-align: center">
								<input type="text" name="PlanBudget" id="PlanBudget" size="1" class="TextBoxNumber"
									   onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>

							<td align="center" style="padding:2px; text-align:center" height="20" bgcolor="#ECE9D8">
								<input type="text" name="OwnFund" id="OwnFund" size="1" class="TextBoxNumber"
									   onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>

							<td align="center" style="padding:2px; text-align:center" height="20" bgcolor="#ECE9D8">
								<input type="text" name="RGCFund" id="RGCFund" size="1" class="TextBoxNumber"
									   onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>
							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:center"
								height="20" bgcolor="#ECE9D8">
								&nbsp;</td>
							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:center"
								height="20" bgcolor="#ECE9D8">
								&nbsp;</td>

							<td align="center" class="fontNormalBlue" style="padding:2px; text-align:center" height="20" bgcolor="#ECE9D8">
								&nbsp;</td>

							<td align="center" class="fontNormalBlue" height="20"
								bgcolor="#ECE9D8" style="padding:2px; text-align: center">
								&nbsp;</td>
							<td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; text-align: center">
								<a href="#none" title="Add" id="anchorAddActualCommitment"
								   onclick="insertActualCommitment(this.title)">
									<img id="bntAddActualCommitment" title="Add" border="" src="/images/add.png"
										 width="16"
										 height="16"></a>&nbsp;
								<a href="#none" title="Cancel" onclick="
                                ById('oldYear').value = ''
                                ById('ActualCommitmentId').value = ''
                                ById('AcCYear').value = ''
                                ById('PlanBudget').value = ''
                                ById('OwnFund').value = ''
                                ById('RGCFund').value = ''
                                ById('bntAddActualCommitment').title = 'Add'
                                ById('bntAddActualCommitment').src = '/images/add.png'
                                ClearSelectionRow('tblActualCommitment')
                                "><img title="Cancel" border="0" src="/images/reload.png" width="16"
									   height="16"></a>
						</tr>
						</tr>
				</table>
				<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
					<tr>
						<td>
							<font color="#0066CC">* Own Fund that NGOs mobilized by themselves, including private
								donation and sponsorship and all other contributions that
								ARE NOT from other NGOs, government and development partner
								organizations.
							</font>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>

<input type="hidden" id="trNumActualCommitment" name="trNumActualCommitment" value="{{$trNumAC}}">
<input type="hidden" id="ActualCommitmentId" name="ActualCommitmentId">
<input type="hidden" id="oldYear" name="oldYear" value="">

<script type="text/javascript">
	function checkACAll(obj) {
		var trNumActualCommitment = ById('trNumActualCommitment').value;
		checkAll(obj, trNumActualCommitment, 'tblActualCommitment', 'trActualCommitment', 'chkActualCommitment');
	}
	function editProjectActualCommitment(ActualCommitmentId, row) {
		ClearSelectionRow('tblActualCommitment')
		editRow('trActualCommitment' + row);
		var tdAcCYear = ($('#tdAcCYear' + row).text()).trim();
		var tdPlanBudget = ($('#tdACPlanBudget' + row).text()).trim();
		var tdOwnFund = ($('#tdACOwnFund' + row).text()).trim();
		var tdACRGCFund = ($('#tdACRGCFund' + row).text()).trim();
		byid('AcCYear').value = tdAcCYear
		byid('PlanBudget').value = tdPlanBudget
		byid('OwnFund').value = tdOwnFund
		byid('RGCFund').value = tdACRGCFund

		byid('oldYear').value = tdAcCYear;
		byid('ActualCommitmentId').value = ActualCommitmentId;

		ById('bntAddActualCommitment').src = '/images/save-alt.png'
		ById('bntAddActualCommitment').title = 'Update'
		ById('anchorAddActualCommitment').title = 'Update'
	}
	function chkActualCommitment(chk, tr_no) {
		var allCh = getvalueCheckGroup('chkActualCommitment').length;
		byId("trActualCommitment" + tr_no).style.backgroundColor = "red";
		var n = byid('trNumActualCommitment').value;
		if (allCh == n) {
			byId("chkDeleteAllActualCommitment").checked = true;
		} else {
			ById("chkDeleteAllActualCommitment").checked = false;
		}
		if (chk.checked) {
			byId("trActualCommitment" + tr_no).style.backgroundColor = "red";
		} else {
			byId("trActualCommitment" + tr_no).style.backgroundColor = "white";
		}
	}
	function checkFillAcCommitment() {

		var Ctrl = ById('AcCYear')
		if (Ctrl.selectedIndex == 0) {
			byId('AcCYear').title = 'Please select Year';
			$('#AcCYear').tooltip('show');
			Ctrl.focus();
			return false;
		}

		check = (ById('PlanBudget').value == '')
		if (check) {
			byId('PlanBudget').title = 'Please input PlanBudget';
			$('#PlanBudget').tooltip('show');
			ById('PlanBudget').focus();
			return false;
		}
		check = (ById('OwnFund').value == '')
		if (check) {
			byId('OwnFund').title = 'Please input OwnFund';
			$('#OwnFund').tooltip('show');
			ById('OwnFund').focus();
			return false;
		}
		return true

	}
	function pagingAC(page) {
		var data = '?PRN={{$PRN}}';
		data += '&page=' + page;
		Ajax_UpdatePanel("/ngo/project/project_02/listing_project_ActualCommitment", data, "spanActualCommitment", true);
	}

	function deleteAllActualCommitment(totalRow) {
		var ActualCommitmentId = getCheckBoxValues("chkActualCommitment", totalRow)
		if (ActualCommitmentId != "") {
			var answer = confirm("Are you sure to delete?")
			if (answer) {
				// ajax to delete
				var data = "?PRN=" + {{$PRN}};
				data += "&ActualCommitmentId=" + ActualCommitmentId;
				Ajax_UpdatePanel("/ngo/project/project_02/project_ActualCommitment_delete_all", data, "spanActualCommitment", true);

			} else {
				// do nothing
			}
		}
	}


	function insertActualCommitment(title) {
		var ActualCommitment = ById('ActualCommitmentId').value;
		var AcCYear = ById('AcCYear').value;
		var oldYear = ById('oldYear').value;
		var submitValue = '?ActualCommitmentId=' + ById('ActualCommitmentId').value;
		submitValue += '&Year=' + ById('AcCYear').value;
		submitValue += '&PRN={{$PRN}}';
		submitValue += '&PlanBudget=' + byid('PlanBudget').value;
		submitValue += '&OwnFund=' + byid('OwnFund').value;
		submitValue += '&RGCFund=' + byid('RGCFund').value;
		canUpdate = true;
		if (AcCYear != oldYear) {
			isActualCommitmentExist = Ajax_getResult("/ngo/project/project_02/project_ActualCommitment_exist", submitValue) == "true";
			if (isActualCommitmentExist) {
				byId('AcCYear').title = 'Year already exist';
				$('#AcCYear').tooltip('show')
				return;
			} else {
				// update
				canUpdate = true;
			}
		}
		if ((checkFillAcCommitment()) && canUpdate) {
			if (title == "Add") {
				Ajax_UpdatePanel('/ngo/project/project_02/project_ActualCommitment_insert', submitValue, 'spanActualCommitment', true)
			} else {
				Ajax_UpdatePanel('/ngo/project/project_02/project_ActualCommitment_update', submitValue, 'spanActualCommitment', true)
			}

		} else {
			return;
		}
	}

	function initActualCommitment() {
		QueryOrg(1)
	}
	initActualCommitment();
</script>