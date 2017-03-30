<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ImplementingNgo;
$coreModel = CoreDetailModel::select('Acronym', 'Org_Name_E')->orderBy("Acronym")->get();
if (count($project) > 0) {
    $PRN = $project->PRN;
    $impModel = ImplementingNgo::where('PRN', '=', $PRN)->orderBy('Year');
    $totalImp = ImplementingNgo::where('PRN', '=', $PRN)->sum('Amount');
    $impModel = $impModel->paginate(5);
} else {
    $impModel = null;
}
$trNumImp = 0;
?>
<table border="0" style="border-collapse: collapse" cellpadding="2" width="80%">
    <tr>
        <td align="center" width="500" height="22">
            <p align="left">{!!MyUtility::ajaxPaging($impModel, "pagingImp")!!}</td>
    </tr>
    <tr>
        <td>
            <table border="1" width="100%" cellpadding="2" style="border-collapse: collapse" bordercolor="#C0C0C0"
                   name="tblImpNgo" id="tblImpNgo">
                <tr>

                    <td width="20" bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <font color="#0000FF">
                            <input type="checkbox" name="ckhimp[]" id="chkDeleteAllImp" value="ON"
                                   onclick="checkImpAll(this)" style="font-weight: 700"></font></td>

                    <td width="40" bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                        <font color="#333333">No</font></b></td>
                    <td align="center" style="padding:2px; align:center" bgcolor="#ECE9D8"
                        width="50">
                        <b>
                        <font color="#333333">Year</font></b></td>

                    <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                        <font color="#333333">Receipient NGOs</font></b></td>

                    <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>Program/Project Name</b></td>

                    <td align="center" bgcolor="#ECE9D8" width="100" style="padding: 2px">
                        <b>
                        <font color="#333333">Amount</font></b></td>

                    <td align="center" bgcolor="#ECE9D8" width="50" style="padding: 2px">
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
                            <td align="center" style="padding: 2px">
                                <input type="checkbox" name="chkImp[]" id="chkImp{{$trNumImp}}"
                                       value="{{$Imp->impNgoId}}"
                                       onclick="chkImp(this,'{{$trNumImp}}')"></td>

                            <td align="center" nowrap class="fontNormal" style="padding: 2px">{{++$trNo}}.</td>
                            <td align="center" class="fontNormal" id="yearImp{{$trNumImp}}" style="padding: 2px">
                                {{$Imp->Year}}</td>
                            <td align="left" class="fontNormal" id="Receipient{{$trNumImp}}" style="padding: 2px">
                                {{$Imp->Receipient}}</td>
                            <td align="left" class="fontNormal" id="ReceipientNgoProjectName{{$trNumImp}}" style="padding: 2px">
                                {{$Imp->ReceipientNgoProjectName}}</td>
                            <td align="right" style="padding:2px; "
                                class="fontNormal"
                                id="amountImp{{$trNumImp}}" width="100">{{MyUtility::formatThousand($Imp->Amount)}}</td>

                            <td align="center" style="padding: 2px" width="50">
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
                        <td align="center" class="fontNormal" nowrap bgcolor="#FFFFFF" height="20" colspan="5" style="padding: 2px">
                            <b>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                        </b></td>

                        <td align="right" class="fontNormal" nowrap bgcolor="#FFFFFF" valign="middle"
                            style="padding:2px; " height="20"
                            width="100">{{MyUtility::formatThousand($totalImp)}}</td>

                        <td align="center" class="fontNormal" valign="bottom" height="20" width="50"
                            bgcolor="#FFFFFF" style="padding: 2px"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px">
                            <font color="#FFFF00">
                                <a href="#none"
                                   onclick="deleteAllImp({{$trNumImp}})">Delete All</a></font></td>
                        <td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" style="padding: 2px">
                            <select name="ImpYear" id="ImpYear" size="1" class="fontNormal"
                                    style="width:60px;">
                                <option value="0000"></option>
                                @for($i=0;$i<30;$i++)
                                    <option value="{{1993+$i}}">{{1993+$i}}</option>
                                @endfor
                            </select></td>
                        <td align="left" class="fontNormal" nowrap bgcolor="#ECE9D8" id="" style="padding: 2px">
                        		<input type="text" name="Receipient" id="Receipient" size="12" style="width:85%" maxlength="100" class="fontNormal">
						<input type="button" value="..." name="btnMoreImpNgoName" id="btnMoreImpNgoName" class="fontTiny"
				onclick="
				 	var layer = document.getElementById('implementingNgoLayer')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return 
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(Receipient)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'				 	
				 	layer.style.width =  this.offsetWidth  + 'px'
				 
					">
	
</td>
                       <td align="left" class="fontNormal" nowrap bgcolor="#ECE9D8" id="tdReceipientNgoProjectName" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                            <input type="text"  name="ReceipientNgoProjectName" id="ReceipientNgoProjectName"  size="20" style="width:80%" class="fontNormal" maxlength="100">
                            <input type="button" value="..." name="btnMoreReceipientNgoProjectName" id="btnMoreReceipientNgoProjectName" class="fontNormal"
                                   onclick="
                                   
                    QueryNgoReceipientProjectName(ById('Receipient').value)
				 	var layer = document.getElementById('LayerNgoReceipientProjectName') 
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(ReceipientNgoProjectName)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'
				 	layer.style.width =  this.offsetWidth  + 'px'

					">

                        </td>
                        <td align="center" class="fontNormal" nowrap bgcolor="#ECE9D8" valign="bottom" style="padding: 2px">
                            <input type="text" name="txtAmountImp" id="txtAmountImp" size="1" class="TextBoxNumber"
                                   onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>
                        <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="50" style="padding: 2px">
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

<div style="position: absolute; width: 100px; height: 100px; z-index: 1; left: 219px; top: 607px"
     id="LayerNgoReceipientProjectName">
</div>
<script type="text/javascript">
    function checkImpAll(obj) {
        var trNumImp = ById('trNumImp').value;
        checkAll(obj, trNumImp, 'tblImpNgo', 'trImp', 'chkImp');
    }
       function QueryNgoReceipientProjectName(value) {
        var data = '?Acronym=' + value;
        Ajax_UpdatePanel('/ngo/project/project_02/queryNgoReceipientPorjectName',data,'LayerNgoReceipientProjectName',true)
    }
    function editProjectImp(impNgoId, row) {
        ClearSelectionRow('tblImpNgo')
        editRow('trImp' + row);
        var yearImp = ($('#yearImp' + row).text()).trim();
        var Receipient = ($('#Receipient' + row).text()).trim();
        var amountImp = ($('#amountImp' + row).text()).trim();
        var ReceipientNgoProjectName = ($('#ReceipientNgoProjectName' + row).text()).trim();
        byid('ImpYear').value = yearImp;
        byid('oldImpYear').value = yearImp;
        byid('oldReceipient').value = Receipient;
        byid('Receipient').value = Receipient;
        byid('ReceipientNgoProjectName').value = ReceipientNgoProjectName;
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
        submitValue += '&ReceipientNgoProjectName=' + byid('ReceipientNgoProjectName').value;
        canUpdate = true;
        oldReceipient = byid('oldReceipient').value;
        oldImpYear = byid('oldImpYear').value;
        if ((oldReceipient != Receipient) || (ImpYear != oldImpYear)) {
          isImpExist = Ajax_getResult("/ngo/project/project_02/implementing_ngo_exist", submitValue) == "true";
            if (isImpExist) {
                byId('ReceipientNgoProjectName').title = 'ProjectName  already exist';
                $('#ReceipientNgoProjectName').tooltip('show')
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