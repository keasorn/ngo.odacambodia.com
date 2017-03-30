<?php
use App\Http\Controllers\MyUtility;

$user = session('ngouser');
$RID = $user->RID;
$IsAdmin = $user->IsAdmin == 1;
?>
@if(count($ngo_list)>0)
    {!!MyUtility::ajaxPaging($ngo_list, "paginateProjectNgo")!!}
    <table id="table2" style="border-collapse: collapse" width="100%" cellpadding="2"
           border="0">
        <tbody>
        <tr>
            <td align="center">
                <table class="fontNormal" id="table3"
                       style="border-collapse: collapse; height: 125px !important;"
                       width="100%"
                       cellspacing="1"
                       cellpadding="2" bordercolor="#0066CC" border="1">
                    <tbody>
                    <tr>
                        <td style="color: #000080" bordercolor="#008080" bgcolor="#E8E8FF"
                            align="center" height="15">
                            <b>
                                <font color="#0033CC">No</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" nowrap=""
                            bgcolor="#E8E8FF" align="center"
                            height="15">
                            <b>
                                <font color="#0033CC">Acronym</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" nowrap=""
                            bgcolor="#E8E8FF" align="center"
                            height="15">
                            <b>
                                <font color="#0033CC">NGO Name</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" nowrap=""
                            bgcolor="#E8E8FF" align="center"
                            height="15">
                            <b>
                                <font color="#0033CC">NGO Type</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" nowrap=""
                            bgcolor="#E8E8FF" align="center"
                            height="15">
                            <b> <font color="#0033CC">NGO Address</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" bgcolor="#E8E8FF"
                            align="center" height="15">
                            <b> <font color="#0033CC">NGO Status</font></b></td>
                        <td style="color: #000080" bordercolor="#008080" bgcolor="#E8E8FF"
                            align="center" height="15">
                            <b> <font color="#0033CC">Number Of Projects</font></b>
                        </td>
                        <td style="color: #000080" bordercolor="#008080" bgcolor="#E8E8FF"
                            align="center" height="15">
                            &nbsp;</td>
                    </tr>
                    <?php
                    $pageSize = $ngo_list->perPage();
                    $currentPage = $ngo_list->currentPage();
                    $i = $currentPage * ($pageSize) - $pageSize;
                    ?>


                    @foreach($ngo_list as $ngo)
                        <tr class="fontNormal" id="tr1356">
                            <td valign="top" align="center" height="15" style="padding: 2px">
                                <font color="#333333">{{++$i}}.</font></td>
                            <td valign="top" align="center" height="15" style="padding: 2px">
                                <font color="#333333">
                                    {{$ngo->Acronym}}</font></td>
                            <td valign="top" align="left" height="15" style="padding: 2px"><a
                                        href="/report/coredetail/report_core_detail?RID={{$ngo->RID}}"
                                        target="_blank">{{$ngo->NGOName}}</a></td>
                            <td valign="top" nowrap="" align="center" height="15" style="padding: 2px">
                                <font color="#333333">
                                    @if($ngo->TypeCode==1)
                                        Foreign NGO
                                    @else
                                        Cambodian NGO
                                    @endif

                                </font></td>
                            <td valign="top" align="left" height="15" style="padding: 2px">
                                <font color="#333333">{{$ngo->Address_1_E}}</font></td>
                            <td id="tdStatus1" name="tdStatus1" valign="top" nowrap=""
                                bgcolor="white" align="center"
                                height="15" style="padding: 2px">
                                <font color="#666666">
                                <span id="aStatus1">
                                  {{MyUtility::getNgoStatusName($ngo->NGOStatusName)}}

                                </span>
                                </font>

                                <input id="hiddenNgoStatusId1" value="1" type="hidden">
                            </td>
                            <td valign="top" nowrap="" align="center" height="15" style="padding: 2px">

                                <a href="/list/list_of_project?RID={{$ngo->RID}}">{{$ngo->number_of_projects}}</a>

                            </td>
                            <td valign="top" nowrap="" bgcolor="#FFFFFF" align="center"
                                height="15" style="padding: 2px">
                                @if(!$IsAdmin)
                                    @if($ngo->RID==$RID)
                                        <a title="Edit NGO"
                                           href="/dataentry/core_detail?RID={{$ngo->RID}}">
                                            <font color="#FF0066"
                                                  style="color: #ff0000 !important;">Edit</font></a>
                                    @else
                                        <font color="#808080">Edit</font>
                                    @endif
                                @else
                                    <a title="Edit NGO"
                                       href="/dataentry/core_detail?RID={{$ngo->RID}}">
                                        <font color="#FF0066"
                                              style="color: #ff0000 !important;">Edit</font></a> |  <a title="Edit NGO"
                                                                                                       href="#none" onclick="underCon();">
                                        <font color="#FF0066"
                                              style="color: #ff0000 !important;">Delte</font></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </td>
        </tr>
        </tbody>
    </table>
@else
    <tr>
        <td><h4>No Project Found</h4></td>
    </tr>
@endif

<script type="text/javascript">

    function underCon(){
        alert("Under Construction!");
    }
    function paginateProjectNgo(page) {
        var data = '?RID=' + {{$RID}};
        data += "&Status=" + $("input[name='rdNgoStatus']:checked").val();
        data += "&NgoType=" + $("input[name='rdNgoType']:checked").val();
        data += "&orderBy=" + $("input[name='rdSearchBy']:checked").val();
        data += "&ap=" + $("#hiddenLetter").val();
        data += '&page=' + page;

        Ajax_UpdatePanel("/ajax/list_of_ngo", data, "spanNgoListing", true);

    }

</script>
