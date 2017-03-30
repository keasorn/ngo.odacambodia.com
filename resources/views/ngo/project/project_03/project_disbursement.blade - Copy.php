@extends('ngo.layout.with_menu')


<?php

use App\Models\ngo\CoreDetailModel;
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

$core_detail = CoreDetailModel::where('RID', $RID)->first();
?>

@section('content')

    <form id="myform" method="POST" name="myform">
        <div align="center">
            <table border="0" width="99%" cellpadding="2" style="border-collapse: collapse">
                <tr>
                    <td colspan="2" bgcolor="#CCCCFF">
                        <b>
                            <a
                                    href="/ngo/project/project_01/project_main?isNewProject=false&PRN={{$PRN}}"><font
                                        color="#333333">Project
                                    Information</font></a> &gt;
                            <a href="/ngo/project/project_02/source_of_fund?PRN={{$PRN}}">
                                <font color="#333333">Source Of Funds</font></a><font color="#FF0066">
                            </font>&gt;<font color="#FF0066">
                                Disbursements</font></b></td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">
                        <p align="right">
                            <a href="http://localhost:8000/ngo/report/individual_project_preview?PRN={{$PRN}}"
                               target="_blank">
                                <img border="0" src="/images/Preview.gif" width="15" height="15" align="absmiddle">Preview</a>
                    </td>
                </tr>
                <tr>
                    <td width="99%" colspan="2" style="padding: 2px">
                        <font color="#114DFF"><b>II. Disbursements and Projections</b></font></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>(10).</b></td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>Disbursements and Projections by Type of Assistance</b></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include("ngo.project.project_03.disbursement_by_project")</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                                    <b>(11)a.</b></td>
                    <td width="96%" style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                                    <b>&nbsp;Disbursements and Projections by 
									Sector and Activity</b></td>
                </tr>
                <tr>
                    <td width="2%" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px">&nbsp;</td>
                  <td id="project_sector_form"
                                    style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px">
					<span style="color: rgb(0, 0, 0); font-family: Verdana, Tahoma; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;">
					Enter the amount disbursed (in reporting currency) to each 
					sector and sub-sector from your own core resources</span></td>
                </tr>
                <tr>
                    <td width="2%" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">&nbsp;</td>
                  <td id="project_sector_form"
                                    style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">@include('ngo.project.project_01.form_sector')</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                  <td 
                                    style="padding: 4px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>(11)b.
                    </b>
                    </td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>Thematic Marker </b></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        In addition to the sectors receiving
                        financial support, identified in 15a above, many
                        projects have additional objectives that may not
                        be funded as a &quot;sector&quot; (for example, capacity
                        development or gender mainstreaming). Indicate
                        below the additional objectives, if any,
                        associated with this project.
                    </td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%" id="thematicMaker"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include("ngo.project.project_03.thematic_marker_form")</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px"><font color="#0000FF">
					<b>III.</b></font></td>
                    <td width="96%" style="padding: 2px"><font color="#0000FF">
                        <b>Target Geographic Location(s) of
                            Program/Project Activities</b></font></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        Indicate the estimated geographical
                        percentage allocation of total
                        program/project resources from your own
                        core resources for the entire project
                        period.
                        (N.B. Project based in Phnom Penh that
                        serve the whole country should be
                        classified as &quot;Nation-wide&quot; not &quot;Phnom
                        Penh&quot;)
                    </td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%" id="target_location"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include("ngo.project.project_03.target_geographic_form")
                    </td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px"><font color="#0000FF">
					<b>IV.</b></font></td>
                    <td width="96%" style="padding: 2px"><font color="#0000FF">
                        <b>Contact Details and Additional Comment</b></font></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>(12).</b></td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                        <table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
                            <tr>
                                <td width="266" align="right" style="padding: 2px">
                                    <font color="#0000FF">NGO Name:</font></td>
                                <td style="padding: 2px">
                                    <b>{{$core_detail->Org_Name_E}}</b></td>
                            </tr>
                            <tr>
                                <td width="266" align="right" style="padding: 2px">
                                    <font color="#0000FF">Contact Name:
                                    </font></td>
                                <td style="padding: 2px">{{$core_detail->Contact_Name_E}}</td>
                            </tr>
                            <tr>
                                <td width="266" align="right" style="padding: 2px">
                                    <font color="#0000FF">Contact Title:</font></td>
                                <td style="padding: 2px">{{$core_detail->Contact_Title_E}}</td>
                            </tr>
                            <tr>
                                <td width="266" align="right" style="padding: 2px">
                                    <font color="#0000FF">Phone:
                                    </font></td>
                                <td style="padding: 2px">{{$core_detail->Tel_No}}</td>
                            </tr>
                            <tr>
                                <td width="266" align="right" style="padding: 2px">
                                    <font color="#0000FF">Email:</font></td>
                                <td style="padding: 2px">{{$core_detail->eMail}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">
                        &nbsp;</td>
                    <td width="96%" style="padding: 2px">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>(13).</b></td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>Project Staff</b></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%" id="tdProjectStaff"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include("ngo.project.project_03.projectstaff")
                    </td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px"><b><font color="#0000FF">V.</font></b></td>
                    <td width="96%" style="padding: 2px"><b><font color="#0000FF">

                        Attachment of Project Document(s)</font></b></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">

                        &nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%" id="project_doc"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">@include("ngo.project.project_03.project_doc_form")</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%" id="project_link_doc"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include("ngo.project.project_03.project_link_doc_form")</td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                        <b>Remark:</b></td>
                </tr>
                <tr>
                    <td width="2%"
                        style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                        &nbsp;</td>
                    <td width="96%"
                        style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                                        <textarea rows="5" name="Remark" id="Remark" style="width:90%"
                                                  cols="20">{{$Remark}}</textarea></td>
                </tr>
                <tr>
                    <td width="2%" style="padding: 2px">&nbsp;</td>
                    <td width="96%" style="padding: 2px">&nbsp;</td>
                </tr>
                <tr>
                    <td width="99%" colspan="2" style="padding: 2px">
                        <p align="center">
                            <button type="button" name="bntNext1" class="fontNormal"
                                    onClick="window.location='/ngo/project/project_02/source_of_fund?PRN={{$PRN}}'">
                                <img src="/images/back-alt.png" name="imgSaveAll" align="absmiddle" width="16"
                                     height="16"> Back
                            </button>
                            <button type="button" name="bntSave" class="fontNormal" onclick="myform_onSave()">
                                <img src="/images/save_all.gif" name="imgSaveAll" align="absmiddle"> Save All
                            </button>
                            <button type="button" name="bntCancel" id="bntCancel" class="fontNormal"
                                    onclick="window.document.location='/list/list_of_project.asp'">
                                <img src="/images/finish.png" name="imgSaveAll" align="absmiddle" width="16"
                                     height="16"> Finish
                            </button>
                    </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="PRN" value="{{$PRN}}" id="PRN">
    </form>
@endsection
<script type="text/javascript">

    function myform_onSave() {
        $("#myform").attr("action", "/ngo/project/project_03/project_disbursement?isNewProject=false&PRN={{$PRN}}");
        $("#myform").submit();
    }
</script>