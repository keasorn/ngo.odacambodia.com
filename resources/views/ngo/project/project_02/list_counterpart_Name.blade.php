<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ImplementingNgo;
$coreModel = CoreDetailModel::select('Acronym', 'Org_Name_E')->orderBy("Acronym")->get();
if (count($project) > 0) {
    $PRN = $project->PRN;
    $impModel = ImplementingNgo::where('PRN', '=', $PRN);
    $totalImp = ImplementingNgo::where('PRN', '=', $PRN)->sum('Amount');
    $impModel = $impModel->paginate(5);
} else {
    $impModel = null;
}
$trNumImp = 0;
?>
<table>
    <tr>
        <td align="center" width="500" height="22">
            {!!MyUtility::ajaxPaging($impModel, "pagingImp")!!}</td>
    </tr>
    <tr>
        <td align="left">
            <table border="1" width="500" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                   name="tblImpNgo" id="tblImpNgo">
                <tr>

                    <td width="20" bgcolor="#ECE9D8" style="text-align: center; padding: 4px">
                        <font color="#0000FF">
                            <input type="checkbox" name="ckhimp[]" id="chkDeleteAllImp" value="ON"
                                   onclick="checkImpAll(this)" style="font-weight: 700"></font></td>

                    <td width="40" bgcolor="#ECE9D8" style="padding: 4px;text-align:center">
                        <b>No</b></td>
                    <td align="center" width="50" style="padding:4px; align:center; text-align:center" bgcolor="#ECE9D8"
                        width="100">
                        <b>Year</b></td>

                    <td bgcolor="#ECE9D8" width="51%" style="text-align: center; padding: 4px">
                        <b>Receipient NGOs</b></td>

                    <td align="center" bgcolor="#ECE9D8" width="19%" class="" style="text-align: center; padding: 4px">
                        <b>Amount</b></td>

                    <td align="center" bgcolor="#ECE9D8" width="50" style="text-align: center; padding: 4px">
                        <b>&nbsp;                        </b>                        
					</td>
                </tr>

                @if(count($impModel)>0)
                    <?php
                    $pageSize = $impModel->perPage();
                    $currentPage = $impModel->currentPage();
                    $trNumImp = 0;
                    $trNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
                    @foreach($impModel as $Imp )
                        <tr id="trImp{{++$trNumImp}}">
                            <td align="center">
                                <input type="checkbox" name="chkImp[]" id="chkImp{{$trNumImp}}"
                                       value="{{$Imp->impNgoId}}"
                                       onclick="chkImp(this,'{{$trNumImp}}')"></td>

                            <td align="center" nowrap class="fontNormal">{{++$trNo}}. </td>
                            <td align="center" class="fontNormal" id="yearImp{{$trNumImp}}" width="100">
                                {{$Imp->Year}}</td>
                            <td align="left" class="fontNormal"
                                width="51%" id="Receipient{{$trNumImp}}">
                                {{$Imp->Receipient}}</td>
                            <td align="right" style="padding-right: 5px"
                                class="fontNormal"
                                id="amountImp{{$trNumImp}}">{{MyUtility::formatThousand($Imp->Amount)}}</td>

                            <td align="center" width="50">
                                <a href="#none" id="10"
                                   onclick="editProjectImp({{$Imp->impNgoId}},{{$trNumImp}})"><img
                                            src="/images/file-edit.png" title="Edit Record" width="16"
                                            height="16" border="0"
                                            align="absmiddle"></a>

                                <a href="#none"
                                   onclick="
                                           ClearSelectionRow('tblImpNgo')
                                           byid('trImp{{$trNumImp}}').style.background='red';
                                           if (confirm('Are you sure to delete?')){
                                           var submitValue = '?PRN={{$PRN}}'
                                           submitValue += '&impNgoId={{$Imp->impNgoId}}'
                                           Ajax_UpdatePanelAsync('/ngo/project/project_02/implementing_ngo_delete',submitValue,'spanImplementingNgo',true)
                                           }
                                           else
                                           {
                                           ClearSelectionRow('tblImpNgo')
                                           }

                                           "><img
                                            border="0" src="/images/delete.png" width="16" height="16"
                                            title="Delete Record"
                                            align="middle"></a></td>
                        </tr>
                    @endforeach
                    @endIf
                    <tr>
                        <td align="center" class="fontNormal" nowrap bgcolor="#FFFFFF" height="20" colspan="4">
                            <b>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                        </b></td>

                        <td align="right" class="fontNormal" nowrap bgcolor="#FFFFFF" valign="middle"
                            style="padding-right: 5px" height="20"
                            width="19%">{{MyUtility::formatThousand($totalImp)}}</td>

                        <td align="center" class="fontNormal" valign="bottom" height="20" width="50"
                            bgcolor="#FFFFFF"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2" class="fontNormal" nowrap bgcolor="#ECE9D8">
                            <font color="#FFFF00">
                                <a href="#none"
                                   onclick="deleteAllImp({{$trNumImp}})">Delete All</a></font></td>
                        <td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" width="100">
                            <select name="ImpYear" id="ImpYear" size="1" class="fontNormal"
                                    style="width:60px;">
                                <option value="0000"></option>
                                @for($i=0;$i<30;$i++)
                                    <option value="{{1993+$i}}">{{1993+$i}}</option>
                                @endfor
                            </select></td>
                        <td align="left" class="fontNormal" nowrap bgcolor="#ECE9D8" width="51%">
                            @include('ngo.project.project_02.query_implementing_ngo')
                        </td>
                        <td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" valign="bottom" width="19%">
                            <input type="text" name="txtAmountImp" id="txtAmountImp" size="1" class="TextBoxNumber"
                                   onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>
                        <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="50">
                            <a href="#none" title="Add" id="anchorAddImp"
                               onclick="insertImpNgo(this.title)">
                                <img id="bntAddImp" title="Add" border="" src="/images/add.png"
                                     width="16"
                                     height="16"></a>&nbsp;
                            <a href="#none" title="Cancel" onclick="

                                ById('ImpYear').value = ''
                                ById('Receipient').value = ''
                                ById('txtAmountImp').value = ''
                                ById('bntAddImp').title = 'Add'
                                ById('bntAddImp').src = '/images/add.png'
                                ClearSelectionRow('tblImpNgo')
                                "><img title="Cancel" border="0" src="/images/reload.png" width="16"
                                       height="16"></a>
                    </tr>
                    </tr>
            </table>
        </td>
    </tr>
</table>
<input type="hidden" id="trNumImp" name="trNumImp" value="{{$trNumImp}}">
<input type="hidden" id="impNgoId" name="impNgoId">
<input type="hidden" id="oldReceipient" name="oldReceipient" value="">
<input type="hidden" id="oldImpYear" name="oldImpYear" value="">

<script type="text/javascript">
    function checkImpAll(obj) {
        var trNumImp = ById('trNumImp').value;
        checkAll(obj, trNumImp, 'tblImpNgo', 'trImp', 'chkImp');
    }
    function editProjectImp(impNgoId, row) {
        ClearSelectionRow('tblImpNgo')
        editRow('trImp' + row);
        var yearImp = ($('#yearImp' + row).text()).trim();
        var Receipient = ($('#Receipient' + row).text()).trim();
        var amountImp = ($('#amountImp' + row).text()).trim();
        byid('ImpYear').value = yearImp;
        byid('oldImpYear').value = yearImp;
        byid('oldReceipient').value = Receipient;
        byid('Receipient').value = Receipient;
        byid('impNgoId').value = impNgoId;
        byid('txtAmountImp').value = amountImp;
        ById('bntAddImp').src = '/images/save-alt.png'
        ById('bntAddImp').title = 'Update'
        ById('anchorAddImp').title = 'Update'
    }
    function chkImp(chk, tr_no) {
        var allCh = getvalueCheckGroup('chkImp').length;
        byId("trImp" + tr_no).style.backgroundColor = "red";
        var n = byid('trNumImp').value;
        if (allCh == n) {
            byId("chkDeleteAllImp").checked = true;
        } else {
            ById("chkDeleteAllImp").checked = false;
        }
        if (chk.checked) {
            byId("trImp" + tr_no).style.backgroundColor = "red";
        } else {
            byId("trImp" + tr_no).style.backgroundColor = "white";
        }
    }
    function checkFillImp() {
        var Ctrl = ById('ImpYear')
        if (Ctrl.selectedIndex == 0) {
            byId('ImpYear').title = 'Please select Year';
            $('#ImpYear').tooltip('show');
            Ctrl.focus();
            return false;
        }
        check = ById('Receipient').value;
        if (check == "") {

            byId('Receipient').title = 'Please Enter Receipient';
            $('#Receipient').tooltip('show');
            check.focus();
        }

        check = (ById('txtAmountImp').value == '')
        if (check) {

            byId('txtAmountImp').title = 'Please input Amount';
            $('#txtAmountImp').tooltip('show');
            ById('txtAmountImp').focus();
            return false;
        }
        return true

    }
    function pagingImp(page) {
        var data = '?PRN={{$PRN}}';
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_02/listing_imp", data, "spanImplementingNgo", true);
    }

    function deleteAllImp(totalRow) {
        var impNgoId = getCheckBoxValues("chkImp", totalRow)
        if (impNgoId != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&impNgoId=" + impNgoId;
                Ajax_UpdatePanel("/ngo/project/project_02/implementing_ngo_delete_all", data, "spanImplementingNgo", true);

            } else {
                // do nothing
            }
        }
    }


    function insertImpNgo(title) {
        var Receipient = ById('Receipient').value;
        var ImpYear = ById('ImpYear').value;
        var submitValue = '?Year=' + ById('ImpYear').value;
        submitValue += '&Receipient=' + ById('Receipient').value;
        submitValue += '&Amount=' + toNumber(ById('txtAmountImp').value);
        submitValue += '&PRN={{$PRN}}';
        submitValue += '&impNgoId=' + byid('impNgoId').value;
        canUpdate = true;
        oldReceipient = byid('oldReceipient').value;
        oldImpYear = byid('oldImpYear').value;
        if ((oldReceipient != Receipient) || (ImpYear != oldImpYear)) {
            isImpExist = Ajax_getResult("/ngo/project/project_02/implementing_ngo_exist", submitValue) == "true";
            if (isImpExist) {
                byId('Receipient').title = 'Receipient already exist';
                $('#Receipient').tooltip('show')
                return;
            } else {
                // update
                canUpdate = true;
            }
        }

        if ((checkFillImp()) && canUpdate) {
            if (title == "Add") {
                Ajax_UpdatePanel('/ngo/project/project_02/implementing_ngo_insert', submitValue, 'spanImplementingNgo', true)
            } else {
                Ajax_UpdatePanel('/ngo/project/project_02/implementing_ngo_update', submitValue, 'spanImplementingNgo', true)
            }

        } else {
            return;
        }
    }
</script>