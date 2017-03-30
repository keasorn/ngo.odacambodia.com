<?php

use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;

$ngo_core_detail = CoreDetailModel::find($RID);
$Acronym = $ngo_core_detail->Acronym;
$NGOStatusName = $ngo_core_detail->NGOStatusName;
$Org_Name_E = $ngo_core_detail->Org_Name_E;
$ngo_pro_list = DB::table('v_ngo_listing_project_on_going')->where('RID', $RID)->orderBy("PName_E")->get();
$user = session('ngouser');
$IsAdmin = $user->IsAdmin==1;

?>
<table style="border-collapse: collapse" id="table6" width="95%" cellpadding="0" border="0" class="margin-auto">
    <tbody>
    <tr>
        <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px" class="fontNormal"
            nowrap="" align="left">
            <b>
                <a href="/dataentry/core_detail?RID={{$RID}}">
                    Core Detail</a> &gt;
                <a href="#none" class="red"><font class="red">List of On-going
                        Projects</font></a></b></td>
    </tr>
    </tbody>
</table>
<table style="border-collapse: collapse" id="table5" width="95%" cellpadding="0" border="0" class="margin-auto">
    <tbody>
    <tr>
        <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px" align="left">
        </td>
    </tr>
    <tr>
        <td style="padding-left: 5px; padding-right: 0; padding-top: 0; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium"
            height="22" align="right">

            <a href="/report/coredetail/report_core_detail?RID={{$RID}}" target="_blank" class="fontnormal">
                <img src="../images/Preview.gif" width="15" height="15" border="0" align="absbottom">
                Preview
            </a>

        </td>
    </tr>
    <tr>
        <td style="border-top-width: medium; border-top-style:none" valign="top" height="66%">
            <table id="table1" style="border-collapse: collapse" width="100%" cellspacing="1" bordercolor="#C0C0C0"
                   border="1">
                <tbody>
                <tr>
                    <td valign="top" align="center">
                        <table id="table22" style="border-collapse: collapse" class="fontNormal" width="100%"
                               cellspacing="1" border="0">
                            <tbody>
                            <tr>
                                <td width="8%" valign="middle" height="22" align="right">&nbsp;</td>
                                <td class="fontNormalBlue" width="91%" valign="middle" height="22" align="left">
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td width="8%" valign="middle" height="22" align="right"><b>Acronym:</b></td>
                                <td class="fontNormalBlue" width="91%" valign="middle" height="22" align="left">
                                    <b>&nbsp;{{$Acronym}}</b></td>
                            </tr>
                            <tr>
                                <td width="8%" valign="middle" height="22" align="right"><b>NGO Name:</b></td>
                                <td class="fontNormalBlue" width="91%" valign="middle" height="22" align="left">
                                    <b>&nbsp;&nbsp;{{$Org_Name_E}}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center">


<span id="spanListOfActiveProject">

    @if(count($ngo_pro_list)>0)
        <table id="tblProjectList" style="border-collapse:collapse" class="fontNormal" width="100%" cellspacing="1"
               bordercolor="#C0C0C0" border="1" bgcolor="">
            <tbody>
            <tr>
                <th height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>No</b></font></th>
                <th height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>Project Name</b></font></th>
                <th height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>MOU With</b></font></th>
                <th height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>Start Date</b></font></th>
                <th height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>End Date</b></font></th>
                <th width="102" height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    <font color="#FFFFFF"><b>Project Status</b></font></th>

                <th width="92" height="25" bgcolor="#008000" style="text-align: center; padding: 2px">
                    &nbsp;</th>

            </tr>
            <?php $i = 1;?>
            @foreach($ngo_pro_list as $pro_on_goin)

                <tr id="ProjectListRow1" bgcolor="white">
                    <td class="fontNormal" align="center" style="padding: 2px">{{$i++}}.</td>
                    <td class="fontNormal" align="left" style="padding: 2px">{{$pro_on_goin->PName_E}}</td>
                    <td align="left" style="padding: 2px">&nbsp;<?php
                        if($pro_on_goin->Min_Name_E=="")
                        {
                            echo"NOT REGISTERED";
                        }
                        else
                        {
                            echo $pro_on_goin->Min_Name_E;
                        }?></td>
                    <td class="fontNormal" nowrap=""
                        align="center" style="padding: 2px">  {{MyUtility::formatKhDate($pro_on_goin->PDateStart)}}</td>
                    <td nowrap="" align="center" style="padding: 2px">{{MyUtility::formatKhDate($pro_on_goin->PDateFinish)}}</td>
                    <td width="102" align="center" style="padding: 2px">On-going
                    </td>
                    <td width="92" align="center" style="padding: 2px">
                        <a href="/ngo/report/individual_project_preview?PRN={{$pro_on_goin->PRN}}" target="_blank"><img
                                    src="../images/Preview.gif" title="Preview" width="15" height="15" border="0"></a>


                        <?php
                        $user = session('ngouser');
                        ?>
                        @if(($user->RID==$RID) || $IsAdmin)
                            <a target="_blank" title="Edit"
                               href="/ngo/project/project_01/project_main?isNewProject=false&PRN={{$pro_on_goin->PRN}}"><img
                                        src="../images/file-edit.png" width="15" height="16" border="0"></a>
                            <a onclick="
                                    if (confirm('Are you sure to delete?\n\nIf Yes, you could not undo!')){
                                    var submitValue = '/dataentry/delete/list_of_active_project?delete=1'
                                    submitValue += '&PRN={{$pro_on_goin->PRN}}'
                                    submitValue += '&RID='+$('#cmbAcronymTop').val();
                                    ById('myform').action += submitValue
                                    ById('myform').submit()
                                    }
                                    else {
                                    ClearSelectionRow('tblProjectList')
                                    }
                                    " title="Delete" href="#none">
                                <img src="../images/delete.png" width="16" height="16" border="0"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <center><font color="#FF6699" size="+1" face="Tahoma">No Active Projects</font></center>
    @endif
</span>


                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
