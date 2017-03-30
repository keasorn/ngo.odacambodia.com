<?php
use App\Models\ngo\MultiBilateralCommitmentModel;
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
$coreModel = CoreDetailModel::select('Acronym', 'Org_Name_E')->orderBy("Acronym")->get();

if (count($project) > 0) {
    $PRN = $project->PRN;
    $actualCommitmentOther = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->where('SourceType', '=', '3')->orderBy('Year')->orderBy('OtherSourceName');
    $totalActualComAmountOther = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->where('SourceType', '=', '3')->sum('Amount');
    $actualCommitmentOther = $actualCommitmentOther->paginate(5);
} else {
    $actualCommitmentOther = null;
}
$trNumAcOther = 0;
?>
<table border="0" width="80%" cellspacing="1" style="border-collapse: collapse">
    <tr>
        <td align="center" width="500" height="22">
            <p align="left">{!!MyUtility::ajaxPaging($actualCommitmentOther, "pagingAcOther")!!}</td>
    </tr>
    <tr>
        <td align="left">
            <table border="1" id="tblAcOther" style="border-collapse: collapse; border-bottom-width:0px" bordercolor="#C0C0C0"
                   bgcolor="#FFFFFF" cellpadding="2" width="100%">

                <tr height="20">

                    <td width="20" bgcolor="#ECE9D8" style="padding:2px; " align="center">
                            <input type="checkbox" name="C3" id="chkDeleteAllOther" value="ON"
                                   onclick="checkAcOtherAll(this)" style="font-weight: 700" ></td>

                    <td width="40" bgcolor="#ECE9D8" style="padding: 2px" align="center">
                        <b>
                        No</b></td>
                    <td width="50" style="padding:2px; align:center; " bgcolor="#ECE9D8" align="center">
                        <b>
                        Year</b></td>

                    <td bgcolor="#ECE9D8" style="padding: 2px" align="center">
                        <b>
                        List NGOs Provider(s) of Funds/Others(*)</b></td>

                    <td bgcolor="#ECE9D8" style="padding: 2px" align="center">
                        <b>Program/Project 
						Name</b></td>

                    <td bgcolor="#ECE9D8" width="100" style="padding: 2px" align="center">
                        <b>
                        Amount</b></td>

                    <td bgcolor="#ECE9D8" width="50" style="padding: 2px" align="center">
                        <b>&nbsp;                        </b>                        
					</td>
                </tr>
                @if(count($actualCommitmentOther)>0)
                    <?php
                    $pageSize = $actualCommitmentOther->perPage();
                    $currentPage = $actualCommitmentOther->currentPage();
                    $trNumAcOther = 0;
                    $trNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
                    @foreach($actualCommitmentOther as $AcOther )
                        <tr id="trAcOther{{++$trNumAcOther}}" bgcolor="white">
                            <td align="center" style="padding:2px; border-left-color: #C0C0C0; border-left-width: 1px" valign="middle">
                                <input type="checkbox" name="chkAcOther[]" id="chkAcOther{{$trNumAcOther}}"
                                       value="{{$AcOther->MultiBilateralCommitmentId}}"
                                       onclick="chkAcOther(this,'{{$trNumAcOther}}')"></td>

                            <td align="center" class="fontNormal" valign="middle" style="padding: 2px">
							{{++$trNo}}.</td>
                            <td  class="fontNormal" id="yearAcOther{{$trNumAcOther}}" style="padding: 2px" align="center">
							{{$AcOther->Year}}</td>
                            <td align="left" class="fontNormal" id="OtherSourceName{{$trNumAcOther}}" valign="middle" style="padding: 2px">
							{{$AcOther->OtherSourceName}}</td>
                            <td align="left" style="padding:2px; "
                                class="fontNormal"
                                id="NgoProjectName{{$trNumAcOther}}" valign="middle">{{$AcOther->NgoProjectName}}</td>

                            <td align="right" style="padding:2px; "
                                class="fontNormal"
                                id="amountAcOther{{$trNumAcOther}}" width="100" valign="middle">{{MyUtility::formatThousand($AcOther->Amount)}}</td>

                            <td align="center" width="50" valign="middle" style="padding: 2px">
                                    <a href="#none" id="1"
                                       onclick="editProjectAcOther({{$AcOther->MultiBilateralCommitmentId}},{{$trNumAcOther}})"><img
                                                src="/images/file-edit.png" title="Edit Record" width="16"
                                                height="16" border="0"
                                                align="absmiddle"></a>

                                    <a href="#none"
                                       onclick="
                                               ClearSelectionRow('tblAcOther')
                                               byid('trAcOther{{$trNumAcOther}}').style.background='red';
                                               if (confirm('Are you sure to delete?')){
                                               var submitValue = '?PRN={{$PRN}}'
                                               submitValue += '&MultiBilateralCommitmentId={{$AcOther->MultiBilateralCommitmentId}}'
                                               Ajax_UpdatePanelAsync('/ngo/project/project_02/actual_commitment_other_delete',submitValue,'spanNGOProvider',true)
                                               }
                                               else
                                               {
                                               ClearSelectionRow('tblAcOther')
                                               }

                                               "><img
                                                border="0" src="/images/delete.png" width="16" height="16"
                                                title="Delete Record"
                                                align="middle"></a></td>
                        </tr>


                    @endforeach @endif
                <tr>
                    <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" style="padding:2px; border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">
                        <b>&nbsp;&nbsp;                        </b></td>

                    <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" style="padding:2px; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: none; border-bottom-width: medium">
                        &nbsp;</td>

                    <td align="right" class="fontNormal" bgcolor="#FFFFFF" height="20" colspan="3" style="padding:2px; border-left-style: none; border-left-width: medium">
                        <b>TOTAL&nbsp;&nbsp;&nbsp;                        </b></td>

                    <td align="right" class="fontNormal" bgcolor="#FFFFFF" valign="middle"
                        style="padding:2px; " height="20"
                        width="100">{{MyUtility::formatThousand($totalActualComAmountOther)}}</td>

                    <td align="center" class="fontNormal" valign="bottom" height="20" width="50"
                        bgcolor="#FFFFFF" style="padding: 2px"></td>
                </tr>

                <tr>
                    <td align="center" colspan="2" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; border-left-color: #C0C0C0; border-left-width: 1px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                        <font color="#FFFF00">
                            <a href="#none"
                               onclick="deleteAllAcOther({{$trNumAcOther}})">
						Delete All</a></font></td>
                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                        <select name="cmbMultiBilateralYearOther" id="cmbMultiBilateralYearOther" size="1" class="fontNormal"
                                style="width:60px;">
                            <option value="0000"></option>
                            @for($i=0;$i<30;$i++)
                                <option value="{{1993+$i}}">{{1993+$i}}</option>
                            @endfor
                        </select></td>
                    <td align="left" class="fontNormal" bgcolor="#ECE9D8" id="tdSourceName" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                   <input type="text" name="NgoSourceName" id="NgoSourceName" size="12" style="width:85%" maxlength="100" class="fontNormal">
<input type="button" value="..." name="btnMoreSourceName" id="btnMoreSourceName" class="fontTiny"
       onclick="
				 	var layer = document.getElementById('ngoSourceNameLayer')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(NgoSourceName)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'
				 	layer.style.width =  this.offsetWidth  + 'px'

					">
                    </td>
                    <td align="left" class="fontNormal" bgcolor="#ECE9D8" id="tdNgoProjectName" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                            <input type="text"  name="NgoProjectName" id="NgoProjectName"  size="20" style="width:80%" class="fontNormal" maxlength="100">
                            <input type="button" value="..." name="btnMoreNgoProjectName" id="btnMoreNgoProjectName" class="fontNormal"
                                   onclick="
                                   
	QueryNgoProjectName(ById('NgoSourceName').value)
				 	var layer = document.getElementById('LayerNgoProjectName')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(NgoProjectName)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'
				 	layer.style.width =  this.offsetWidth  + 'px'

					">

                        </td>

                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="100" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                        <input type="text" name="txtAmountOther" id="txtAmountOther" size="10" class="TextBoxNumber"
                               onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>
                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="50" style="padding:2px; border-bottom-color: #C0C0C0; border-bottom-width: 1px">
                        <a href="#none" title="Add" id="anchorAddOther"
                           onclick="insertAcOther(this.title)"><img id="bntAddOther" title="Add" border="0" src="/images/add.png"
                                                             width="16"
                                                             height="16"></a>&nbsp;
                        <a href="#none" title="Cancel" onclick="

                                ById('cmbMultiBilateralYearOther').value = ''
                                ById('NgoSourceName').value = ''
                                ById('txtAmountOther').value = ''
                                ById('bntAddOther').title = 'Add'
                                ById('bntAddOther').src = '/images/add.png'
                                ClearSelectionRow('tblAcOther')
                                "><img title="Cancel" border="0" src="/images/reload.png" width="16"
                                       height="16"></a>
                </tr>
            </table>

            <table border="0" width="100%" id="table1" cellpadding="2" style="border-collapse: collapse">
                <tr>
                    <td align="left">
                        <font color="#0066FF"><b>* NGO Provider(s) Funds:</b> This means NGOs/Others that act
                            as funding source and provide funds to the NGOs that implements the project.</font></td>
                </tr>
            </table>

        </td>
    </tr>
</table>
<input type="hidden" id="trNumAcOther" name="trNumAcOther" value="{{$trNumAcOther}}">
<input type="hidden" id="OldMultiBilateralYearOther" name="OldMultiBilateralYearOther">
<input type="hidden" id="oldSourceNameOther" name="oldSourceNameOther" value="">
<input type="hidden" id="oldOtherYear" name="oldOtherYear" value="">

<script type="text/javascript">
    function checkAcOtherAll(obj) {
        var trNumAcOther = ById('trNumAcOther').value;
        checkAll(obj, trNumAcOther, 'tblAcOther', 'trAcOther','chkAcOther');
    }
    function editProjectAcOther(projectAcOtheRID, row) {
        ClearSelectionRow('tblAcOther')
        editRow('trAcOther' + row)
        var yearAcOther = ($('#yearAcOther' + row).text()).trim();
        var SourceName = ($('#OtherSourceName' + row).text()).trim();
        var amountAcOther = ($('#amountAcOther' + row).text()).trim();
        var NgoProjectName= ($('#NgoProjectName' + row).text()).trim();
        byid('cmbMultiBilateralYearOther').value = yearAcOther;
        byid('oldOtherYear').value = yearAcOther;
        byid('oldSourceNameOther').value = SourceName;
        byid('NgoSourceName').value = SourceName;
        byid('NgoProjectName').value = NgoProjectName;
        byid('OldMultiBilateralYearOther').value = projectAcOtheRID;
        byid('txtAmountOther').value = amountAcOther;
        ById('bntAddOther').src = '/images/save-alt.png'
        ById('bntAddOther').title = 'Update'
        ById('anchorAddOther').title = 'Update'
        
    }
    function chkAcOther(chk, tr_no) {
        var allCh = getvalueCheckGroup('chkAcOther').length;
        byId("trAcOther" + tr_no).style.backgroundColor = "red";
        var n = byid('trNumAcOther').value;
        if (allCh == n) {
            byId("chkDeleteAllOther").checked = true;
        } else {
            ById("chkDeleteAllOther").checked = false;
        }
        if (chk.checked) {
            byId("trAcOther" + tr_no).style.backgroundColor = "red";
        } else {
            byId("trAcOther" + tr_no).style.backgroundColor = "white";
        }
    }
    function checkFillAcOther() {
        var Ctrl = ById('cmbMultiBilateralYearOther')
        if (Ctrl.selectedIndex == 0) {
            byId('cmbMultiBilateralYearOther').title = 'Please select Year';
            $('#cmbMultiBilateralYearOther').tooltip('show');
            Ctrl.focus();
            return false;
        }
        check = ById('NgoSourceName').value;
        if (check=="") {

            byId('NgoSourceName').title = 'Please Enter Ngo Source Name';
            $('#NgoSourceName').tooltip('show');
            check.focus();
        }

         check = (ById('txtAmountOther').value == '')
        if (check) {

            byId('txtAmountOther').title = 'Please input Amount';
            $('#txtAmountOther').tooltip('show');
            ById('txtAmountOther').focus();
            return false;
        }
        return true

    }
        function QueryNgoProjectName(value) {
        var data = '?Acronym=' + value;
        Ajax_UpdatePanel('/ngo/project/project_02/queryNgoPorjectName',data,'LayerNgoProjectName',true)
    }
     function pagingAcOther(page) {
        var data = '?PRN={{$PRN}}';
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_02/listing_other", data, "spanNGOProvider", true);
    }

    function deleteAllAcOther(totalRow) {
        var MultiBilateralCommitmentId = getCheckBoxValues("chkAcOther", totalRow)
        if (MultiBilateralCommitmentId != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&MultiBilateralCommitmentId=" + MultiBilateralCommitmentId;
                Ajax_UpdatePanel("/ngo/project/project_02/actual_commitment_other_delete_all", data, "spanNGOProvider", true);

            } else {
                // do nothing
            }
        }
    }


    function insertAcOther(title) {
        var sourceType ='3';
        var NgoSourceName = ById('NgoSourceName').value;
        var oldOtherYear = ById('oldOtherYear').value;
        var cmbMultiBilateralYearOther = ById('cmbMultiBilateralYearOther').value;;
        var submitValue = '?Year=' + ById('cmbMultiBilateralYearOther').value;
        submitValue += '&OtherSourceType=' + toNumber(sourceType);
        submitValue += '&OtherSourceName=' + NgoSourceName;
        submitValue += '&OtherAmount=' + toNumber(ById('txtAmountOther').value);
        submitValue += '&PRN={{$PRN}}';
        submitValue += '&NgoProjectName=' + ById('NgoProjectName').value;
        submitValue += '&MultiBilateralCommitmentId=' + byid('OldMultiBilateralYearOther').value;
        canUpdate = true;
      var  oldSourceNameOther = byid('oldSourceNameOther').value

        if ((oldSourceNameOther != NgoSourceName) || (oldOtherYear!=cmbMultiBilateralYearOther)) {
            isAcOtherExist = Ajax_getResult("/ngo/project/project_02/actual_commitment_other_exist", submitValue) == "true";
            if (isAcOtherExist) {
                byId('NgoProjectName').title = 'ProjectName  already exist';
                $('#NgoProjectName').tooltip('show')
                return;
            } else {
                // update
                canUpdate = true;
            }
        }

        if ((checkFillAcOther()) && canUpdate) {

            if (title == "Add") {
                Ajax_UpdatePanel('/ngo/project/project_02/actual_commitment_other_insert', submitValue, 'spanNGOProvider', true)
            } else {
                Ajax_UpdatePanel('/ngo/project/project_02/actual_commitment_other_update', submitValue, 'spanNGOProvider', true)
            }

        } else {
            return;
        }
    }

    function setTextCoreDetail(val){
        ById('NgoSourceName').value = $("#cmbNgoSourceName option[value="+val+"]").text();
    }
</script>