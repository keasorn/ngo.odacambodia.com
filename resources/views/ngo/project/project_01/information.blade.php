@extends('ngo.layout.with_menu')

<?php
use App\Http\Controllers\MyUtility;
use App\Models\oda\odaadmin\MinistryModel;
use App\Models\ngo\CoreDetailModel;
$min_list = DB::table('tbl_ministry')->select("Min_ID", "Min_Name_E")->get();
$RID = "";
$Acronym = "";
$Org_Name_E = "";
$PRN = "<New PRN>";
$ProjectStatusName = "";
$PName_E = "";
$PName_K = "";
$ProjectAim = "";
$DateQCompleted = "";
$idpNumber = "";
$isFundProvider = "";
$StatusPdate = "";
$Remark = "";
$Dateline = "";
$AgencyE = "";
$AgencyK = "";
$PDateStart = "";
$PDateFinish = "";
$MinCode = "";
$MDateExpire = "";
$MDateStart = "";
$MinRef = "";
$isDocSigned = "";
$Docs = "";
$user = session('ngouser');
$RID = $user->RID;
$IsAdmin = $user->IsAdmin;

$list_core = CoreDetailModel::select("RID")->addSelect("Acronym")->orderBy("Acronym")->get();
$coreDetail = CoreDetailModel::select("Acronym")->addSelect("Org_Name_E")->where("RID", $RID)->first();
if (count($coreDetail) > 0) {
    $Acronym = $coreDetail->Acronym;
    $Org_Name_E = $coreDetail->Org_Name_E;
}
if (count($project) > 0) {
    $RID = $project->RID;
    $Acronym = $project->Acronym;
    $Org_Name_E = $project->Org_Name_E;
    $PRN = $project->PRN;
    $ProjectStatusName = $project->ProjectStatusName;
    $PName_E = $project->PName_E;
    $PName_K = $project->PName_K;
    $ProjectAim = $project->ProjectAim;
    $DateQCompleted = $project->DateQCompleted;
    $idpNumber = $project->idpNumber;
    $isFundProvider = $project->isFundProvider;
    $StatusPdate = $project->StatusPdate;
    $Remark = $project->Remark;
    $Dateline = $project->Dateline;
    $AgencyE = $project->AgencyE;
    $AgencyK = $project->AgencyK;
    $PDateStart = $project->PDateStart;
    $PDateFinish = $project->PDateFinish;
    $MinCode = $project->MinCode;
    $MDateExpire = $project->MDateExpire;
    $MDateStart = $project->MDateStart;
    $MinRef = $project->MinRef;
    $Docs = $project->Docs;
    $isDocSigned = $project->isDocSigned;
}
?>
@section('content')
    <form id="myform" method="POST" name="myform">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div align="center">
            <table id="table7" style="border-collapse: collapse" width="99%" cellpadding="0" border="0">
                <tbody>
                <tr>
                    <td valign="top" align="center" height="22">
                        <table id="table38" style="border-collapse: collapse" width="100%" cellpadding="0"
                               border="0">
                            <tbody>@if(count($project) >0)
                                <tr>
                                    <td bgcolor="#CCCCFF"><b>
                                            <font color="#FF0000" style="color: #FF0000">Project Information</font>
                                            >
                                            <a href="/ngo/project/project_02/source_of_fund?PRN={{$PRN}}">
                                                <font color="#333333">Source Of
                                                    Funds</font></a>
                                            >
                                            <a href="/ngo/project/project_03/project_disbursement?PRN={{$PRN}}">
                                                <font
                                                        color="#333333">Disbursements</font></a>
                                        </b></td>
                                </tr>@endif


                            </tbody>
                        </table>
                    </td>
                </tr>@if(count($project) >0)
                    <tr>
                        <td class="fontNormal" valign="middle" align="right" height="22">
                            <a href="/ngo/report/individual_project_preview?PRN={{$PRN}}" target="_blank">
                                <img src="/images/Preview.gif" width="15" border="0" align="absmiddle" height="15">
                                Preview </a></td>
                    </tr>@endif
                <tr>
                    <td style="padding: 4px">
                        <table border="0" width="100%" cellpadding="2" style="border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-collapse:collapse">
                              <tr>
                                <td class="fontNormal" nowrap="" style="border-style:none; border-width:medium; padding:4px; " valign="middle" colspan="5">
                                    <font color="#0000FF"><b>I.&nbsp; Program/Project 
								Information</b></font></td>
                                </tr>
                            <tbody class="tdBox">
                          
                            <tr>
                                <td class="fontNormal" width="2%" nowrap="" align="center" style="padding: 4px">
                                    &nbsp;</td>
                                <td class="fontNormal" width="10%" valign="middle" nowrap=""
                                    align="right" style="padding: 4px">NGO Name:
                                </td>
                                <td class="fontNormal" align="left" width="633" style="padding: 4px">

                                    @if($IsAdmin &&(count($project)==0))
                                        <select style="visibility:visible;" id="adminRID" name="adminRID"
                                                class="fontNormal" onclick="ById('RID').value=this.value">
                                            @foreach($list_core as $core)
                                                <option value="{{$core->RID}}">{{$core->Acronym}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <font size="3"
                                              color="#0066CC">
                                            {{$Acronym ." - " .$Org_Name_E }}</font>
                                    @endif
                                </td>
                                <td class="fontNormal" align="right" width="149" style="padding: 4px">

                                    <b>Currency use: </b>
                                </td>
                                <td class="fontNormal" align="left" width="338" style="padding: 4px" valign="middle">

                                    <input type=text readonly value="USD" size="15"></td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <table border="0" width="100%" cellpadding="2" style="border-collapse: collapse"
                               cellspacing="2">
                            <tbody class="tdBox">

                            <tr>
                                <td class="fontNormal" width="2%" align="center" style="padding: 4px; ">
                                    <b>(1).</b></td>
                                <td  width="14%" nowrap="" align="right" style="padding: 4px; ">
                                    <font color="#0000FF">Program/Project 
									Number: </font>
                                </td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " colspan="2">
                                    <input name="PRN" id="PRN" size="31" class="fontNormal"
                                           value="{{$PRN}}" readonly="" type="text">
                                    <input name="RID" id="RID" size="37" class="fontNormal"
                                           value="{{$RID}}" readonly="" type="hidden"></td>
                                <td valign="middle"  nowrap="" align="right" width="18%"
                                    style="padding: 4px; ">
								<font color="#0000FF">Date Questionnaire
                                    Completed:</font></td>
                                <td width="25%" nowrap="" align="left" style="padding: 4px; ">
                                    
                                    <input name="txtDateQCompleted" id="txtDateQCompleted" size="15"
                                           class="fontNormal"
                                           value="{{MyUtility::formatKhDate($DateQCompleted)}}"
                                           readonly="readonly"
                                           type="text"></td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" style="padding: 4px; "><b>(2).</b></td>
                                <td  width="14%" nowrap="" align="right" style="padding: 4px; ">
                                    <font color="#0000FF">Program/Project 
									Official Title: </font>
                                </td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " colspan="2">
                                    <input name="txtPName_E" id="txtPName_E" value="{{$PName_E}}"
                                           style="width:97%" class="fontNormal" type="text">
                                    <font color="#FF0000">*</font></td>
                                <td nowrap="" align="right" width="18%" style="padding: 4px; ">
                                    <font color="#0000FF">IDP Project Number:</font></td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" style="padding: 4px; ">
                                    
                                    <input name="idpNumber" id="idpNumber" size="15" class="fontNormal"
                                           value="{{$idpNumber}}" maxlength="30" type="text"></td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" style="padding: 4px; ">
								<b>(3).</b></td>
                                <td width="14%" nowrap="" align="right" style="padding: 4px; ">
                                    <font color="#0000FF">Program/Project 
									Objective(s): </font>
                                </td>
                                <td class="fontNormal" nowrap="" align="left" rowspan="3" style="padding: 4px; " colspan="2">
						<textarea rows="5" name="txtProjectAim" id="txtProjectAim"
                                  style="width:97%" class="fontNormal"
                                  cols="20">{{$ProjectAim}}</textarea></td>
                                <td  nowrap="" align="right" width="18%" style="padding: 4px; ">
                                    &nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="26" style="padding: 4px; ">
                                    &nbsp;</td>
                                <td class="fontNormalBlue" width="14%" nowrap="" align="right" height="26"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormalBlue" nowrap="" align="right" height="26" width="18%"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="26"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="31" style="padding: 4px; ">
                                    &nbsp;</td>
                                <td class="fontNormalBlue" width="14%" nowrap="" align="right" height="31"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormalBlue" nowrap="" align="right" height="31" width="18%"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="31"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="31" style="padding: 4px; ">
                                    <b>(4).</b></td>
                                <td width="14%" nowrap="" align="right" height="31"
                                    style="padding: 4px; ">
								<font color="#0000FF">Program/Project:</font></td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " width="21%">
						Start Date:
                                </td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " width="15%">
						Completion Date:</td>
                                <td nowrap="" align="left" height="31" width="18%"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="31"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="31" style="padding: 4px; ">
                                    &nbsp;</td>
                                <td class="fontNormalBlue" width="14%" nowrap="" align="right" height="31"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " width="21%">
						<div id="PDateStart"
                                         class="input-group date my-datepicker"
                                         data-date-format="dd-mm-yyyy"
                                         style="width: 100%;height: 100%;">
                                        <input name="txtPDateStart" id="txtPDateStart" size="15"
                                               class="fontNormal text-left"
                                               value="{{MyUtility::formatKhDate($PDateStart)}}" type="text">
							<span class="input-group-addon"
                                  style="padding: 0px !important;background: transparent !important;margin-left: 4px !important;">
							<img src="/images/date_picker.gif" align="absbottom"
                                 style="    height: 100%;">
							</span></div></td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " width="15%">
						<div id="PDateFinish"
                                         class="input-group date my-datepicker"
                                         data-date-format="dd-mm-yyyy"
                                         style="width: 100%;height: 100%;">
                                        <input name="txtPDateFinish" id="txtPDateFinish" size="15"
                                               class="fontNormal text-left"
                                               value="{{MyUtility::formatKhDate($PDateFinish)}}"
                                               type="text">
							<span class="input-group-addon"
                                  style="padding: 0px !important;background: transparent !important;margin-left: 4px !important;">
							<img src="/images/date_picker.gif" align="absbottom"
                                 style="    height: 100%;">
							</span></div></td>
                                <td class="fontNormalBlue" nowrap="" align="left" height="31" width="18%"
                                    style="padding: 4px; "></td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="31"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="31" style="padding: 4px; ">
                                    <b>(5).</b></td>
                                <td width="14%" nowrap="" align="right" height="31"
                                    style="padding: 4px; ">
								<font color="#0000FF">Program/Project
                                    Status:</font></td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " colspan="2">
                                    <select size="1" id="cmbProjectStatus" name="cmbProjectStatus"
                                            class="fontNormal">
                                        <option value="1" selected="">On-going</option>
                                        <option value="2">Completed</option>
                                        <option value="3">Suspended</option>
                                        <option value="4">Pipeline</option>
                                        <option value="5">(Not
                                            Reported)
                                        </option>
                                    </select></td>
                                <td class="fontNormalBlue" nowrap="" align="right" height="31" width="18%"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="31"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="2%" align="center" height="31" style="padding: 4px; ">
                                    &nbsp;</td>
                                <td class="fontNormalBlue" width="14%" nowrap="" align="right" height="31"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" nowrap="" align="left" style="padding: 4px; " colspan="2">
						&nbsp;</td>
                                <td class="fontNormalBlue" nowrap="" align="right" height="31" width="18%"
                                    style="padding: 4px; ">&nbsp;</td>
                                <td class="fontNormal" width="25%" nowrap="" align="left" height="31"
                                    style="padding: 4px; ">
                                    &nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <table border="0" width="100%" cellpadding="2" style="padding:4px !important" class="tdBox">
                            <tr>
                                <td class="fontNormal" width="26" valign="middle" align="center" style="padding: 4px">
                                    <b>(6).</b></td>
                                <td width="443" style="padding: 4px">
								<font color="#0000FF">Was a Program/Project
                                    Document signed with
                                    Government Ministry (ies) </font>
                                </td>
                                <td width="184" style="padding: 4px">
                                    <input name="rdDocSigned" id="rdDocSignedYes" value="1"
                                           type="radio" onclick="docSingedNo(this.value)"><label
                                            for="rdDocSignedYes">Yes</label>
                                    <input name="rdDocSigned" id="rdDocSignedNo" value="0" checked=""
                                           type="radio" onclick="docSingedNo(this.value)"><label
                                            for="rdDocSignedNo">No</label></td>
                                <td width="158" style="padding: 4px">&nbsp;</td>
                                <td style="padding: 4px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="fontNormal" width="26" valign="middle" align="center" style="padding: 4px">
                                    &nbsp;</td>
                                <td colspan="4" style="padding: 4px">
                                    <table border="0" width="100%" id="tblIsDocSigned" cellpadding="2">
                                        <tr>
                                            <td class="fontNormal" valign="middle" align="left" colspan="5">	If yes, then please specify the name of the Government institution(s) with whom the agreement was signed<span lang="en-us">:</span></td>
                                        </tr>
                                        <tr>
                                            <td class="fontNormal" width="26" valign="middle" align="center">&nbsp;</td>
                                            <td width="443">
                                                <p align="right">Cooperation Agreement with Ministry:</td>
                                            <td width="342" colspan="2">
                                                <select size="1" name="cmbMinCodeE" id="cmbMinCodeE" class="fontNormal">
                                                    <option></option>@foreach($min_list as $min)
                                                        <option value="{{$min->Min_ID}}">{{$min->Min_Name_E}}
                                                        </option>@endforeach

                                                </select></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="fontNormal" width="26" valign="middle" align="center">&nbsp;</td>
                                            <td width="443">
                                                <p align="right">Date
                                                    Signed:
                                            </td>
                                            <td width="184">
                                                <div id="MDateStart"
                                                     class="input-group date my-datepicker"
                                                     data-date-format="dd-mm-yyyy"
                                                     style="width: 100%;height: 100%;">
                                                    <input name="txtMDateStart" id="txtMDateStart" size="12"
                                                           class="fontNormal text-left"
                                                           value="{{MyUtility::formatKhDate($MDateStart)}}"
                                                           type="text">
									<span class="input-group-addon"
                                          style="padding: 0px !important;background: transparent !important;margin-left: 4px !important;">
									<img src="/images/date_picker.gif" align="absbottom"
                                         style="    height: 100%;">
									</span></div>
                                            </td>
                                            <td width="158">
                                                <p align="right">Reference:
                                            </td>
                                            <td>
                                                <input name="txtMinRef" id="txtMinRef" size="20" class="fontNormal"
                                                       value="{{$MinRef}}" type="text"></td>
                                        </tr>
                                        <tr>
                                            <td class="fontNormal" width="26" valign="middle" align="center">&nbsp;</td>
                                            <td width="443">
                                                <p align="right">Date Expiry:
                                            </td>
                                            <td width="184">
                                                <div id="MDateExpire"
                                                     class="input-group date my-datepicker"
                                                     data-date-format="dd-mm-yyyy"
                                                     style="width: 100%;height: 100%;">
                                                    <input name="txtMDateExpire" id="txtMDateExpire" size="12"
                                                           class="fontNormal text-left"
                                                           value="{{MyUtility::formatKhDate($MDateExpire)}}"
                                                           type="text">
									<span class="input-group-addon"
                                          style="padding: 0px !important;background: transparent !important;margin-left: 4px !important;">
									<img src="/images/date_picker.gif" align="absbottom"
                                         style="    height: 100%;">
									</span></div>
                                            </td>
                                            <td width="158">
                                                <p align="right">Copy Attached:
                                            </td>
                                            <td>
                                                <input name="rdDocs" id="rdDocsYes" value="1"
                                                       type="radio"><label for="rdDocsYes">Yes</label>
                                                <input name="rdDocs" id="rdDocsNo" value="2" checked=""
                                                       type="radio"><label for="rdDocsNo">No</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table border="0" width="100%" cellpadding="2">
                            <tr>
                                <td id="ngo_sector" height="44">
                                    <p align="center">
                                        <button type="button" name="bntSave" id="bntSave" class="fontNormal"
                                                onclick="myform_onSave()">
                                            <img src="/images/save_all.gif" name="imgSaveAll" align="absmiddle">
                                            Save All
                                        </button>
                                        <button type="button" name="bntCancel" id="bntCancel" class="fontNormal"
                                                onclick="window.document.location='/list/list_of_project'">
                                            <img src="/images/finish.png" name="imgSaveAll" width="16"
                                                 align="absmiddle"
                                                 height="16"> Finish
                                        </button>@if(count($project) >0)
                                            <button type="button" name="bntNext" class="fontNormal"
                                                    onclick="window.location='/ngo/project/project_02/source_of_fund?PRN={{$PRN}}'">
                                                <img
                                                        src="/images/forward-alt.png" name="imgSaveAll" width="16"
                                                        align="absmiddle" height="16">
                                                Next
                                            </button>@endif

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>


        </div>
    </form>
    <script type="text/javascript">

        $(function () {
            //approval-date
            $('#PDateStart').datepicker({
                autoclose: true,
                todayHighlight: true,
                clearBtn: true,
                todayBtn: "linked",
                format:"dd-M-yyyy",
                beforeShowMonth: function (date) {
                    if (date.getMonth() == 8) {
                        return false;
                    }
                },
                beforeShowYear: function (date) {
                    if (date.getFullYear() == 2007) {
                        return false;
                    }
                },
                toggleActive: true
            });     //approval-date
            $('#MDateStart').datepicker({
                autoclose: true,
                todayHighlight: true,
                clearBtn: true,
                todayBtn: "linked",
                format:"dd-M-yyyy",
                beforeShowMonth: function (date) {
                    if (date.getMonth() == 8) {
                        return false;
                    }
                },
                beforeShowYear: function (date) {
                    if (date.getFullYear() == 2007) {
                        return false;
                    }
                },
                toggleActive: true
            });
            $('#MDateExpire').datepicker({
                autoclose: true,
                todayHighlight: true,
                clearBtn: true,
                todayBtn: "linked",
                beforeShowMonth: function (date) {
                    if (date.getMonth() == 8) {
                        return false;
                    }
                },
                beforeShowYear: function (date) {
                    if (date.getFullYear() == 2007) {
                        return false;
                    }
                },
                toggleActive: true
            });
            $('#PDateFinish').datepicker({
                autoclose: true,
                todayHighlight: true,
                clearBtn: true,
                todayBtn: "linked",
                format:"dd-M-yyyy",
                beforeShowMonth: function (date) {
                    if (date.getMonth() == 8) {
                        return false;
                    }
                },
                beforeShowYear: function (date) {
                    if (date.getFullYear() == 2007) {
                        return false;
                    }
                },
                toggleActive: true
            });
        });
        function checkFill() {
            var isOk = true;

            var rdDoc = $('input[name="rdDocSigned"]:checked').val();

            if ($("#txtPName_E").val() == "") {
                byId('txtPName_E').title = 'Project name could not be blank';
                $('#txtPName_E').tooltip('show')
                $('#txtPName_E').focus()
                return false;
            }
            return true;
        }
        function myform_onSave() {
            if (checkFill()) {
                $("#myform").attr("action", "/ngo/project/project_01/project_main");
                $("#myform").submit();
            }
            else {
                return;
            }
        }

        function getDocSignde(id) {
            if (id == 1) {
                byId("rdDocSignedYes").checked = true;
            } else {
                byId("rdDocSignedNo").checked = true;
            }
            docSingedNo(id);
        }

        function docSingedNo(id) {
            if (id != 1) {

                $("#tblIsDocSigned").find("input,button,textarea,select").attr("disabled", "disabled");
                $("#cmbMinCodeE").val("")
                $("#txtMDateStart").val("")
                $("#txtMDateExpire").val("")
                $("#txtMinRef").val("")
                byId("rdDocsNo").checked = true;
            } else {
                $("#tblIsDocSigned").find("input,button,textarea,select").attr("disabled", false);
            }
        }

        function getDoc(id) {
            if (id == 1) {
                byId("rdDocsYes").checked = true;
            } else {
                byId("rdDocsNo").checked = true;
            }
        }
        function init() {
            getDoc({{$Docs}})
            getDocSignde({{$isDocSigned}})
            $("#cmbProjectStatus").val({{$ProjectStatusName}});
            $("#cmbMinCodeE").val({{$MinCode}});
        }
        init();
    </script>

@endsection