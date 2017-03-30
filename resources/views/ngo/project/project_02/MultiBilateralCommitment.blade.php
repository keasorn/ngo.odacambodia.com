	<?php
	use App\Models\ngo\MultiBilateralCommitmentModel;
	use App\Http\Controllers\MyUtility;
	$trNumAc = 0;
	if (count($project) > 0) {
	    $PRN = $project->PRN;
	    $actualCommitment = DB::table('v_ngo_sub_porject_of_multibilateral_commitment')->where('PRN', '=', $PRN)->whereIn('SourceType', [1, 2])->orderBy('Year')->orderBy('Org_Name_E');
	    $totalActualComAmount = MultiBilateralCommitmentModel::where('PRN', '=', $PRN)->whereIn('SourceType', [1, 2])->sum('Amount');
	    $actualCommitment = $actualCommitment->paginate(5);
	} else {
	    $actualCommitment = null;
	
	}
	
	
	?>
	
	<table border="0" cellspacing="1" style="border-collapse: collapse" width="80%">
	    <tr>
	        <td align="center" width="500" height="22">
	            <p>{!!MyUtility::ajaxPaging($actualCommitment, "pagingActualCom")!!} </td>
	    </tr>
	    <tr>
	        <td align="left" style="text-align: center" width="100%">
	            <table border="1" id="tblAc" style="border-collapse: collapse" bordercolor="#C0C0C0"
	                   bgcolor="#FFFFFF" width="100%" cellpadding="2">
	
	                <tr height="20">
	
	                    <td bgcolor="#ECE9D8" width="20" align="center" style="padding: 2px">
	                        <font color="#0000FF">
	                            <input type="checkbox" name="C3" id="chkDeleteAll" value="ON"
	                                   onclick="checkAcAll(this)" style="font-weight: 700"></font></td>
	
	                    <td bgcolor="#ECE9D8" width="40" align="center" style="padding: 2px">
	                        <b>No</b></td>
	                    <td bgcolor="#ECE9D8" width="50" align="center" style="padding: 2px">
	                        <b>Year</b></td>
	                    <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
	                        <b>Development 
							Partner Type</b></td>
	
	                    <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
	                        <b>List of 
							Development Partner</b></td>
	
	                    <td bgcolor="#ECE9D8" align="center" style="padding: 2px"><b>Program/Project 
							Name</b></td>
	
	                    <td bgcolor="#ECE9D8" width="100" align="center" style="padding: 2px">
	                        <b>Amount</b></td>
	
	                    <td bgcolor="#ECE9D8" width="50" align="center" style="padding: 2px">
	                        <b>&nbsp;                        
						</b>                        
						</td>
	                </tr>
	                @if(count($actualCommitment)>0)
	                    <?php
	                    $pageSize = $actualCommitment->perPage();
	                    $currentPage = $actualCommitment->currentPage();
	                    $trNumAc = 0;
	                    $trNo = $currentPage * ($pageSize) - $pageSize;
	                    ?>
	
	                    @foreach($actualCommitment as $ac )
	                        <tr id="trAc{{++$trNumAc}}" bgcolor="white">
	
	                            <td align="center" style="padding:2px; border-left-color: #C0C0C0; border-left-width: 1px">
	                                <input type="checkbox" name="chkAc[]" id="chkAc{{$trNumAc}}"
	                                       value="{{$ac->MultiBilateralCommitmentId}}"
	                                       onclick="chkAc(this,'{{$trNumAc}}')"></td>
	
	                            <td align="center" class="fontNormal" style="padding: 2px">
								{{++$trNo}}. </td>
	                            <td align="center" class="fontNormal" id="yearAc{{$trNumAc}}" style="padding: 2px">
								{{$ac->Year}}</td>
	                            <input type="hidden" align="center" id="SourceType{{$trNumAc}}" value=" {{$ac->SourceType}}">
	                               
	 
	                                                        <td align="left" class="fontNormal" style="padding: 2px">{{MyUtility::getSourceType($ac->SourceType)}}</td>
	                          <input type="hidden" align="center"  id="SourceName{{$trNumAc}}" value="{{$ac->SourceName}}">
	                           <td align="left" class="fontNormal" id="SourceName{{$trNumAc}}" style="padding: 2px">{{$ac->Org_Name_E}}</td>
	                            <td align="left" style="padding:2px; "
	                                class="fontNormal"
	                                id="OdaProjectName{{$trNumAc}}">{{$ac->OdaProjectName}}</td>
	
	                            <td align="right" style="padding:2px; "
	                                class="fontNormal"
	                                id="amountAc{{$trNumAc}}" width="100">{{MyUtility::formatThousand($ac->Amount)}}</td>
	
	                            <td align="center" width="50" style="padding: 2px">
	                                    <a href="#none" id="1"
	                                       onclick="editProjectAc({{$ac->MultiBilateralCommitmentId}},{{$trNumAc}})"><img
	                                                src="/images/file-edit.png" title="Edit Record" width="16"
	                                                height="16" border="0"
	                                                align="absmiddle"></a>
	
	                                    <a href="#none"
	                                       onclick="
	                                               ClearSelectionRow('tblAc')
	                                               byid('trAc{{$trNumAc}}').style.background='red';
	                                               if (confirm('Are you sure to delete?')){
	                                               var submitValue = '?PRN={{$PRN}}'
	                                               submitValue += '&MultiBilateralCommitmentId={{$ac->MultiBilateralCommitmentId}}'
	                                               Ajax_UpdatePanelAsync('/ngo/project/project_02/actual_commitment_delete',submitValue,'spanMultiBilateralCommitment',true)
	                                               }
	                                               else
	                                               {
	                                               ClearSelectionRow('tblAc')
	                                               }
	
	                                               "><img
	                                                border="0" src="/images/delete.png" width="16" height="16"
	                                                title="Delete Record"
	                                                align="middle"></a></td>
	                        </tr>
	
	
	                    @endforeach @endif
	                <td align="center" class="fontNormal" style="padding:2px; border-left-style: solid; border-left-width: 1px; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px" >
	                    &nbsp;</td>
	
	                <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" style="padding:2px; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
	                    &nbsp;</td>
	
	                <td align="center" class="fontNormal" bgcolor="#FFFFFF" height="20" style="padding:2px; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
	                    &nbsp;</td>
	                <td align="right" class="fontNormal" bgcolor="#FFFFFF" height="20" colspan="3" style="padding:2px; border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: solid; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
	                    <b>TOTAL</b></td>
	
	                <td align="right" class="fontNormal" height="20" width="100"
	                    bgcolor="#FFFFFF" style="padding: 2px">{{MyUtility::formatThousand($totalActualComAmount)}}</td>
					<td width="50" style="padding: 2px"></td>
	                </tr>
	
	
	                <tr>
	                    <td align="center" colspan="2" class="fontNormal" bgcolor="#ECE9D8" style="padding:2px; border-left-color: #C0C0C0; border-left-width: 1px">
	                        <font color="#FFFF00">
	                            <a href="#none"
	                               onclick="deleteAllAc({{$trNumAc}})">Delete All</a></font></td>
	                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding: 2px">
	                        <select name="cmbMultiBilateralYear" id="cmbMultiBilateralYear" size="1" class="fontNormal"
	                                style="width:99%;">
	                            <option value="0000"></option>
	                            @for($i=0;$i<30;$i++)
	                                <option value="{{1993+$i}}">{{1993+$i}}</option>
	                            @endfor
	                        </select></td>
	                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" style="padding: 2px">
	                        <select size="1" name=" cmbSourceType" id="cmbSourceType" class="fontNormal" style="width: 95%"
	                                onchange="QueryOrg(this.value)">
	                            <option value="1">Bilateral</option>
	                            <option value="2">Multilateral</option>
	                        </select>
	                    </td>
	                    <td align="left" class="fontNormal" id="tdSourceName" bgcolor="#ECE9D8" style="padding: 2px">
	
	                    </td>
							<td align="left" class="fontNormal" bgcolor="#ECE9D8" id="tdOdaProjectName" style="padding: 2px">
	                            <input type="text"  name="OdaProjectName" id="OdaProjectName"  size="20" style="width:80%" class="fontNormal" maxlength="100">
	                            <input type="button" value="..." name="btnMoreOdaProjectName" id="btnMoreOdaProjectName" class="fontNormal"
	                                   onclick="
					 	var layer = document.getElementById('LayerOdaProjectName')
					 	if (layer.style.display == ''){
						 	layer.style.display = 'none'
						 	return
					 	}
					 	layer.style.display = ''
					 	var strTop = ''
					 	var point = myGetXY(OdaProjectName)
					 	layer.style.left =  point.x + 2  + 'px'
					 	layer.style.top =  point.y + this.offsetHeight + 'px'
					 	layer.style.width =  this.offsetWidth  + 'px'
	
						">
	
	                        </td>
	                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="100" style="padding: 2px">
	                        <input type="text" name="txtAmount" id="txtAmount" size="10" class="TextBoxNumber"
	                               onblur="checkDecimals(this)" style="width:94%;" maxlength="12"/></td>
	                    <td align="center" class="fontNormal" bgcolor="#ECE9D8" valign="bottom" width="50" style="padding: 2px">
	                        <a href="#none" title="Add" id="anchorAdd"
	                           onclick="insert(this.title)"><img id="bntAdd" title="Add" border="0" src="/images/add.png"
	                                                             width="16"
	                                                             height="16"></a>&nbsp;
	                        <a href="#none" title="Cancel" onclick="
	                                ById('cmbMultiBilateralYear').selectedIndex = 0
	                                ById('txtAmount').value = ''
	                                ById('OdaProjectName').value = ''
	                                ById('bntAdd').title = 'Add'
	                                ById('bntAdd').src = '/images/add.png'
	                                ClearSelectionRow('tblAc')
	                                ">
							<img title="Cancel" border="0" src="/images/reload.png" 
	                                       height="16"></a>
	                </tr>
	            </table>
	
	        </td>
	    </tr>
	</table>
	
	<input type="hidden" id="trNum" name="trNum" value="{{$trNumAc}}">
	<input type="hidden" id="OldMultiBilateralYear" name="OldMultiBilateralYear">
	<input type="hidden" id="oldOdaProjectName" name="oldOdaProjectName" value="">
	<input type="hidden" id="projectId" name="projectId" value="">	
	<script type="text/javascript">
	    function checkAcAll(obj) {
	        var trNumAc = ById('trNum').value;
	        checkAll(obj, trNumAc, 'tblAc', 'trAc', 'chkAc');
	    }
	    function editProjectAc(projectAcID, row) {
	        ClearSelectionRow('tblAc')
	        editRow('trAc' + row)
	        var yearAc = ($('#yearAc' + row).text()).trim();
	        var SourceType = ($('#SourceType' + row).val()).trim();
	        var SourceName = ($('#SourceName' + row).val()).trim();
	        var OdaProjectName= ($('#OdaProjectName' + row).text()).trim();
	        var amountAc = ($('#amountAc' + row).text()).trim();
	        byid('cmbMultiBilateralYear').value = yearAc;
	        byid('cmbSourceType').value = SourceType;
	        $('#cmbSourceType').change();
	        $('#SourceName').change();
	        byId('SourceName').value=SourceName;
	        byid('OldMultiBilateralYear').value = yearAc;
	        byid('projectId').value = projectAcID;
	        byid('OdaProjectName').value = OdaProjectName;
	        byid('oldOdaProjectName').value = OdaProjectName;
			byid('txtAmount').value = amountAc;
	        ById('bntAdd').src = '/images/save-alt.png'
	        ById('bntAdd').title = 'Update'
	        ById('anchorAdd').title = 'Update'
	    }
	    function chkAc(chk, tr_no) {
	        var allCh = getvalueCheckGroup('chkAc').length;
	        byId("trAc" + tr_no).style.backgroundColor = "red";
	        var n = byid('trNum').value;
	        if (allCh == n) {
	            byId("chkDeleteAll").checked = true;
	        } else {
	            ById("chkDeleteAll").checked = false;
	        }
	        if (chk.checked) {
	            byId("trAc" + tr_no).style.backgroundColor = "red";
	        } else {
	            byId("trAc" + tr_no).style.backgroundColor = "white";
	        }
	    }
	    function checkFillActualCommitment() {
	        var Ctrl = ById('cmbMultiBilateralYear')
	        if (Ctrl.selectedIndex == 0) {
	
	            byId('cmbMultiBilateralYear').title = 'Please select Year';
	            $('#cmbMultiBilateralYear').tooltip('show');
	            Ctrl.focus();
	            return false;
	        }
	        check = (ById('cmbSourceType').value == 0)
	        if (check) {
	
	            byId('cmbSourceType').title = 'Please Source Type';
	            $('#cmbSourceType').tooltip('show');
	            check.focus();
	        }
	
	
	        if (ById('cmbSourceType').value < 3) {
	            var check = (ById('SourceName').value == '')
	            if (check) {
	                byId('SourceName').title = 'Please input source of fund';
	                $('#SourceName').tooltip('show');
	                ById('SourceName').focus()
	                return false;
	            }
	        }
	
	
	        check = (ById('txtAmount').value == '')
	        if (check) {
	
	            byId('txtAmount').title = 'Please input Amount';
	            $('#txtAmount').tooltip('show');
	            ById('txtAmount').focus();
	            return false;
	        }
	        return true
	
	    } 
	    function QueryOdaProject(value) {
	        var data = '?RID=' + value;
	        Ajax_UpdatePanelAsync('/ngo/project/project_02/queryOdaPorjectName',data,'LayerOdaProjectName',true)
	    }
	    function pagingActualCom(page) {
	
	        var data = '?PRN={{$PRN}}';
	        data += '&page=' + page;
	        Ajax_UpdatePanel("/ngo/project/project_02/listing", data, "spanMultiBilateralCommitment", true);
	    }
	    function deleteAllAc(totalRow) {
	        var MultiBilateralCommitmentId = getCheckBoxValues("chkAc", totalRow)
	        if (MultiBilateralCommitmentId != "") {
	            var answer = confirm("Are you sure to delete?")
	            if (answer) {
	                // ajax to delete
	                var data = "?PRN=" + {{$PRN}};
	                data += "&MultiBilateralCommitmentId=" + MultiBilateralCommitmentId;
	                Ajax_UpdatePanel("/ngo/project/project_02/actual_commitment_delete_all", data, "spanMultiBilateralCommitment", true);
	
	            } else {
	                // do nothing
	            }
	        }
	    }



 function QueryOrg(value) {
			var SourceType = value;
			var submitValue = '?SourceType=' + SourceType;
			Ajax_UpdatePanelAsync('/ngo/project/project_02/query_sourceName', submitValue, 'tdSourceName', true);
		}
	    function insert(title) {
	        var sourceType = ById('cmbSourceType').value
	        var SourceName = ById('SourceName').value
	        var newYear = ById('cmbMultiBilateralYear').value;
	        var OdaProjectName=ById('OdaProjectName').value;
	        var submitValue = '?Year=' + ById('cmbMultiBilateralYear').value;
	        submitValue += '&SourceType=' + toNumber(sourceType);
	        submitValue += '&SourceName=' + SourceName;
	        submitValue += '&Amount=' + toNumber(ById('txtAmount').value);
	        submitValue += '&PRN={{$PRN}}';
	        submitValue += '&OdaProjectName=' + OdaProjectName;
	        submitValue += '&MultiBilateralCommitmentId=' + byid('projectId').value;
	        var canUpdate = true;
	        var OldOdaProjectName = byid('oldOdaProjectName').value;
	        var oldYear = byid('OldMultiBilateralYear').value
	
	        if ((OldOdaProjectName != OdaProjectName) || (newYear != oldYear)) {
	             isAcExist = Ajax_getResult("/ngo/project/project_02/actual_commitment_exist", submitValue) == "true";
	             if (isAcExist) {
	                byId('OdaProjectName').title = 'Selected source name already exist';
	                $('#OdaProjectName').tooltip('show')
	                return;
	            } else {
	                // update
	                canUpdate = true;
	            }
	        }
	
	
	        if ((checkFillActualCommitment()) && canUpdate) {
	
	            if (title == "Add") {
	                Ajax_UpdatePanelAsync('/ngo/project/project_02/actual_commitment_insert', submitValue, 'spanMultiBilateralCommitment', true)
	            } else {
	                Ajax_UpdatePanelAsync('/ngo/project/project_02/actual_commitment_update', submitValue, 'spanMultiBilateralCommitment', true)
	            }
	            $("#cmbSourceType").change();
	        } else {
	            return;
	        }
	    }

	</script>