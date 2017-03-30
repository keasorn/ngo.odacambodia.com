<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel; 
use App\Models\ngo\ProjectCounterpartModel;
if (count($project) > 0) {
    $PRN = $project->PRN;
    $counterpartModel = ProjectCounterpartModel::where('PRN', '=', $PRN);
    $counterpartModel = $counterpartModel->paginate(5);
} else {
    $counterpartModel = null;
}
$trNumCnp = 0;
?>
<table border="0" width="100%" style="border-collapse: collapse" cellpadding="2">
	<tr>
		<td align="center" width="500" height="22">
			{!!MyUtility::ajaxPaging($counterpartModel, "pagingCnp")!!}</td>
	</tr>
	<tr>
		<td align="left">
			<table border="1" width="600" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
				   name="tblImpCnp" id="tblImpCnp">
				<tr>

					<td width="2%" bgcolor="#ECE9D8" style="text-align: center; padding: 4px">
						<font color="#0000FF">
							<input type="checkbox" name="ckhCnp[]" id="chkDeleteAllCnp" value="ON"
								   onclick="checkCnpAll(this)" style="font-weight: 700"></font></td>

					<td width="4%" bgcolor="#ECE9D8" style="text-align: center; padding: 4px">
						<b>
						<font color="#333333">No</font></b></td>
					<td align="center" style="padding:4px; align:center; text-align:center" bgcolor="#ECE9D8"
						width="100">
						<b style="color: rgb(0, 0, 0); font-family: Verdana, Tahoma; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: nowrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
						<font color="#333333">Counterpart Type</font></b></td>

					<td bgcolor="#ECE9D8" width="51%" style="text-align: center; padding: 4px">
						<b style="color: rgb(0, 0, 0); font-family: Verdana, Tahoma; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: -webkit-center; text-indent: 0px; text-transform: none; white-space: nowrap; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
						<font color="#333333">Counterpart Name</font></b></td>

					<td align="center" bgcolor="#ECE9D8" width="50" style="text-align: center; padding: 4px">
						<b>&nbsp;                        </b>                        
					</td>
				</tr>

				@if(count($counterpartModel)>0)
                    <?php
                    $pageSize = $counterpartModel->perPage();
                    $currentPage = $counterpartModel->currentPage();
                    $trNumCnp = 0;
                    $trNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
					@foreach($counterpartModel as $Cnp )
						<tr id="trCnp{{++$trNumCnp}}">
							<td align="center">
								<input type="checkbox" name="chkCnp[]" id="chkCnp{{$trNumCnp}}"
									   value="{{$Cnp->ProjectCounterpartId}}"
									   onclick="chkCnp(this,'{{$trNumCnp}}')"></td>

							<td align="center" class="fontNormal">{{++$trNo}}.</td>
							<td align="center" class="fontNormal" id="CounterType{{$trNumCnp}}" width="100">
								{{MyUtility::getCounterpartName($Cnp->CounterType)}}</td>
							<td align="left" class="fontNormal"
								width="51%" id="CounterName{{$trNumCnp}}">
								{{$Cnp->CounterName}}</td>

							<td align="center" width="50">
								<a href="#none" id="10"
								   onclick="editProjectCounterpart({{$Cnp->ProjectCounterpartId}},{{$trNumCnp}})"><img
											src="/images/file-edit.png" title="Edit Record" width="16"
											height="16" border="0"
											align="absmiddle"></a>

								<a href="#none"
								   onclick="
										   ClearSelectionRow('tblImpCnp')
										   byid('trCnp{{$trNumCnp}}').style.background='red';
										   if (confirm('Are you sure to delete?')){
										   var submitValue = '?PRN={{$PRN}}'
										   submitValue += '&ProjectCounterpartId={{$Cnp->ProjectCounterpartId}}'
										   Ajax_UpdatePanelAsync('/ngo/project/project_02/counterpart_delete',submitValue,'tdProjectCounterpart',true)
										   }
										   else
										   {
										   ClearSelectionRow('tblImpCnp')
										   }

										   "><img
											border="0" src="/images/delete.png" width="16" height="16"
											title="Delete Record"
											align="middle"></a></td>
							<input type="hidden" value="{{$Cnp->CounterType}}" id="lsCounter{{$trNumCnp}}" name="lsCounter{{$trNumCnp}}">
						</tr>
					@endforeach
					@endIf
					<tr>
						<td align="center" colspan="2" class="fontNormal" bgcolor="#ECE9D8">
							<font color="#FFFF00">
								<a href="#none"
								   onclick="deleteAllImp({{$trNumCnp}})">Delete
							All</a></font></td>
						<td align="center" class="fontNormal" bgcolor="#ECE9D8" width="100">
							<select name="CounterType" id="CounterType" size="1" class="fontNormal" style="width:98%"
		 onchange="
			var n = this.value
			var cn = ById('CounterName')
			var bnt = ById('btnMoreCounterName')
			cn.value = ''
			cn.readOnly = false
			bnt.disabled = true
			switch (parseInt(n))
			{
				case 1:
					cn.readOnly = true;
					bnt.disabled = false;
					break;
				case 2:
				case 3:
				case 4:
				case 7:
					cn.readOnly = false
					bnt.disabled = true
					break;
				case 5:
					cn.readOnly = true
					bnt.disabled = false
					break;
				case 6:
					cn.readOnly = true
					bnt.disabled = false
					break;
				case 8:
					cn.value='No Informaiton'
					cn.readOnly = true
					bnt.disabled = true
					break;
				default:
					cn.readOnly = true;
					bnt.disabled = true;
					break;

			}

			ById('LayerCounterName').style.display = 'none'
			var submitValue = '?CounterType='+ ById('CounterType').value
			Ajax_UpdatePanel('/project/project_02/get_CounterpartName',submitValue,'LayerCounterName',true)
		">
		<option value=""></option>
		<option value="1">Line Ministry</option>
		<option value="2">Other Government Departments</option>
		<option value="3">Non-Gov Official Bodies</option>
		<option value="4">UN Agencies</option>
		<option value="5">Foregin NGO</option>
		<option value="6">Cambodian NGO</option>
		<option value="7">Other</option>
		<option value="8">No Information</option>
		</select></td>
						<td align="left" class="fontNormal" bgcolor="#ECE9D8" id="tdSourceName" width="51%">
						<input type="text" readonly="readoly"  name="CounterName" id="CounterName"  size="20" style="width:80%" class="fontNormal" maxlength="100">
				<input disabled="disabled" type="button" value="..." name="btnMoreCounterName" id="btnMoreCounterName" class="fontNormal"
				onclick="

				 	var layer = document.getElementById('LayerCounterName')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(CounterName)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'
				 	layer.style.width =  this.offsetWidth  + 'px'

					">
						</td>
						<td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="50">
							<a href="#none" title="Add" id="anchorAddCnp"
							   onclick="insertCounterpart(this.title)">
								<img id="bntAddCnp" title="Add" border="" src="/images/add.png"
									 width="16"
									 height="16"></a>&nbsp;
							<a href="#none" title="Cancel" onclick="

                                ById('CounterType').value = ''
                                ById('CounterName').value = ''
                                ById('bntAddCnp').title = 'Add'
                                ById('bntAddCnp').src = '/images/add.png'
                                ClearSelectionRow('tblImpCnp')
                                "><img title="Cancel" border="0" src="/images/reload.png" width="16"
									   height="16"></a>
					</tr>
					</tr>
			</table>
		</td>
	</tr>
</table>
<input type="hidden" id="trNumCnp" name="trNumCnp" value="{{$trNumCnp}}">
<input type="hidden" id="ProjectCounterpartId" name="ProjectCounterpartId">
<input type="hidden" id="oldCounterName" name="oldCounterName" value="">
<input type="hidden" id="oldCounterType" name="oldCounterType" value="">

<script type="text/javascript">
    function checkCnpAll(obj) {
        var trNumCnp = ById('trNumCnp').value;
        checkAll(obj, trNumCnp, 'tblImpCnp', 'trCnp', 'chkCnp');
    }
    function editProjectCounterpart(ProjectCounterpartId, row) {
        ClearSelectionRow('tblImpCnp')
        editRow('trCnp' + row);
        var CounterType = ($('#CounterType' + row).text()).trim();
        var CounterName = ($('#CounterName' + row).text()).trim();
        byid('CounterType').value = CounterType;
        byid('oldCounterType').value = byid('lsCounter'+row).value;

        selectListItemByText('CounterType', CounterType)
		$("#CounterType").change();
        byid('oldCounterName').value =CounterName;
        byid('CounterName').value = CounterName;
        byid('ProjectCounterpartId').value = ProjectCounterpartId;
        ById('bntAddCnp').src = '/images/save-alt.png'
        ById('bntAddCnp').title = 'Update'
        ById('anchorAddCnp').title = 'Update'
    }
    function chkCnp(chk, tr_no) {
        var allCh = getvalueCheckGroup('chkCnp').length;
        byId("trCnp" + tr_no).style.backgroundColor = "red";
        var n = byid('trNumCnp').value;
        if (allCh == n) {
            byId("chkDeleteAllCnp").checked = true;
        } else {
            ById("chkDeleteAllCnp").checked = false;
        }
        if (chk.checked) {
            byId("trCnp" + tr_no).style.backgroundColor = "red";
        } else {
            byId("trCnp" + tr_no).style.backgroundColor = "white";
        }
    }
    function checkFillCnp() {
        var Ctrl = ById('CounterType')
        if (Ctrl.selectedIndex == 0) {
            byId('CounterType').title = 'Please select CounterType';
            $('#CounterType').tooltip('show');
            Ctrl.focus();
            return false;
        }
        check = ById('CounterName').value;
        if (check == "") {

            byId('CounterName').title = 'Please Enter CounterName';
            $('#CounterName').tooltip('show');
            check.focus();
        }

        return true

    }
    function pagingCnp(page) {
        var data = '?PRN={{$PRN}}';
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_02/listing_counterpart", data, "tdProjectCounterpart", true);
    }

    function deleteAllImp(totalRow) {
        var ProjectCounterpartId = getCheckBoxValues("chkCnp", totalRow)
        if (ProjectCounterpartId != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&ProjectCounterpartId=" + ProjectCounterpartId;
                Ajax_UpdatePanel("/ngo/project/project_02/counterpart_delete_all", data, "tdProjectCounterpart", true);

            } else {
                // do nothing
            }
        }
    }


    function insertCounterpart(title) {
        var CounterName = ById('CounterName').value;
        var CounterType = ById('CounterType').value;
        var submitValue = '?CounterType=' + ById('CounterType').value;
        submitValue += '&CounterName=' + ById('CounterName').value;
        submitValue += '&PRN={{$PRN}}';
        submitValue += '&ProjectCounterpartId=' + byid('ProjectCounterpartId').value;
        canUpdate = true;
        oldCounterName = byid('oldCounterName').value;
        oldCounterType = byid('oldCounterType').value;
        if ((oldCounterName != CounterName) || (CounterType != oldCounterType)) {
            isImpExist = Ajax_getResult("/ngo/project/project_02/counterpart_exist", submitValue) == "true";
            if (isImpExist) {
                byId('CounterName').title = 'CounterName already exist';
                $('#CounterName').tooltip('show')
                return;
            } else {
                // update
                canUpdate = true;
            }
        }

        if ((checkFillCnp()) && canUpdate) {
            if (title == "Add") {
                Ajax_UpdatePanel('/ngo/project/project_02/counterpart_insert', submitValue, 'tdProjectCounterpart', true)
            } else {
                Ajax_UpdatePanel('/ngo/project/project_02/counterpart_update', submitValue, 'tdProjectCounterpart', true)
            }

        } else {
            return;
        }
    }
</script>