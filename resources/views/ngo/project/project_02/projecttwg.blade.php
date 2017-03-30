<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ProjectTwglementingNgo;
$coreModel = CoreDetailModel::select('Acronym', 'Org_Name_E')->orderBy("Acronym")->get();
use App\Models\oda\odaadmin\OdaTwgModel;

$twgModel = OdaTwgModel::all();

if (count($project) > 0) {
    $PRN = $project->PRN;
    $ProjectTwgModel = DB::table('v_ngo_sub_project_of_twg')->where('PRN', '=', $PRN);
    $ProjectTwgModel = $ProjectTwgModel->paginate(5);
} else {
    $ProjectTwgModel = null;
}
$trNumProjectTwg = 0;
?>
<table border="0" width="80%" style="border-collapse: collapse" cellpadding="2">
    <tr>
        <td align="center" width="500" height="22">
            {!!MyUtility::ajaxPaging($ProjectTwgModel, "pagingProjectTwg")!!}</td>
    </tr>
    <tr>
        <td align="left" nowrap>
            <table border="1" width="100%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                   name="tblProjectTwg" id="tblProjectTwg">
                <tr>

                    <td width="20" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
                        <font color="#0000FF">
                            <input type="checkbox" name="ckhProjectTwg[]" id="chkDeleteAllProjectTwg" value="ON"
                                   onclick="checkProjectTwgAll(this)" style="font-weight: 700"></font></td>

                    <td width="40" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; ">
                        <b>
                        <font color="#333333">No</font></b></td>
                    <td align="left" style="padding:2px; align:center; text-align:center" bgcolor="#ECE9D8"
                        width="200">
                        <b>
                        <font color="#333333">TWG</font></b></td>

                    <td align="left" bgcolor="#ECE9D8" style="text-align: center; padding: 2px; " valign="middle">
                        <b>
                        <font color="#333333">Detail</font></b></td>

                    <td align="center" bgcolor="#ECE9D8" width="50" style="text-align: center; padding: 2px; ">
                        <b>&nbsp;                        </b>                        
					</td>
                </tr>

                @if(count($ProjectTwgModel)>0)
                    <?php
                    $pageSize = $ProjectTwgModel->perPage();
                    $currentPage = $ProjectTwgModel->currentPage();
                    $trNumProjectTwg = 0;
                    $trNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
                    @foreach($ProjectTwgModel as $ProjectTwg )
                        <tr id="trProjectTwg{{++$trNumProjectTwg}}">
                            <td align="center" style="padding: 2px" valign="middle">
                                <input type="checkbox" name="chkProjectTwg[]" id="chkProjectTwg{{$trNumProjectTwg}}"
                                       value="{{$ProjectTwg->ProjectTwgId}}"
                                       onclick="chkProjectTwg(this,'{{$trNumProjectTwg}}')"></td>

                            <td align="center" nowrap class="fontNormal" style="padding: 2px" width="30">{{++$trNo}}.</td>
                            <td align="left" class="fontNormal" width="200" style="padding: 2px">
                                <input type="hidden" id="tdTwg{{$trNumProjectTwg}}" name="tdTwg{{$trNumProjectTwg}}" value="{{$ProjectTwg->TWGID}}">{{$ProjectTwg->twg}}</td>
                            <td align="left" style="padding:2px; "
                                class="fontNormal"
                                id="TWGDetailProjectTwg{{$trNumProjectTwg}}" valign="middle">{{$ProjectTwg->TWGDetail}}</td>

                            <td align="center" style="padding: 2px" width="50">
                                <a href="#none" id="10"
                                   onclick="editProjectProjectTwg({{$ProjectTwg->ProjectTwgId}},{{$trNumProjectTwg}})"><img
                                            src="/images/file-edit.png" title="Edit Record" width="16"
                                            height="16" border="0"
                                            align="absmiddle"></a>

                                <a href="#none"
                                   onclick="
                                           ClearSelectionRow('tblProjectTwg')
                                           byid('trProjectTwg{{$trNumProjectTwg}}').style.background='red';
                                           if (confirm('Are you sure to delete?')){
                                           var submitValue = '?PRN={{$PRN}}'
                                           submitValue += '&ProjectTwgId={{$ProjectTwg->ProjectTwgId}}'
                                           Ajax_UpdatePanelAsync('/ngo/project/project_02/project_twg_delete',submitValue,'tdProjectTwg',true)
                                           }
                                           else
                                           {
                                           ClearSelectionRow('tblProjectTwg')
                                           }

                                           "><img
                                            border="0" src="/images/delete.png" width="16" height="16"
                                            title="Delete Record"
                                            align="middle"></a></td>
                            <input type="hidden" name="" id="twgId{{$trNumProjectTwg}}"
                                   value="{{$ProjectTwg->TWGID}}">
                        </tr>
                    @endforeach
                    @endIf
                    <tr>
                        <td align="center" colspan="2" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px" valign="middle">
                            <font color="#FFFF00">
                                <a href="#none"
                                   onclick="deleteAllProjectTwg({{$trNumProjectTwg}})">Delete All</a></font></td>
                        <td align="left" class="fontNormal" nowrap bgcolor="#ECE9D8" width="200" style="padding: 2px">
                            <select name="twg" id="twg" size="1" class="fontNormal"
                                    style="width:99%;height:22">
                                <option value="0"></option>
                                @foreach($twgModel as $twg)
                                    <option value="{{$twg->TWG_ID}}">{{$twg->Acronym}} - {{$twg->TWG}}</option>
                                @endforeach
                            </select></td>
                        <td align="left" class="fontNormal" nowrap bgcolor="#ECE9D8" valign="middle" style="padding: 2px">
                            <input type="text" name="txtTWGDetail" id="txtTWGDetail" size="1"  style="width:99%;" maxlength="12"/></td>
                        <td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" width="50" style="padding: 2px">
                            <a href="#none" title="Add" id="anchorAddProjectTwg"
                               onclick="insertProjectTwg(this.title)">
                                <img id="bntAddProjectTwg" title="Add" border="" src="/images/add.png"
                                     width="16"
                                     height="16"></a>&nbsp;
                            <a href="#none" title="Cancel" onclick="

                                ById('twg').value = ''
                                ById('Receipient').value = ''
                                ById('txtTWGDetail').value = ''
                                ById('bntAddProjectTwg').title = 'Add'
                                ById('bntAddProjectTwg').src = '/images/add.png'
                                ClearSelectionRow('tblProjectTwg')
                                "><img title="Cancel" border="0" src="/images/reload.png" width="16"
                                       height="16"></a>
                    </tr>
                    </tr>
            </table>
        </td>
    </tr>
</table>
<input type="hidden" id="trNumProjectTwg" name="trNumProjectTwg" value="{{$trNumProjectTwg}}">
<input type="hidden" id="ProjectTwgId" name="ProjectTwgId">
<input type="hidden" id="oldtwg" name="oldtwg" value="">

<script type="text/javascript">
    function checkProjectTwgAll(obj) {
        var trNumProjectTwg = ById('trNumProjectTwg').value;
        checkAll(obj, trNumProjectTwg, 'tblProjectTwg', 'trProjectTwg', 'chkProjectTwg');
    }
    function editProjectProjectTwg(ProjectTwgId, row) {
        ClearSelectionRow('tblProjectTwg')
        editRow('trProjectTwg' + row);
        var tdTwg= $('#tdTwg' + row).val();
        var TWGDetailProjectTwg = ($('#TWGDetailProjectTwg' + row).text()).trim();
        selectListItemByText('twg', tdTwg)
        var twgId = byId('twgId'+row).value;

        byid('oldtwg').value = twgId;
        byid('ProjectTwgId').value = ProjectTwgId;
        byid('twg').value = tdTwg;
        byid('txtTWGDetail').value = TWGDetailProjectTwg;
        ById('bntAddProjectTwg').src = '/images/save-alt.png'
        ById('bntAddProjectTwg').title = 'Update'
        ById('anchorAddProjectTwg').title = 'Update'
    }
    function chkProjectTwg(chk, tr_no) {
        var allCh = getvalueCheckGroup('chkProjectTwg').length;
        byId("trProjectTwg" + tr_no).style.backgroundColor = "red";
        var n = byid('trNumProjectTwg').value;
        if (allCh == n) {
            byId("chkDeleteAllProjectTwg").checked = true;
        } else {
            ById("chkDeleteAllProjectTwg").checked = false;
        }
        if (chk.checked) {
            byId("trProjectTwg" + tr_no).style.backgroundColor = "red";
        } else {
            byId("trProjectTwg" + tr_no).style.backgroundColor = "white";
        }
    }
    function checkFillProjectTwg() {
        var Ctrl = ById('twg')
        if (Ctrl.selectedIndex == 0) {
            byId('twg').title = 'Please select twg';
            $('#twg').tooltip('show');
            Ctrl.focus();
            return false;
        }

        check = (ById('txtTWGDetail').value == '')
        if (check) {

            byId('txtTWGDetail').title = 'Please input TWGDetail';
            $('#txtTWGDetail').tooltip('show');
            ById('txtTWGDetail').focus();
            return false;
        }
        return true

    }
    function pagingProjectTwg(page) {
        var data = '?PRN={{$PRN}}';
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_02/listing_project_twg", data, "tdProjectTwg", true);
    }

    function deleteAllProjectTwg(totalRow) {
        var ProjectTwgId= getCheckBoxValues("chkProjectTwg", totalRow)
        if (ProjectTwgId!= "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&ProjectTwgId=" + ProjectTwgId;
                Ajax_UpdatePanel("/ngo/project/project_02/project_twg_delete_all", data, "tdProjectTwg", true);

            } else {
                // do nothing
            }
        }
    }


    function insertProjectTwg(title) {
        var twg = ById('twg').value;
        var oldtwg = ById('oldtwg').value;
        var submitValue = '?TWG=' + ById('twg').value;
        submitValue += '&TWGDetail=' + toNumber(ById('txtTWGDetail').value);
        submitValue += '&PRN={{$PRN}}';
        submitValue += '&ProjectTwgId=' + byid('ProjectTwgId').value;
        canUpdate = true;
        if (twg != oldtwg) {
            isProjectTwgExist = Ajax_getResult("/ngo/project/project_02/project_twg_exist", submitValue) == "true";
            if (isProjectTwgExist) {
                byId('twg').title = 'TWG already exist';
                $('#twg').tooltip('show')
                return;
            } else {
                // update
                canUpdate = true;
            }
        }

        if ((checkFillProjectTwg()) && canUpdate) {
            if (title == "Add") {
                Ajax_UpdatePanel('/ngo/project/project_02/project_twg_insert', submitValue, 'tdProjectTwg', true)
            } else {
                Ajax_UpdatePanel('/ngo/project/project_02/project_twg_update', submitValue, 'tdProjectTwg', true)
            }

        } else {
            return;
        }
    }
</script>