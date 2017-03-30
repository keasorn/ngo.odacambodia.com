@extends('ngo.layout.with_menu')
<?php
$topMenuId = "report";
$leftMenuId = "des_own_report";
$col = "";
$colCam = "";
$colAss = "";
?>
@section('content')

    <form method="post" target="_blank" name="ownReportForm" id="ownReportForm">
                                                        <input type="hidden" name="chkNgo" id="chkNgo">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        												<div align="center">
        <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

            <tr>
                <td height="20" width="20%" valign="top" align="left">
                    @include("ngo.layout.left_pane")
                </td>
                <td height="20" width="80%" valign="top">
                    <table border="0" width="100%" id="table2" cellspacing="1" style="border-collapse: collapse">
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="fontLarge">
                                <img border="0" src="/images/design_your_own_report.jpg" width="294" height="22"></td>
                        </tr>
                        <tr>
                            <td valign="top" nowrap width="15%">&nbsp;
                            </td>
                            <td valign="top" width="57%">&nbsp;
                            </td>
                            <td align="right" nowrap valign="top" width="26%">&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" nowrap width="15%">
                                <font color="#0066CC">
                                    <b>Project Status:</b></font><img src="/images/tick.png"></td>
                            <td valign="top" width="57%">
                                <font color="#0000FF">
                                    <input type="checkbox" id="chkAllProjectStatus" name="chkAllProjectStatus"
                                           value="ON"
                                           checked onClick="AllProjectStatus_onclick()"><label
                                            for="chkAllProjectStatus">All</label>
                                    <input type="checkbox" id="chkOngoingProjectStatus" name="chkProjectStatus[]"
                                           value="1"
                                           checked onClick="ProjectStatus_onclick()"><label
                                            for="chkOngoingProjectStatus">On-going</label>
                                    <input type="checkbox" id="chkCompletedProjectStatus" name="chkProjectStatus[]"
                                           value="2"
                                           checked onClick="ProjectStatus_onclick()"><label
                                            for="chkCompletedProjectStatus">Completed</label>
                                    <input type="checkbox" id="chkSuspendedProjectStatus" name="chkProjectStatus[]"
                                           value="3"
                                           checked onClick="ProjectStatus_onclick()"><label
                                            for="chkSuspendedProjectStatus">Suspended</label>
                                    <input type="checkbox" id="chkPipelineProjectStatus" name="chkProjectStatus[]"
                                           value="4"
                                           checked onClick="ProjectStatus_onclick()"><label
                                            for="chkPipelineProjectStatus">Pipeline</label>
                                </font>
                            </td>
                            <td align="right" nowrap valign="top" width="26%">
                                <input type="button" value="Search" name="B2" onClick="myform_submit()">
                                <input type="reset" value="Reset" name="B1">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="fontNormal" border="1" width="100%" id="table3" cellspacing="0"
                                       style="border-collapse: collapse" bordercolor="#0066CC" cellpadding="2">
                                    <tr>
                                        <td background="/images/hdr_app_right.jpg">
                                            <a href="#none"
                                               onClick="openClose('imgDisplayColumn','tdDisplayColumn')"><font
                                                        color="#FFFF00">
                                                    <b>&nbsp;<img id="imgDisplayColumn" title="Close" border="0"
                                                                  src="/images/minus_sign.JPG" width="9"
                                                                  height="9"></b></font><b><font color="#FFFF00">
                                                        Display Columns</font></b></a><img src="/images/tick.png"></td>
                                    </tr>
                                    <tr>
                                        <td id="tdDisplayColumn">
                                            <table border="0" width="100%" id="table19" cellspacing="1"
                                                   style="border-collapse: collapse" class="fontNormal">
                                                <tr>
                                                    <td width="2%" align="right" valign="bottom" class="fontNormalBlue"
                                                        height="24"><img border="0" src="/images/arrow_gray.gif"
                                                                         width="8"
                                                                         height="9"></td>
                                                    <td colspan="6" class="fontNormalBlue" height="24" valign="bottom">
                                                        <b>NGO Information</b><img src="/images/tick.png"></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td valign="middle"><input type="checkbox" name="chkNGOField"
                                                                               tabindex="0" id="chkNGOField" value="ON"
                                                                               checked><label for="chkNGOField">NGO
                                                            Name</label></td>
                                                    <td valign="middle"><input type="checkbox"
                                                                               name="chkNgoDateCommencedField"
                                                                               id="chkNgoDateCommencedField" value="ON"
                                                                               tabindex="1"><label
                                                                for="chkNgoDateCommencedField">Date
                                                            Commenced</label>
                                                    </td>
                                                    <td valign="middle"><input type="checkbox"
                                                                               name="chkNgoDateQCompletedField"
                                                                               id="chkNgoDateQCompletedField"
                                                                               value="ON"><label
                                                                for="chkNgoDateQCompletedField">Date
                                                            Questionnaire Completed</label></td>
                                                    <td valign="middle">&nbsp;</td>
                                                    <td valign="middle">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle" height="20">&nbsp;</td>
                                                    <td height="20">&nbsp;</td>
                                                    <td height="20" valign="bottom"><b>
                                                            Contact Information</b></td>
                                                    <td valign="middle" height="20">&nbsp;</td>
                                                    <td valign="middle" height="20">&nbsp;</td>
                                                    <td valign="middle" height="20">&nbsp;</td>
                                                    <td valign="middle" height="20">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactName"
                                                                               value="ON" id="fp1"><label for="fp1">
                                                            Contact Name</label></td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactPhone"
                                                                               value="ON" id="fp3"><label for="fp3">
                                                            Phone</label></td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactEmail"
                                                                               value="ON" id="fp5"><label for="fp5">
                                                            Email</label></td>
                                                    <td valign="middle">&nbsp;</td>
                                                    <td valign="middle">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactTitle"
                                                                               value="ON" id="fp2"><label for="fp2">
                                                            Contact Title</label></td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactFax"
                                                                               value="ON" id="fp4"><label for="fp4">
                                                            Fax</label></td>
                                                    <td valign="middle"><input type="checkbox" name="chkContactAddress"
                                                                               value="ON" id="fp6"><label for="fp6">
                                                            Address</label></td>
                                                    <td valign="middle">&nbsp;</td>
                                                    <td valign="middle">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="bottom" height="22"><img
                                                                border="0"
                                                                src="/images/arrow_gray.gif"
                                                                width="8"
                                                                height="9">
                                                    </td>
                                                    <td colspan="6" class="fontNormalBlue" height="22" valign="bottom">
                                                        <b>Project Information</b><img src="/images/tick.png"></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2"><input type="checkbox" name="chkPNameEField"
                                                                           id="chkPNameEField" value="ON" checked><label
                                                                for="chkPNameEField">Project
                                                            Name</label></td>
                                                    <td colspan="3"><input type="checkbox" name="chkMinCodeField"
                                                                           id="chkMinCodeField" value="ON"><label
                                                                for="chkMinCodeField">Cooperation
                                                            Agreement With Ministry</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2"><input type="checkbox" name="chkPDateStartField"
                                                                           id="chkPDateStartField" value="ON"
                                                                           checked><label
                                                                for="chkPDateStartField">Start
                                                            Date</label></td>
                                                    <td colspan="3"><input type="checkbox" name="chkProvinceField"
                                                                           id="chkProvinceField" value="ON"><label
                                                                for="chkProvinceField">Province
                                                            (Project's Target Location)</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2"><input type="checkbox" name="chkPDateFinishField"
                                                                           id="chkPDateFinishField" value="ON"
                                                                           checked><label for="chkPDateFinishField">Completion
                                                            Date</label></td>
                                                    <td colspan="3"><input type="checkbox"
                                                                           name="chkSectorSubSectorField"
                                                                           id="chkSectorSubSectorField"
                                                                           value="ON"><label
                                                                for="chkSectorSubSectorField">Sector/Sub
                                                            Sector</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2"><input type="checkbox" name="chkProjectStatusField"
                                                                           id="chkProjectStatusField" value="ON"
                                                                           checked><label for="chkProjectStatusField">Project
                                                            Status</label></td>
                                                    <td colspan="3"><input type="checkbox" name="chkTypeOAField"
                                                                           id="chkTypeOAField" value="ON"><label
                                                                for="chkTypeOAField">Type
                                                            of Assistance (include
                                                            Sub-Assistance)</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2"><input type="checkbox"
                                                                           name="chkProjectDateQCompletedField"
                                                                           id="chkProjectDateQCompletedField"
                                                                           value="ON"><label
                                                                for="chkProjectDateQCompletedField">Date
                                                            Questionnaire Completed</label></td>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="4%">&nbsp;</td>
                                                    <td colspan="2">
                                                        <input type="checkbox" name="chkIDPNumber" value="ON"
                                                               id="fp183"><label for="fp183">IDP
                                                            project number</label>
                                                    </td>
                                                    <td colspan="3">&nbsp;</td>
                                                </tr>
                                            </table>

                                            <table border="0" width="100%" id="table19" cellspacing="1"
                                                   style="border-collapse: collapse" class="fontNormal">
                                                <tr>
                                                    <td width="2%" align="right" valign="bottom" height="25"><img
                                                                border="0"
                                                                src="/images/arrow_gray.gif"
                                                                width="8"
                                                                height="9">
                                                    </td>
                                                    <td colspan="4" class="fontNormalBlue" height="25" valign="bottom">
                                                        <b>Disbursement
                                                            Information</b><img src="/images/tick.png"></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td><b>2014 Disbursement</b></td>
                                                    <td><b>2015 Disbursement</b></td>
                                                    <td width="23%" nowrap="nowrap"><b>
                                                            2016 Disbursement</b></td>
                                                    <td><b>Planned Disbursement</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="22%"><input type="checkbox" name="chkOwn2014Field"
                                                                           id="chkOwn2014Field" value="ON"><label
                                                                for="chkOwn2014Field">Own
                                                            Resources 2014</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkOwn2015Field"
                                                                           id="chkOwn2015Field" value="ON"><label
                                                                for="chkOwn2015Field">Own
                                                            Resources 2015</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkOwn2016Field"
                                                                           id="chkOwn2016Field" value="ON"><label
                                                                for="chkOwn2016Field">Own
                                                            Resources 2016</label></td>
                                                    <td><input type="checkbox" name="chkPlan2017Field"
                                                               id="chkPlan2017Field"
                                                               value="ON"><label for="chkPlan2017Field">Plan
                                                            (2017)</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="22%"><input type="checkbox" name="chkOther2014Field"
                                                                           id="chkOther2014Field" value="ON"><label
                                                                for="chkOther2014Field">Multilateral/Bilateral
                                                            2014</label>
                                                    </td>
                                                    <td width="22%"><input type="checkbox" name="chkOther2015Field"
                                                                           id="chkOther2015Field" value="ON"><label
                                                                for="chkOther2015Field">Multilateral/Bilateral
                                                            2015</label>
                                                    </td>
                                                    <td width="22%"><input type="checkbox" name="chkOther2016Field"
                                                                           id="chkOther2016Field" value="ON"><label
                                                                for="chkOther2016Field">Multilateral/Bilateral
                                                            2016</label>
                                                    </td>
                                                    <td><input type="checkbox" name="chkPlan2018Field"
                                                               id="chkPlan2018Field"
                                                               value="ON"><label for="chkPlan2018Field">Plan
                                                            (2018)</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="22%"><input type="checkbox" name="chkNgo2014Field"
                                                                           id="chkNgo2014Field" value="ON"><label
                                                                for="chkNgo2014Field">NGOs
                                                            2014</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkNgo2015Field"
                                                                           id="chkNgo2015Field" value="ON"><label
                                                                for="chkNgo2015Field">NGOs
                                                            2015</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkNgo2016Field"
                                                                           id="chkNgo2016Field" value="ON"><label
                                                                for="chkNgo2016Field">NGOs
                                                            2016</label></td>
                                                    <td><input type="checkbox" name="chkPlan2019Field"
                                                               id="chkPlan2019Field"
                                                               value="ON"><label for="chkPlan2019Field">Plan
                                                            (2019)</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="2%" align="right" valign="middle">&nbsp;</td>
                                                    <td width="22%"><input type="checkbox" name="chkTotal2014Field"
                                                                           id="chkTotal2014Field" value="ON"><label
                                                                for="chkTotal2014Field">Total
                                                            2014</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkTotal2015Field"
                                                                           id="chkTotal2015Field" value="ON"><label
                                                                for="chkTotal2015Field">Total
                                                            2015</label></td>
                                                    <td width="22%"><input type="checkbox" name="chkTotal2016Field"
                                                                           id="chkTotal2016Field" value="ON"><label
                                                                for="chkTotal2016Field">Total
                                                            2016</label></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <table border="1" width="100%" cellspacing="0" bordercolor="#0066CC" cellpadding="2"
                                       class="fontNormal">
                                    <tr>
                                        <td background="/images/hdr_app_right.jpg" class="fontBig">
                                            <a href="#none" onClick="openClose('imgCriteria','tdCriteria')"><font
                                                        color="#FFFF00">
                                                    <b>&nbsp;<img id="imgCriteria" title="Close" border="0"
                                                                  src="/images/minus_sign.JPG" width="9"
                                                                  height="9"></b></font><b><font color="#FFFF00">
                                                        Criteria</font></b></a></td>
                                    </tr>

                                    <tr>
                                        <td id="tdCriteria" style="border-bottom-style: none; border-bottom-width: medium">
                                            <table border="0" width="100%" id="table6" style="border-collapse: collapse"
                                                   cellpadding="2" class="fontNormal">
                                                <tr>
                                                    <td width="13" bgcolor="#D9E5FE">

                                                    &nbsp;</td>
                                                    <td bgcolor="#D9E5FE">
                                                        <a href="#none" onClick="openClose('imgNGO','NGORegion')"><img
                                                                    id="imgNGO" title="Close" border="0"
                                                                    src="/images/minus_sign.JPG" width="9"
                                                                    height="9"><b>
                                                                NGO:</b></a>&nbsp;&nbsp; <font color="#FF0066">
                                                            (Only NGO that have
                                                            projects)</font>
                                                    	<img src="/images/tick.png"></td>
                                                    <td bgcolor="#D9E5FE" align="right">
                                                        <input type="button" value="Search" name="B6"
                                                               onClick="myform_submit()" class="Button"><input type="reset" value="Reset" name="B5" class="Button"></td>
                                                </tr>

                                                <tr>
                                                    <td width="13" bgcolor="#FFFFFF">

                                                    </td>
                                                    <td bgcolor="#FFFFFF" colspan="2" style="padding: 2px">
                                                        <table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
															<tr>
																<td bgcolor="#E0FFB3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">&nbsp;<input type="checkbox"
                                                                                                 name="chkAllForeignNGO"
                                                                                                 id="chkAllForeignNGO"
                                                                                                 onClick="checkedForeignNgoAll(this)"
                                                                                                 value="ON"
                                                                                                 style="font-weight: 700"><b><label
                                                                                    for="chkAllForeignNGO"> Foreign
																NGOs</label></b></td>
															</tr>
															<tr>
																<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px"><table class="table table-fixed" width="100%"
                                                                               cellpadding="2"
                                                                               style="border-collapse: collapse">

                                                                            <tbody>
                                                                            <?php $col = 0?>
                                                                            @foreach($foreignDsCore	as																			$core)
                                                                                <?php ++$col?>
                                                                                @if($col%5==0)
                                                                                    <tr>@endif
                                                                                        <td width="20%"><label style="width: 150px;"><input
                                                                                                    type="checkbox"
                                                                                                    id="Ngo{{$col}}"
                                                                                                    name="chkNgo[]"
                                                                                                    value="{{$core->RID}}"> <a title="{{$core->Org_Name_E}}">{{$core->Acronym}}</a></label>
                                                                                        </td>
                                                                                        @if($col%5==0) </tr>
                                                                                @endif
                                                                            @endforeach

                                                                            </tbody>
                                                                        </table></td>
															</tr>
															<tr>
																<td bgcolor="#E0FFB3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;<input type="checkbox"
                                                                                                 name="chkAllCambodianNGO"
                                                                                                 id="chkAllCambodianNGO"
                                                                                                 onClick="checkedCambodianNgoAll(this)"
                                                                                                 value="ON"
                                                                                                 style="font-weight: 700"><b><label
                                                                                    for="chkAllCambodianNGO"> Cambodian
                                                                                NGOs</label></b></td>
															</tr>
															<tr>
																<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px"><table class="table table-fixed"
                                                                                           width="100%"
                                                                                           cellpadding="2"
                                                                                           style="border-collapse: collapse">

                                                                                        <tbody>
                                                                                        <?php $colCam = 0?>
                                                                                        @foreach($cambodianDsCore as $core)
                                                                                            <?php ++$colCam?>
                                                                                            @if($colCam%5==0)
                                                                                                <tr>@endif
                                                                                                    <td width="20%"><label style="width: 150px;">
                                                                                                        <input
                                                                                                                type="checkbox"
                                                                                                                id="NgoCam{{$colCam}}"
                                                                                                                name="chkNgo[]"
                                                                                                                value="{{$core->RID}}"> <a title="{{$core->Org_Name_E}}"> {{$core->Acronym}} </a></label>
                                                                                                    </td>
                                                                                                    @if($colCam%5==0)
                                                                                                </tr>@endif @endforeach

                                                                                        </tbody>
                                                                                    </table></td>
															</tr>
															<tr>
																<td bgcolor="#E0FFB3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
																&nbsp;<input type="checkbox"
                                                                                                 name="chkAllAsspciation"
                                                                                                 id="chkAllAsspciation"
                                                                                                 onClick="checkedAssociationNgoAll(this)"
                                                                                                 value="ON"
                                                                                                 style="font-weight: 700"><b><label
                                                                                    for="chkAllCambodianNGO0"> Association</label></b>
                                                                    </td>
															</tr>
															<tr>
																<td style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><table class="table table-fixed"
                                                                                           width="100%"
                                                                                           cellpadding="2"
                                                                                           style="border-collapse: collapse"
                                                                                    <tbody>
                                                                                    <?php $colAss = 0?>
                                                                                    @if(count($associationDsCore)>0)

                                                                                        @foreach($associationDsCore as $core)
                                                                                            <?php ++$colAss?>
                                                                                            @if($colAss%5==0)
                                                                                                <tr>@endif
                                                                                                    <td width="20%"><label style="width: 150px;">
                                                                                                        <input
                                                                                                                type="checkbox"
                                                                                                                id="NgoAss{{$colAss}}"
                                                                                                                name="chkNgo[]"
                                                                                                                value="{{$core->RID}}"> <a title="{{$core->Org_Name_E}}"> {{$core->Acronym}}</a></label>
                                                                                                    </td>
                                                                                                    @if($colAss%5==0)
                                                                                                </tr>@endif @endforeach @endif</td>
															</tr>
														</table>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>

                                            </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                </div>

                            </td>
                        </tr>
                        <tr><td style="border-top-style: none; border-top-width: medium">
                                <table border="0" width="100%" id="table6" style="border-collapse: collapse"
                                       cellpadding="2" class="fontNormal">
                                    <tr id="NGORegion">
                                        <td width="13" bgcolor="#E8E8FF" height="25" style="border-style: none; border-width: medium">&nbsp;</td>
                                        <td bgcolor="#E8E8FF" height="25" style="border-style: none; border-width: medium">
                                            <input type="checkbox" name="AllSectors" value="1"
                                                   onClick="SelectAllSector()" id="AllSectors"> <label
                                                    for="AllSectors" class="BoldBlue">
                                                &nbsp;Sector / Sub-Sector</label>
                                        <img src="/images/tick.png"></td>
                                    </tr>
                                    <tr id="SectorRegion">
                                        <td width="13" style="border-top-style: none; border-top-width: medium">&nbsp;</td>
                                        <td style="border-top-style: none; border-top-width: medium">

                                            <table border="0" width="100%" height="300" id="table20"
                                                   style="border-collapse: collapse" cellpadding="0">
                                                <tr>
                                                    <td align="left" class="fontNormal" height="27">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" height="27"
                                                        colspan="4">
                                                        <input type="checkbox" name="MainSector[]" value="ON"
                                                               onClick="SelectMainSector1();"
                                                               id="MainSector1"><b><font color="#008000">
                                                                <label
                                                                        for="MainSector1">
                                                                    Social Sectors</label></font></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="3">
                                                        <input type="checkbox" name="sector" value="ON"
                                                               onClick="SelectSector101();"
                                                               id="sector101"><b>
                                                            <label for="sector101">
                                                                Health</label></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10101"
                                                               value="10101"> <label
                                                                for="subsector10101">
                                                            Hospitals</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10105"
                                                               value="10105"> <label for="subsector10105">
                                                            Reproductive Health</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10102"
                                                               value="10102"> <label for="subsector10102">
                                                            Immunisation &amp; Disease
                                                            Control</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10106"
                                                               value="10106"> <label for="subsector10106">
                                                            Sector Policy</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10103"
                                                               value="10103"> <label for="subsector10103">
                                                            Medical Education</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10107"
                                                               value="10107"> <label
                                                                for="subsector10107">
                                                            Swim</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10108"
                                                               value="10108"> <label for="subsector10108">
                                                            Medicines &amp; Equipment</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10199"
                                                               value="10109"> <label
                                                                for="subsector10199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector101();"
                                                               id="subsector10104"
                                                               value="10104"> <label for="subsector10104">
                                                            Primary Health</label></td>
                                                    <td align="center" class="fontNormal" width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="3">
                                                        <input type="checkbox" name="sector102"
                                                               onClick="SelectSector102();" id="sector102"
                                                               value="10102"><b> <label
                                                                    for="sector102">
                                                                Education</label></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10201"
                                                               value="10201"> <label
                                                                for="subsector10201">
                                                            Primary/Basic</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10207"
                                                               value="10207"> <label
                                                                for="subsector10207">
                                                            Swap</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10202"
                                                               value="10202"> <label for="subsector10202">
                                                            School and Facilities</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10205"
                                                               value="10205"> <label for="subsector10205">
                                                            Teacher Training</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10203"
                                                               value="10203"> <label for="subsector10203">
                                                            Secondary Education</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10206"
                                                               value="10206"> <label for="subsector10206">
                                                            Tertiary, Vocational and
                                                            Higher</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10204"
                                                               value="10204"> <label for="subsector10204">
                                                            Sector Policy</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector102();"
                                                               id="subsector10299"
                                                               value="10299"> <label
                                                                for="subsector10299">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="53%"
                                                        colspan="3">
                                                        <input type="checkbox" name="MainSector[]" value="ON"
                                                               onClick="SelectMainSector2();"
                                                               id="MainSector2"><b><font color="#008000">
                                                                <label
                                                                        for="MainSector2">
                                                                    Economic Sectors</label></font></b></td>
                                                    <td align="right" class="fontNormal" width="45%">
                                                        <input type="button" value="Search" onClick="myform_submit()"
                                                               name="B4"
                                                               class="Button">
                                                        <input type="reset" value="Reset" name="B5"
                                                               class="Button"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="25">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" height="25">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" height="25"
                                                        colspan="3">
                                                        <input type="checkbox" name="sector201" value="ON"
                                                               onClick="SelectSector201();"
                                                               id="sector201"><b>
                                                            <label for="sector201">
                                                                Agriculture</label></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20101"
                                                               value="20101"> <label for="subsector20101">
                                                            Agriculture financial
                                                            services</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20109"
                                                               value="20109"> <label for="subsector20109">
                                                            Food Crops</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20102"
                                                               value="20102"> <label for="subsector20102">
                                                            Agriculture inputs</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20113"
                                                               value="20113"> <label for="subsector20113">
                                                            Food Security, Nutrition</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20103"
                                                               value="20103"> <label for="subsector20103">
                                                            Agriculture sector
                                                            policy and management</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20112"
                                                               value="20112"> <label
                                                                for="subsector20112">
                                                            Forestry</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20104"
                                                               value="20104"> <label for="subsector20104">
                                                            Agriculture Water &amp;
                                                            Irrigation</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="20115" onclick="TestSector201();"
                                                               id="subsector20115">
                                                        <label for="subsector20115">
                                                            Agro-Industry</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20105"
                                                               value="20105"> <label for="subsector20105">
                                                            Cash and Export Crops</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria5"
                                                               onClick="TestSector201();"
                                                               id="subsector20110"
                                                               value="20110"> <label for="subsector20110">
                                                            Livestock &amp; Veterinary</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20106"
                                                               value="20106"> <label for="subsector20106">
                                                            Education, Training</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria4"
                                                               onClick="TestSector201();"
                                                               id="subsector20114"
                                                               value="20114"> <label
                                                                for="subsector20114">
                                                            Meteorology</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20107"
                                                               value="20107"> <label for="subsector20107">
                                                            Extension Services</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria3"
                                                               onClick="TestSector201();"
                                                               id="subsector20111"
                                                               value="20111"> <label
                                                                for="subsector20111">
                                                            Post-harvest</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector201();"
                                                               id="subsector20108"
                                                               value="20108"> <label
                                                                for="subsector20108">
                                                            Fisheries</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%"><input
                                                                type="checkbox" name="chkSubSectorCriteria2"
                                                                onClick="TestSector201();"
                                                                id="subsector20199"
                                                                value="20199"> <label
                                                                for="subsector20199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="95%"
                                                        colspan="3">
                                                        <input type="checkbox" name="sector202" value="ON"
                                                               onClick="SelectSector202();"
                                                               id="sector202"><b>
                                                            <label for="sector202">
                                                                Industriallisation &amp;
                                                                Trade</label></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20201"
                                                               value="20201"> <label for="subsector20201">
                                                            Industrial Development
                                                            (incl standards &amp;
                                                            regulation)</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20205"
                                                               value="20205"> <label for="subsector20205">
                                                            Technology, research &amp;
                                                            innovation</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20202"
                                                               value="20202"> <label for="subsector20202">
                                                            Mining, Fossil Fuel</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20206"
                                                               value="20206"> <label for="subsector20206">
                                                            Trade Policy,
                                                            negotiation &amp; export
                                                            promotion </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20203"
                                                               value="20203"> <label for="subsector20203">
                                                            Industrial Policy and
                                                            Administration</label></td>
                                                    <td align="left" class="fontNormal" width="45%"
                                                        valign="top">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="20207" onclick="TestSector202();"
                                                               id="subsector20207">
                                                        <label for="subsector20207">
                                                            Industrial relations and
                                                            labour market
                                                            strengthening</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector202();"
                                                               id="subsector20204"
                                                               value="20204"> <label for="subsector20204">
                                                            SME Development,
                                                            management &amp; support</label></td>
                                                    <td align="left" class="fontNormal" width="45%"
                                                        valign="top">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="20208" onclick="TestSector202();"
                                                               id="subsector20208">
                                                        <label for="subsector20208">
                                                            SEZs &amp; preparation of
                                                            industrial zones</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="45%"
                                                        valign="top">
                                                        <input type="checkbox" name="chkSubSectorCriteria1"
                                                               onClick="TestSector202();"
                                                               id="subsector20299"
                                                               value="20299"> <label
                                                                for="subsector20299">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="52%"
                                                        colspan="2">
                                                        <input type="checkbox" name="sector203" value="ON"
                                                               onClick="SelectSector203();"
                                                               id="sector203"><b>
                                                            <label for="sector203">
                                                                Rural Development</label></b></td>
                                                    <td align="right" class="fontNormal" width="45%">
                                                        <input type="button" value="Search" name="B4"
                                                               onClick="myform_submit()"
                                                               class="Button">
                                                        <input type="reset" value="Reset" name="B5"
                                                               class="Button"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20302"
                                                               value="20302"> <label for="subsector20302">
                                                            Land Management and Plan</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20306"
                                                               value="20306"> <label for="subsector20306">
                                                            Rural Roads</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20303"
                                                               value="20303"> <label for="subsector20303">
                                                            Land Mine Clear</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20305"
                                                               value="20305"> <label for="subsector20305">
                                                            Rural Water and
                                                            Sanitation</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20304"
                                                               value="20304"> <label for="subsector20304">
                                                            Rural Sector Policy and
                                                            Administration</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector203();"
                                                               id="subsector20399"
                                                               value="20399"> <label
                                                                for="subsector20399">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="3">
                                                        <input type="checkbox" name="sector204" value="ON"
                                                               onClick="SelectSector204();"
                                                               id="sector204"><b>
                                                            <label for="sector204">
                                                                Business &amp; Financial
                                                                Services</label></b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector204();"
                                                               id="subsector20401"
                                                               value="20401"> <label for="subsector20401">
                                                            Business Support
                                                            Services</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector204();"
                                                               id="subsector20404"
                                                               value="20404"> <label for="subsector20404">
                                                            Informal and Semi-Formal
                                                            Institutions</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector204();"
                                                               id="subsector20402"
                                                               value="20402"> <label for="subsector20402">
                                                            Financial Sector Policy,
                                                            Planning and Regulation</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector204();"
                                                               id="subsector20499"
                                                               value="20499"> <label
                                                                for="subsector20499">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector204();"
                                                               id="subsector20403"
                                                               value="20403"> <label for="subsector20403">
                                                            Formal Sector Financial
                                                            Institutions</label></td>
                                                    <td align="center" class="fontNormal" width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector205" value="ON"
                                                               onClick="SelectSector205();"
                                                               id="sector205"><b>
                                                            <label for="sector205">
                                                                Urban Planning &amp;
                                                                Management</label></b></td>
                                                    <td align="center" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector205();"
                                                               id="subsector20501"
                                                               value="20501"> <label for="subsector20501">
                                                            Land Management and
                                                            Spatial Planning</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector205();"
                                                               id="subsector20599"
                                                               value="20599"> <label
                                                                for="subsector20599">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector205();"
                                                               id="subsector20502"
                                                               value="20502"> <label for="subsector20502">
                                                            Urban Sector Policy and
                                                            Administration</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="53%"
                                                        colspan="3">
                                                        <input type="checkbox" name="MainSector[]" value="ON"
                                                               onClick="SelectMainSector3();"
                                                               id="MainSector3"><b><font
                                                                    color="#008000"><label
                                                                        for="MainSector3">Infrastructure</label></font></b>
                                                    </td>
                                                    <td align="right" class="fontNormal" width="45%">
                                                        <input type="button" value="Search" name="B4"
                                                               onClick="myform_submit()"
                                                               class="Button">
                                                        <input type="reset" value="Reset" name="B5"
                                                               class="Button">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector301" value="ON"
                                                               onClick="SelectSector301();"
                                                               id="sector301"><b>
                                                            <label for="sector301">
                                                                Technology, Information
                                                                and Communications</label></b></td>
                                                    <td align="center" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector301();"
                                                               id="subsector30101"
                                                               value="30101"> <label for="subsector30101">
                                                            ICT &amp; digital
                                                            connectivity</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector301();"
                                                               id="subsector30103"
                                                               value="30103"> <label for="subsector30103">
                                                            Radio / Television /
                                                            Print Media</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector301();"
                                                               id="subsector30102"
                                                               value="30102"><label for="subsector30102">Post
                                                            &amp; Telecommunications</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector301();"
                                                               id="subsector30199"
                                                               value="30199"> <label
                                                                for="subsector30199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector302" value="ON"
                                                               onClick="SelectSector302();"
                                                               id="sector302"><b>
                                                            <label for="sector302">
                                                                Energy, Power and
                                                                Electricity</label></b></td>
                                                    <td align="center" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector302();"
                                                               id="subsector30201"
                                                               value="30201"> <label for="subsector30201">
                                                            Energy Research</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector302();"
                                                               id="subsector30204"
                                                               value="30204"> <label for="subsector30204">
                                                            Power Transmission</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector302();"
                                                               id="subsector30202"
                                                               value="30202"> <label for="subsector30202">
                                                            Energy Policy and
                                                            Management</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector302();"
                                                               id="subsector30299"
                                                               value="30299"> <label
                                                                for="subsector30299">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector302();"
                                                               id="subsector30203"
                                                               value="30203"> <label for="subsector30203">
                                                            Power Generation</label></td>
                                                    <td align="center" class="fontNormal" width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector303" value="ON"
                                                               onClick="SelectSector303();"
                                                               id="sector303"><b>
                                                            <label for="sector303">
                                                                Transportation</label></b>
                                                    </td>
                                                    <td align="center" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30301"
                                                               value="30301"> <label for="subsector30301">
                                                            Air Infrastructure &amp;
                                                            Transport</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30304"
                                                               value="30304"> <label for="subsector30304">
                                                            Transport Policy and
                                                            Management</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30302"
                                                               value="30302"> <label for="subsector30302">
                                                            Rail Infrastructure &amp;
                                                            Transport</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30305"
                                                               value="30305"> <label for="subsector30305">
                                                            Water Infrastructure
                                                            (port) &amp; Transport</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30303"
                                                               value="30303"> <label for="subsector30303">
                                                            Road Infrastructure &amp;
                                                            Transport</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector303();"
                                                               id="subsector30399"
                                                               value="30399"> <label
                                                                for="subsector30399">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector304" value="ON"
                                                               onClick="SelectSector304();"
                                                               id="sector304"><b>
                                                            <label for="sector304">
                                                                Water and Sanitation</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30401"
                                                               value="30401"> <label for="subsector30401">
                                                            Education and Training</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30404"
                                                               value="30404"> <label for="subsector30404">
                                                            Waste Management</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30402"
                                                               value="30402"> <label for="subsector30402">
                                                            River Development</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30405"
                                                               value="30405"> <label for="subsector30405">
                                                            Urban Water Supply and
                                                            Sanitation</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30403"
                                                               value="30403"> <label for="subsector30403">
                                                            Sector Policy and
                                                            Planning</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector304();"
                                                               id="subsector30499"
                                                               value="30499"> <label
                                                                for="subsector30499">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" width="53%"
                                                        colspan="3">
                                                        <input type="checkbox" name="MainSector[]" value="ON"
                                                               onClick="SelectMainSector4();"
                                                               id="MainSector4"><font color="#008000"><b>
                                                                <label
                                                                        for="MainSector4">
                                                                    Services &amp;
                                                                    Cross-Sectoral
                                                                    Programmes</label></b></font>
                                                    </td>
                                                    <td align="right" class="fontNormal" width="45%">
                                                        <input type="button" value="Search" name="B4"
                                                               onClick="myform_submit()"
                                                               class="Button">
                                                        <input type="reset" value="Reset" name="B5"
                                                               class="Button">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector401" value="ON"
                                                               onClick="SelectSector401();"
                                                               id="sector401"><b>
                                                            <label for="sector401">
                                                                Community and Social
                                                                Welfare</label></b></td>
                                                    <td align="center" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector401();"
                                                               id="subsector40101"
                                                               value="40101"> <label for="subsector40101">
                                                            Community and Social
                                                            Welfare</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector401();"
                                                               id="subsector40199"
                                                               value="40199"> <label
                                                                for="subsector40199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector402" value="ON"
                                                               onClick="SelectSector402();"
                                                               id="sector402"><b>
                                                            <label for="sector402">
                                                                Culture &amp; Arts</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector402();"
                                                               id="subsector40201"
                                                               value="40201"> <label for="subsector40201">
                                                            Culture &amp; Arts</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector402();"
                                                               id="subsector40299"
                                                               value="40299"> <label
                                                                for="subsector40299">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector403" value="ON"
                                                               onClick="SelectSector403();"
                                                               id="sector403"><b>
                                                            <label for="sector403">
                                                                Environment and
                                                                Sustainability</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria6"
                                                               onClick="TestSector403();"
                                                               id="subsector40301"
                                                               value="40301"> <label for="subsector40301">
                                                            Environment protection
                                                            (incl EIA, pollution
                                                            control)</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="40306" onclick="TestSector403();"
                                                               id="subsector40306"><label
                                                                for="subsector40306">Science
                                                            and technology for
                                                            sustainable development</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="40302" onclick="TestSector403();"
                                                               id="subsector40302"><label
                                                                for="subsector40302">Nature
                                                            conservation and
                                                            protection (protected
                                                            areas)</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria7"
                                                               onClick="TestSector403();"
                                                               id="subsector40399"
                                                               value="40399"><label
                                                                for="subsector40399">Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="40303" onclick="TestSector403();"
                                                               id="subsector40303"><label
                                                                for="subsector40303">Environmental
                                                            knowledge and
                                                            information</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="40304" onclick="TestSector403();"
                                                               id="subsector40304"><label
                                                                for="subsector40304">Green
                                                            economy</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="40305" onclick="TestSector403();"
                                                               id="subsector40305"><label
                                                                for="subsector40305">Biodiversity
                                                            and biosafety</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector701" value="ON"
                                                               onClick="SelectSector701();"
                                                               id="sector701"><b><label for="sector701">
                                                                Climate Change
                                                                (adaptation &amp;
                                                                mitigation)</label></b>
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector701();"
                                                               id="subsector70101"
                                                               value="70101"><label for="subsector70101">
                                                            Climate Change
                                                            adaptation (funded by
                                                            existing ODA)</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector701();"
                                                               id="subsector70199"
                                                               value="70199"><label for="subsector70199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="70102" onclick="TestSector701();"
                                                               id="subsector70102"><label
                                                                for="subsector70102">Climate
                                                            Change mitigation
                                                            (funded by existing ODA)</label></td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="70103" onclick="TestSector701();"
                                                               id="subsector70103"><label
                                                                for="subsector70103">Climate
                                                            Change adaptation
                                                            (funded by new UNFCCC
                                                            commitments)</label></td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               value="70104" onclick="TestSector701();"
                                                               id="subsector70104"><label
                                                                for="subsector70104">Climate
                                                            Change mitigation
                                                            (funded by new UNFCCC
                                                            commitments)</label></td>
                                                    <td align="left" class="fontNormal">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector404" value="ON"
                                                               onClick="SelectSector404();"
                                                               id="sector404"><b>
                                                            <label for="sector404">
                                                                Gender</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector404();"
                                                               id="subsector40401"
                                                               value="40401"> <label
                                                                for="subsector40401">
                                                            Gender</label></td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector404();"
                                                               id="subsector40499"
                                                               value="40499"> <label
                                                                for="subsector40499">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector405" value="ON"
                                                               onClick="SelectSector405();"
                                                               id="sector405"><b>
                                                            <label for="sector405">
                                                                HIV/AIDS</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector405();"
                                                               id="subsector40501"
                                                               value="40501"> <label
                                                                for="subsector40501">
                                                            HIV/AIDS</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" height="19"
                                                        width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector405();"
                                                               id="subsector40599"
                                                               value="40599"> <label
                                                                for="subsector40599">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector406" value="ON"
                                                               onClick="SelectSector406();"
                                                               id="sector406"><b>
                                                            <label for="sector406">
                                                                Governance &amp;
                                                                Administration</label></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40601"
                                                               value="40601"> <label for="subsector40601">
                                                            Economic and Development
                                                            Policy/Planning</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40606"
                                                               value="40606"> <label for="subsector40606">
                                                            Public Financial
                                                            Management</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40602"
                                                               value="40602"> <label
                                                                for="subsector40602">
                                                            Elections</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40607"
                                                               value="40607"> <label for="subsector40607">
                                                            Public Service Reform</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40603"
                                                               value="40603"> <label for="subsector40603">
                                                            Human Rights</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40608"
                                                               value="40608"> <label for="subsector40608">
                                                            Civil Society</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40604"
                                                               value="40604"> <label for="subsector40604">
                                                            Legal and Judicial</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40699"
                                                               value="40699"> <label for="subsector40699">
                                                            &nbsp;Other</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector406();"
                                                               id="subsector40605"
                                                               value="40605"> <label for="subsector40605">
                                                            Local Government Reform</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector407" value="ON"
                                                               onClick="SelectSector407();" id="sector407">
                                                        <label for="sector407">&nbsp;<b>Tourism</b></label>
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector407();"
                                                               id="subsector40701"
                                                               value="40701"> <label
                                                                for="subsector40701">
                                                            Tourism</label>
                                                    </td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector407();"
                                                               id="subsector40799"
                                                               value="40799"> <label
                                                                for="subsector40799">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector501" value="ON"
                                                               onClick="SelectSector501();"
                                                               id="sector501"><b><font color="#000000">
                                                                <label
                                                                        for="sector501">
                                                                    Budget &amp; BoP Support</label></font></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector501();"
                                                               id="subsector50101"
                                                               value="50101"> <label for="subsector50101">
                                                            Budget &amp; BoP Support</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector501();"
                                                               id="subsector50199"
                                                               value="50199"> <label
                                                                for="subsector50199">
                                                            Other</label></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector601" value="ON"
                                                               onClick="SelectSector601();"
                                                               id="sector601"><b><font color="#000000">
                                                                <label
                                                                        for="sector601">
                                                                    Emergency and food aid</label></font></b></td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="2%">
                                                        &nbsp;</td>
                                                    <td align="left" class="fontNormal" width="50%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector601();"
                                                               id="subsector60101"
                                                               value="60101"> <label for="subsector60101">
                                                            Emergency and food aid</label></td>
                                                    <td align="left" class="fontNormal" width="45%">
                                                        <input type="checkbox" name="chkSubSectorCriteria[]"
                                                               onClick="TestSector601();"
                                                               id="subsector60199"
                                                               value="60199"> <label
                                                                for="subsector60199">
                                                            Other</label></td>
                                                </tr>

                                                <tr>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                    <td align="left" class="fontNormal" colspan="2">
                                                        <input type="checkbox" name="sector990199"
                                                               onClick="SelectSector990199()"
                                                               id="sector990199"
                                                               value="990199"><b><font color="#000000">
                                                                <label
                                                                        for="sector990199">
                                                                    Other</label></font></b>
                                                    </td>
                                                    <td align="left" class="fontNormal">&nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table>
                                <table border="0" width="100%" id="table6" style="border-collapse: collapse"
                                       cellpadding="2" class="fontNormal">
                                    <tr>
                                        <td width="13" bgcolor="#E8E8FF" height="25">&nbsp;</td>
                                        <td height="25" bgcolor="#E8E8FF" class="BoldBlue">
                                            <input type="checkbox" name="chkAllTypeOA" id="chkAllTypeOA"
                                                   value="ON" onClick="chkAllTypeOA_Click()">
                                            <label for="chkAllTypeOA">Type Of
                                                Assistance</label><img src="/images/tick.png"></td>
                                        <td bgcolor="#E8E8FF" align="right" height="25">
                                            <font color="#114DFF">
                                                <input type="button" value="Search" name="B3" onClick="myform_submit()"
                                                       class="Button">
                                                <input type="reset" value="Reset" name="B6"
                                                       class="Button"></font></td>
                                    </tr>
                                    <tr>
                                        <td width="13">&nbsp;</td>
                                        <td colspan="2">
                                            <table border="0" width="100%" style="border-collapse: collapse"
                                                   cellspacing="2" cellpadding="2">
                                                <tr>
                                                    <td width="18">&nbsp;</td>
                                                    <td width="370"><input type="checkbox"
                                                                           name="chkTypeOACriteria[]"
                                                                           id="chkFTC"
                                                                           value="1"
                                                                           onClick="isChkAllTypeOA()"><label
                                                                for="chkFTC">Free-Standing
                                                            Technical Cooperation</label></td>
                                                    <td><input type="checkbox" name="chkTypeOACriteria[]"
                                                               id="chkFOA" value="10"
                                                               onClick="isChkAllTypeOA()"><label
                                                                for="chkFOA">Food
                                                            Aid</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="18">&nbsp;</td>
                                                    <td width="370"><input type="checkbox"
                                                                           name="chkTypeOACriteria[]"
                                                                           id="chkPIRTC" value="5"
                                                                           onClick="isChkAllTypeOA()"><label
                                                                for="chkPIRTC">Pre-Investment-Related
                                                            Technical Cooperation</label></td>
                                                    <td><input type="checkbox" name="chkTypeOACriteria[]"
                                                               id="chkERA" value="11"
                                                               onClick="isChkAllTypeOA()"><label
                                                                for="chkERA">Emergency
                                                            and Relief Assistance</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="18">&nbsp;</td>
                                                    <td width="370"><input type="checkbox"
                                                                           name="chkTypeOACriteria[]"
                                                                           id="chkIPP"
                                                                           value="6"
                                                                           onClick="isChkAllTypeOA()"><label
                                                                for="chkIPP">Investment
                                                            Project/Programme</label></td>
                                                    <td><input type="checkbox" name="chkTypeOACriteria[]"
                                                               id="chkNOT" value="12"
                                                               onClick="isChkAllTypeOA()"><label
                                                                for="chkNOT">Not
                                                            Reported</label></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="13" bgcolor="#E8E8FF" valign="middle" height="24">
                                            &nbsp;</td>
                                        <td height="24" colspan="2" valign="middle" bgcolor="#E8E8FF"
                                            class="BoldBlue">
                                            <input type="checkbox" name="chkAllProvince" id="chkAllProvince"
                                                   onClick="chkAllProvince_OnClick()" value="ON"> <label
                                                    for="chkAllProvince">
                                                Provinces</label><img src="/images/tick.png"></td>
                                    </tr>
                                    <tr>
                                        <td width="13">&nbsp;</td>
                                        <td colspan="2">
                                            <table border="0" width="100%" id="table18" cellpadding="0"
                                                   style="border-collapse: collapse" class="fontNormal">
                                                <tr>
                                                    <td width="28">&nbsp;</td>
                                                    <td width="30" align="center">
                                                        <input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProBTMC" value="1"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProBTMC">
                                                            Banteay Meanchey</label>
                                                    </td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProKP" value="7"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProKP">
                                                            Kampot</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProPVH" value="13"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProPVH">
                                                            Preah Vihear</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProSTTR" value="19"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProSTTR">
                                                            Stung Treng</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProTB" value="25"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProTB">
                                                            Tbong Khmum</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="28" height="24">&nbsp;</td>
                                                    <td width="30" align="center" height="24"><input
                                                                type="checkbox" name="chkProvinceCriteria[]"
                                                                id="chkProBTB" value="2"
                                                                onClick="isAllProvince()"></td>
                                                    <td height="24"><label
                                                                for="chkProBTB">
                                                            Battambang</label>
                                                    </td>
                                                    <td height="24"><input type="checkbox"
                                                                           name="chkProvinceCriteria[]"
                                                                           id="chkProKD" value="8"
                                                                           onClick="isAllProvince()"></td>
                                                    <td height="24"><label for="chkProKD">
                                                            Kandal</label>
                                                    </td>
                                                    <td height="24"><input type="checkbox"
                                                                           name="chkProvinceCriteria[]"
                                                                           id="chkProPRV" value="14"
                                                                           onClick="isAllProvince()"></td>
                                                    <td height="24"><label for="chkProPRV">
                                                            Prey Veng</label>
                                                    </td>
                                                    <td height="24"><input type="checkbox"
                                                                           name="chkProvinceCriteria[]"
                                                                           id="chkProSVR" value="20"
                                                                           onClick="isAllProvince()"></td>
                                                    <td height="24"><label for="chkProSVR">
                                                            Svay Rieng</label>
                                                    </td>
                                                    <td height="24"><input type="checkbox"
                                                                           name="chkProvinceCriteria[]"
                                                                           id="chkProCW" value="91"
                                                                           onClick="isAllProvince()"></td>
                                                    <td height="24"><label for="chkProCW">
                                                            Nation Wide</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="28">&nbsp;</td>
                                                    <td width="30" align="center"><input type="checkbox"
                                                                                         name="chkProKC"
                                                                                         id="chkProKC"
                                                                                         value="3"
                                                                                         onClick="isAllProvince()">
                                                    </td>
                                                    <td><label for="chkProKC">
                                                            Kampong Cham</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProKK" value="9"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProKK">
                                                            Koh Kong</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProPURS" value="15"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProPURS">
                                                            Pursat</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProTK" value="21"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProTK">
                                                            Takeo</label></td>
                                                    <td><input type="checkbox" name="chkNotReportedProvince"
                                                               id="chkProNR" value="99"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProNR">
                                                            (Not Reported)</label></td>
                                                </tr>
                                                <tr>
                                                    <td width="28">&nbsp;</td>
                                                    <td width="30" align="center"><input type="checkbox"
                                                                                         name="chkProvinceCriteria[]"
                                                                                         id="chkProKCHHN"
                                                                                         value="4"
                                                                                         onClick="checkedForeignNgoAll(this)">
                                                    </td>
                                                    <td><label for="chkProKCHHN">
                                                            Kampong Chhnang</label>
                                                    </td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProKRCH" value="10"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProKRCH">
                                                            Kratie</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProRTNKR" value="16"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProRTNKR">
                                                            Ratanak Kiri</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProODMC" value="22"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProODMC">
                                                            Otdor Meanchey</label></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="28">&nbsp;</td>
                                                    <td width="30" align="center"><input type="checkbox"
                                                                                         name="chkProvinceCriteria[]"
                                                                                         id="chkProKPSP"
                                                                                         value="5"
                                                                                         onClick="isAllProvince()">
                                                    </td>
                                                    <td><label for="chkProKPSP">
                                                            Kampong Speu</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProMDKR" value="11"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProMDKR">
                                                            Mondul Kiri</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProSR" value="17"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProSR">
                                                            Siem Reap</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProKEP" value="23"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProKEP">
                                                            Kep</label></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="28">&nbsp;</td>
                                                    <td align="center"><input type="checkbox"
                                                                              name="chkProvinceCriteria[]"
                                                                              id="chkProKPT" value="6"
                                                                              onClick="isAllProvince()">
                                                    </td>
                                                    <td><label for="chkProKPT">
                                                            Kampong Thom</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProPP" value="12"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProPP">
                                                            Phnom Penh</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProSHNV" value="18"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProSHNV">
                                                            Preah Sihanouk</label></td>
                                                    <td><input type="checkbox" name="chkProvinceCriteria[]"
                                                               id="chkProPL" value="24"
                                                               onClick="isAllProvince()"></td>
                                                    <td><label for="chkProPL">
                                                            Pailin</label></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                </table></td></tr>

                    </table>

                </td>
            </tr>
        </table>
        </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        </table>

        												</div>

        {!! csrf_field() !!}
        <input type="hidden" id="foreignChkNumber" value="{{$col}}">
        <input type="hidden" id="camChkNumber" value="{{$colCam}}">
        <input type="hidden" id="AssChkNumber" value="{{$colAss}}">
    </form>
@endsection
<script type="text/javascript">
    function myform_submit() {
        $("#ownReportForm").attr("action", "/ngo/own_report/ngo_query_result?page=1");
        $("#ownReportForm").submit();
    }
    function checkedForeignNgoAll(obj) {
        getCheckedAll(obj, byId("foreignChkNumber").value, "Ngo");
    }
    function checkedCambodianNgoAll(obj) {
        getCheckedAll(obj, byId("camChkNumber").value, "NgoCam");
    }
    function checkedAssociationNgoAll(obj) {
        getCheckedAll(obj, byId("AssChkNumber").value, "NgoAss");
    }
    function getCheckedAll(obj, maxNum, chkId) {
        var t = obj.checked;
        for (var i = 1; i <= maxNum; i++) {
            ById(chkId + i).checked = t;
        }
    }

    function AllProjectStatus_onclick()
    {
        var chkAll = ById("chkAllProjectStatus")
        t=chkAll.checked==true;
            ById("chkOngoingProjectStatus").checked = t;
            ById("chkCompletedProjectStatus").checked = t;
            ById("chkSuspendedProjectStatus").checked = t;
            ById("chkPipelineProjectStatus").checked = t;
    }

    function ProjectStatus_onclick()
    {
        var chkAll = ById("chkAllProjectStatus")
        var chk = true
        chk &= ById("chkOngoingProjectStatus").checked;
        chk &= ById("chkCompletedProjectStatus").checked;
        chk &= ById("chkSuspendedProjectStatus").checked ;
        chk &= ById("chkPipelineProjectStatus").checked ;

        if (chk)
        {
            chkAll.checked = true
        }
        else
        {
            chkAll.checked = false
        }
    }

    function clearNgoCriteria()
    {
        var n = ById('hiddenNgoNumber').value
        for (var i=1;i<=n;i++)
        {
            ById("Ngo"+ i).checked = false
        }
        ById("chkAllNGO").checked = false
    }

function clearNgoCriteria()
{
	var n = ById('hiddenNgoNumber').value
	for (var i=1;i<=n;i++)
	{
		ById("Ngo"+ i).checked = false
	}
	ById("chkAllNGO").checked = false
}

function chkAllTypeOA_Click()
{
	var chk = ById("chkAllTypeOA")
	var t = chk.checked
		ById("chkFTC").checked = t
//		ById("chkFTCIE").checked = t
//		ById("chkFTCIOSE").checked = t
//		ById("chkFTCOther").checked = t
		ById("chkPIRTC").checked = t
		ById("chkIPP").checked = t
		ById("chkFOA").checked = t
		ById("chkERA").checked = t
		ById("chkNOT").checked = t
			
	
}

function isChkAllTypeOA()
{
	var t = ById("chkFTC").checked 
//	t &= ById("chkFTCIE").checked 
//	t &= ById("chkFTCIOSE").checked 
//	t &= ById("chkFTCOther").checked 
	t &= ById("chkPIRTC").checked 
	t &= ById("chkIPP").checked 
	t &= ById("chkFOA").checked 
	t &= ById("chkERA").checked
	t &= ById("chkNOT").checked
	

	ById("chkAllTypeOA").checked = t

}

function chkFTC_Click()
{
	var t = ById("chkFTC").checked 
	ById("chkFTCIE").checked = t
	ById("chkFTCIOSE").checked = t
	ById("chkFTCOther").checked = t

	isChkAllTypeOA()
}

function isChkFTC()
{

	var t = ById("chkFTCIE").checked 
	t &= ById("chkFTCIOSE").checked 
	t &= ById("chkFTCOther").checked 

	ById("chkFTC").checked = t

	isChkAllTypeOA()
}


function chkAllProvince_OnClick()
{
	var t = ById("chkAllProvince").checked
	ById("chkProBTMC").checked = t
	ById("chkProBTB").checked = t
	ById("chkProKC").checked = t
	ById("chkProKCHHN").checked = t
	ById("chkProKPSP").checked = t
	ById("chkProKPT").checked = t
	ById("chkProKP").checked = t
	ById("chkProKD").checked = t
	ById("chkProKK").checked = t
	ById("chkProKRCH").checked = t
	ById("chkProMDKR").checked = t
	ById("chkProPP").checked = t
	ById("chkProPVH").checked = t		
	ById("chkProPRV").checked = t
	ById("chkProPURS").checked = t
	ById("chkProRTNKR").checked = t
	ById("chkProSR").checked = t
	ById("chkProSHNV").checked = t
	ById("chkProSTTR").checked = t
	ById("chkProSVR").checked = t
	ById("chkProTK").checked = t
	ById("chkProODMC").checked = t
	ById("chkProKEP").checked = t
	ById("chkProPL").checked = t
	ById("chkProCW").checked = t	
	ById("chkProNR").checked = t
	ById("chkProTB").checked = t	
		
}

function isAllProvince()
{
	var t = true
	t &= ById("chkProBTMC").checked 
	t &= ById("chkProBTB").checked 
	t &= ById("chkProKC").checked 
	t &= ById("chkProKCHHN").checked 
	t &= ById("chkProKPSP").checked 
	t &= ById("chkProKPT").checked 
	t &= ById("chkProKP").checked 
	t &= ById("chkProKD").checked 
	t &= ById("chkProKK").checked 
	t &= ById("chkProKRCH").checked 
	t &= ById("chkProMDKR").checked 
	t &= ById("chkProPP").checked 
	t &= ById("chkProPVH").checked 		
	t &= ById("chkProPRV").checked 
	t &= ById("chkProPURS").checked 
	t &= ById("chkProRTNKR").checked 
	t &= ById("chkProSR").checked 
	t &= ById("chkProSHNV").checked 
	t &= ById("chkProSTTR").checked 
	t &= ById("chkProSVR").checked 
	t &= ById("chkProTK").checked 
	t &= ById("chkProODMC").checked 
	t &= ById("chkProKEP").checked 
	t &= ById("chkProPL").checked 
	t &= ById("chkProCW").checked 			
	t &= ById("chkProNR").checked 		
	t &= ById("chkProTB").checked 		

	ById("chkAllProvince").checked = t
}



function myform_onReset()
{
	var ifr = ById("ifrForeign").contentWindow
	ifr.document.getElementById("myform").reset()

	ifr = ById("ifrCambodian").contentWindow
	ifr.document.getElementById("myform").reset()
}
</script>