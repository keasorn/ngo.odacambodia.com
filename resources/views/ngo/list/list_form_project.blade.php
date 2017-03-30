<?php
use App\Http\Controllers\MyUtility;

//if ($RID == 0) {
//  $ngo_pro_list = DB::table('v_ngo_listing_projects_of_data')->whereIn('ProjectStatusName', $status)->orderBy("acronym","ASC")->orderBy("PName_E","ASC");
//} else {
//$ngo_pro_list = DB::table('v_ngo_listing_projects_of_data')->where('RID', $RID)->whereIn('ProjectStatusName', $status)->orderBy("acronym", "PName_E");
//}
$user = session('ngouser');
$RID = $user->RID;
$IsAdmin = $user->IsAdmin==1;
?>

@if(count($ngo_pro_list)>0)
    {!!MyUtility::ajaxPaging($ngo_pro_list, "paginateProjectList")!!}

    <table class="fontNormal" id="table3" style="border-collapse: collapse" width="100%"
           cellpadding="2" bordercolor="#0099FF" border="1" height="30">
        <tbody>
        <tr>
            <td align="center" style="padding:2px; color: #000080" width="3%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b><font color="#0033CC">No</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="10%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">NGO
                        Acronym</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="44%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">Project Name</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="10%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">Start Date</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="8%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">Completion Date</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="8%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">NGO Status</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="7%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                <b>
                    <font color="#0033CC">Project Status</font></b></td>
            <td align="center" style="padding:2px; color: #000080" width="4%" nowrap
                background="/images/table_bg_light_blue01.BMP">
                &nbsp;</td>
        </tr>


        <?php
        $pageSize = $ngo_pro_list->perPage();
        $currentPage = $ngo_pro_list->currentPage();
        $i = $currentPage * ($pageSize) - $pageSize;
        ?>
        @foreach($ngo_pro_list as $npl)
            <tr class="fontNormal">
                <td width="3%" valign="middle" align="center" height="18" style="padding: 2px">{{++$i}}</td>
                <td width="10%" valign="middle" align="center" style="padding: 2px">{{$npl -> Acronym}}</td>
                <td width="44%" valign="middle" align="left" height="18" style="padding: 2px">
                    <a target="_blank"
                       href="/ngo/report/individual_project_preview?PRN={{$npl->PRN}}">{{$npl->PName_E}}</a>

                </td>
                <td width="10%" valign="middle" align="center"
                    height="18" style="padding: 2px">{{MyUtility::formatKhDate($npl->PDateStart)}}</td>
                <td width="10%" valign="middle" align="center"
                    height="18" style="padding: 2px">{{MyUtility::formatKhDate($npl->PDateFinish)}}</td>
                <td width="8%" valign="middle" align="center" height="18" onload="changeBack()" style="padding: 2px">
                    {{MyUtility::getNgoStatusName($npl->NGOStatusName)}}
                </td>
                <td class="projectStatus{{$npl->ProjectStatusName}}" name="tdStatus1" valign="middle" nowrap="nowrap"
                    align="center"
                    height="18"
                    style="padding: 2px"> {{\App\Http\Controllers\MyUtility::getProjectStatusName($npl->ProjectStatusName)}}
                </td>
                <td nowrap="nowrap" align="center" style="padding: 2px">
                    @if(!$IsAdmin)
                        @if($npl->RID==$RID)
                            <a href="/ngo/project/project_01/project_main?PRN={{$npl->PRN}}">
                                <font style="color: #FF0000">Edit</font></a>
                        @else
                            <font style="color: grey;">Edit</font>
                        @endif
                    @else
                        <a href="/ngo/project/project_01/project_main?isNewProject=false&PRN={{$npl->PRN}}">
                            <font style="color: #FF0000">Edit</font></a>
                        | <a href="#none" onclick="underCon()">
                            <font style="color: #FF0000">Delete</font></a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@else
    <b><font color="#FF0066">No Projects</font></b>
@endif

<script type="text/javascript">

    function underCon(){

        alert("Under Construction!");
    }
    function paginateProjectList(page) {
//
        var data = '?RID=' + $("#cmbAcronymTop").val();
        data += "&status=" + getvalueCheckGroup('chStatus');
        data += '&page=' + page;
        Ajax_UpdatePanel("/ajax/list_of_project", data, "list_ngo_project", true);

    }

</script>
