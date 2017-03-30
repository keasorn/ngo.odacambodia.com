<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ActualCommitmentlementingNgo;
use App\Models\ngo\ActualCommitmentModel;
use App\Models\ngo\ProjectStaffModel;

$ProjectStaffModel = ActualCommitmentModel::all();

if (count($project) > 0) {
    $PRN = $project->PRN;
    $ProjectStaffModel = ProjectStaffModel::where('PRN', '=', $PRN)->orderBy('Year');
    $ProjectStaffModel = $ProjectStaffModel->paginate(5);
} else {
    $ProjectStaffModel = null;
}
$trNumPS = 0;
?>
<table border="0" width="600" class="fontNormal" style="border-collapse: collapse" cellpadding="2">
    <tr>
        <td align="center" width="500" height="22">
            {!!MyUtility::ajaxPaging($ProjectStaffModel, "pagingAC")!!}</td>
    </tr>
    <tr>
        <td align="left" style="padding: 2px">
            <table border="1" width="100%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                       name="tblProjectStaff" id="tblProjectStaff">
				<tr>
					<td width="20" bgcolor="#ECE9D8" nowrap valign="middle" align="center" height="30">
					<input type="checkbox" name="ckhActualCommitment[]" id="chkDeleteAllProjectStaff"
                                       value="ON"
                                       onclick="checkACAll(this)" style="font-weight: 700"></td>
					<td width="40" bgcolor="#ECE9D8" nowrap valign="middle" align="center" height="30">
					<b>No</b></td>
					<td width="50" style="align:center" nowrap bgcolor="#ECE9D8" valign="middle" align="center" height="30"><b>Year</b></td>
					<td style="align:center" nowrap bgcolor="#ECE9D8" valign="middle" align="center" height="30"><b>Foreign Staff</b></td>
					<td bgcolor="#ECE9D8" align="center" height="30"><b>National Staff</b></td>
					<td bgcolor="#ECE9D8" align="center" height="30">
					<b>Total</b></td>
					<td width="50" bgcolor="#ECE9D8" valign="middle" align="center" height="30">
					<b>&nbsp;                        </b></td>
				</tr>@if(count($ProjectStaffModel)>0)
                        <?php
                        $pageSize = $ProjectStaffModel->perPage();
                        $currentPage = $ProjectStaffModel->currentPage();
                        $trNumPS = 0;
                        $trNo = $currentPage * ($pageSize) - $pageSize;
                        ?>
                        @foreach($ProjectStaffModel as $ProjectStaff )
				<tr id="trProjectStaff{{++$trNumPS}}">
					<td align="center" style="padding: 2px">
					<input type="checkbox" name="chkProjectStaff[]"
                                           id="chkProjectStaff{{$trNumPS}}"
                                           value="{{$ProjectStaff->ProjectStaffId}}"
                                           onclick="chkProjectStaff(this,'{{$trNumPS}}')"></td>
					<td align="center" nowrap class="fontNormal" style="padding: 2px">{{++$trNo}}.</td>
					<td align="center" class="fontNormal" id="tdPSYear{{$trNumPS}}" style="padding: 2px">{{$ProjectStaff->Year}}</td>
					<td align="right" class="fontNormal" id="tdStaffExpatriate{{$trNumPS}}" style="padding: 2px">{{MyUtility::formatThousand($ProjectStaff->StaffExpatriate)}}</td>
					<td align="right"  id="tdLocalStaff{{$trNumPS}}" nowrap
                                    class="fontNormal" style="padding: 2px">{{MyUtility::formatThousand($ProjectStaff->LocalStaff)}}</td>
					<td align="right" bgcolor="#ECE9D8" class="fontNormalBlue" style="padding: 2px">{{MyUtility::formatThousand($ProjectStaff->LocalStaff+$ProjectStaff->StaffExpatriate)}}</td>
					<td align="center" style="padding: 2px">
					<a href="#none" id="10"
                                       onclick="editProjectStaff({{$ProjectStaff->ProjectStaffId}},{{$trNumPS}})">
					<img
                                                src="/images/file-edit.png" title="Edit Record" width="16"
                                                height="16" border="0"
                                                align="absmiddle"></a>
					<a href="#none"
                                       onclick="
                                               ClearSelectionRow('tblProjectStaff')
                                               byid('trProjectStaff{{$trNumPS}}').style.background='red';
                                               if (confirm('Are you sure to delete?')){
                                               var submitValue = '?PRN={{$PRN}}'
                                               submitValue += '&ProjectStaffId={{$ProjectStaff->ProjectStaffId}}'
                                               Ajax_UpdatePanelAsync('/ngo/project/project_03/project_staff_delete',submitValue,'tdProjectStaff',true)
                                               }
                                               else
                                               {
                                               ClearSelectionRow('tblProjectStaff')
                                               }

                                               ">
					<img
                                                border="0" src="/images/delete.png" width="16" height="16"
                                                title="Delete Record"
                                                align="middle"></a></td>
					<input type="hidden" name="" id="ProjectStaffId{{$trNumPS}}"
                                       value="{{$ProjectStaff->ProjectStaffId}}">
				</tr>@endforeach
                        @endIf
				<tr>
					<td align="center" colspan="2" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px">
					<font color="#FFFF00">
					<a href="#none"
                                       onclick="deleteAllProjectStaff({{$trNumPS}})">Delete All</a></font></td>
					<td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px">
					<select name="PSYear" id="PSYear" size="1" class="fontNormal"
                                        style="width:60px;">
					<option value="0000"></option>@for($i=0;$i<30;$i++)
                                        <option value="{{1993+$i}}">{{1993+$i}}
					</option>@endfor
                                </select></td>
					<td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px">
					<input type="text" name="StaffExpatriate" id="StaffExpatriate" size="1" class="TextBoxNumber"
                                       onblur="checkDecimals(this)" style="width:100%;" maxlength="12"/></td>
					<td align="center" class="fontNormalBlue" nowrap style="padding:2px; " bgcolor="#ECE9D8">
					<p align="center">
					<input name="LocalStaff" id="LocalStaff" size="1" class="TextBoxNumber"
                                       onblur="checkDecimals(this)" style="width:100%; float:right" maxlength="12"/></td>
					<td align="center" class="fontNormalBlue" nowrap valign="bottom" height="20"
                                bgcolor="#ECE9D8" style="padding: 2px">&nbsp;</td>
					<td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" style="padding: 2px">
					<a href="#none" title="Add" id="anchorAddProjectStaff"
                                   onclick="insertProjectStaff(this.title)">
					<img id="bntAddProjectStaff" title="Add" border="" src="/images/add.png"
                                         width="16"
                                         height="16"></a>&nbsp;
                                <a href="#none" title="Cancel" onclick="
                                ById('oldYear').value = ''
                                ById('ProjectStaffId').value = ''
                                ById('PSYear').value = ''
                                ById('StaffExpatriate').value = ''
                                ById('LocalStaff').value = ''
                                ById('bntAddProjectStaff').title = 'Add'
                                ById('bntAddProjectStaff').src = '/images/add.png'
                                ClearSelectionRow('tblProjectStaff')
                                ">
					<img title="Cancel" border="0" src="/images/reload.png" width="16"
                                       height="16"></a> </tr>
				</tr>
			</table>
        </td>
    </tr>
</table>
<input type="hidden" id="trNumProjectStaff" name="trNumProjectStaff" value="{{$trNumPS}}">
<input type="hidden" id="ProjectStaffId" name="ProjectStaffId">
<input type="hidden" id="oldYear" name="oldYear" value="">

<script type="text/javascript">
    function checkACAll(obj) {
        var trNumProjectStaff = ById('trNumProjectStaff').value;
        checkAll(obj, trNumProjectStaff, 'tblProjectStaff', 'trProjectStaff', 'chkProjectStaff');
    }
    function editProjectStaff(ProjectStaffId, row) {
        ClearSelectionRow('tblProjectStaff')
        editRow('trProjectStaff' + row);
        var tdPSYear = ($('#tdPSYear' + row).text()).trim();
        var tdStaffExpatriate = ($('#tdStaffExpatriate' + row).text()).trim();
        var tdLocalStaff = ($('#tdLocalStaff' + row).text()).trim();
        byid('PSYear').value = tdPSYear
        byid('StaffExpatriate').value = tdStaffExpatriate
        byid('LocalStaff').value = tdLocalStaff

        byid('oldYear').value = tdPSYear;
        byid('ProjectStaffId').value = ProjectStaffId;

        ById('bntAddProjectStaff').src = '/images/save-alt.png'
        ById('bntAddProjectStaff').title = 'Update'
        ById('anchorAddProjectStaff').title = 'Update'
    }
    function chkProjectStaff(chk, tr_no) {
        var allCh = getvalueCheckGroup('chkProjectStaff').length;
        byId("trProjectStaff" + tr_no).style.backgroundColor = "red";
        var n = byid('trNumProjectStaff').value;
        if (allCh == n) {
            byId("chkDeleteAllProjectStaff").checked = true;
        } else {
            ById("chkDeleteAllProjectStaff").checked = false;
        }
        if (chk.checked) {
            byId("trProjectStaff" + tr_no).style.backgroundColor = "red";
        } else {
            byId("trProjectStaff" + tr_no).style.backgroundColor = "white";
        }
    }
    function checkFillProjectStaff() {

        var Ctrl = ById('PSYear')
        if (Ctrl.selectedIndex == 0) {
            byId('PSYear').title = 'Please select Year';
            $('#PSYear').tooltip('show');
            Ctrl.focus();
            return false;
        }

        check = (ById('StaffExpatriate').value == '')
        if (check) {
            byId('StaffExpatriate').title = 'Please enter Foreign Staff';
            $('#StaffExpatriate').tooltip('show');
            ById('StaffExpatriate').focus();
            return false;
        }
        check = (ById('LocalStaff').value == '')
        if (check) {
            byId('LocalStaff').title = 'Please enter National Staff';
            $('#LocalStaff').tooltip('show');
            ById('LocalStaff').focus();
            return false;
        }
        return true

    }
    function pagingAC(page) {
        var data = '?PRN={{$PRN}}';
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_03/listing_project_staff", data, "tdProjectStaff", true);
    }

    function deleteAllProjectStaff(totalRow) {
        var ProjectStaffId = getCheckBoxValues("chkProjectStaff", totalRow)
        if (ProjectStaffId != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&ProjectStaffId=" + ProjectStaffId;
                Ajax_UpdatePanel("/ngo/project/project_03/project_staff_delete_all", data, "tdProjectStaff", true);

            } else {
                // do nothing
            }
        }
    }


    function insertProjectStaff(title) {
        var ProjectStaffId = ById('ProjectStaffId').value;
        var PSYear=ById('PSYear').value;
        var oldYear = ById('oldYear').value;
        var submitValue = '?ProjectStaffId=' + ById('ProjectStaffId').value;
        submitValue += '&Year=' + ById('PSYear').value;
        submitValue += '&PRN={{$PRN}}';
        submitValue += '&StaffExpatriate=' + byid('StaffExpatriate').value;
        submitValue += '&LocalStaff=' + byid('LocalStaff').value;
        canUpdate = true;
        if (PSYear != oldYear) {
            isActualCommitmentExist = Ajax_getResult("/ngo/project/project_03/project_staff_exist", submitValue) == "true";
            if (isActualCommitmentExist) {
                byId('PSYear').title = 'Year already exist';
                $('#PSYear').tooltip('show')
                return;
            } else {
                // update
                canUpdate = true;
            }
        }
        if ((checkFillProjectStaff()) && canUpdate) {
            if (title == "Add") {
                Ajax_UpdatePanel('/ngo/project/project_03/project_staff_insert', submitValue, 'tdProjectStaff', true)
            } else {
                Ajax_UpdatePanel('/ngo/project/project_03/project_staff_update', submitValue, 'tdProjectStaff', true)
            }

        } else {
            return;
        }
    }
</script>