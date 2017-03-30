<?php
use App\Http\Controllers\MyUtility;
?>
<table border="0" width="100%" class="fontNormal"
       cellpadding="2" style="border-collapse: collapse">
    <tr>
        <td width="75%" valign="top">
            <img border="0"
                 src="/images/number_of_project_by_ngo.jpg"
                 width="253" height="40"></td>
        <td align="right" width="20%">
            NGO
            Status:
        </td>
        <td width="5%">
            <select size="1" name="NgoStatusId"
                    id="NgoStatusId" class="fontNormal"
                    onchange="myform.submit()">
                <option value="" {{MyUtility::getSelected("",$NgoStatusId)}}>
                    All
                </option>
                <option value="1" {{MyUtility::getSelected("1",$NgoStatusId)}}>
                    Active
                </option>
                <option value="3" {{MyUtility::getSelected("3",$NgoStatusId)}}>
                    Not Reported
                </option>
                <option value="4" {{MyUtility::getSelected("4",$NgoStatusId)}}>
                    No Active
                </option>
                <option value="2" {{MyUtility::getSelected("2",$NgoStatusId)}}>
                    Closed
                </option>
            </select></td>
    </tr>
    <tr>
    <td colspan="3" height="9" style="padding: 4px">   <?php
            if ((count($report_by_ngo) > 0) && ($page>0)) {
                $links= $report_by_ngo->links();
                $custom_url="NgoStatusId=".$NgoStatusId."&page";
                echo str_replace("page",$custom_url,$links);
            }
            ?><tr>
        <td colspan="3">
         
            <table border="1" width="100%" id="table3"
                   cellpadding="2"
                   style="border-collapse: collapse"
                   bordercolor="#0066FF" class="fontNormal">
                <tr>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <font color="#0066CC">
                            <b>No</b></font></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                Acronym</font></b></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                NGO Name</font></b></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                Logo</font></b></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                NGO Type</font></b></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                NGO Status</font></b></td>
                    <td align="center" bgcolor="#DEDEFE" style="padding: 2px">
                        <b>
                            <font color="#0066CC">
                                Number Of Projects</font></b></td>
                </tr>
                <?php
                if ((count($report_by_ngo) > 0) && ($page>0)) {
                    $AbsolutePosition = $report_by_ngo->perPage() * $report_by_ngo->currentPage() - $report_by_ngo->perPage();
                } else {
                    $AbsolutePosition = 0;
                }
                ?>
                @foreach($report_by_ngo
                as
                $row)
                    @if($AbsolutePosition%2==0)
                        <tr bgcolor="">
                    @else
                        <tr bgcolor="#EEEEEE">
                            @endif
                            <td align="right"
                                valign="top" style="padding: 2px">{{++$AbsolutePosition}} .
                            </td>
                            <td align="center"
                                valign="top" style="padding: 2px">{{$row->Acronym}}</td>
                            <td valign="top" style="padding: 2px">
                                <a href="/report/coredetail/report_core_detail?RID={{$row->RID}}"
                                   target="_blank">{{$row->NGOName}}</a>
                            </td>
                            <td align="center" nowrap
                                valign="top" style="padding: 2px">
                                @if($row->Logo !="")
                                    <a href="#none"
                                       id="<%=logo%>"
                                       onclick="
                                               var img = ById('img_ngo_logo')
                                               img.src = '/assets/logo/{{MyUtility::getNgoType($row->TypeCode)}}/{{$row->Logo}}'
                                               var point = myGetXY(this)
                                               var sp =ById('span_ngo_logo')
                                               sp.style.display = ''
                                               sp.style.left =  (point.x - 230)  + 'px'
                                               sp.style.top =  point.y - 2 + 'px'

                                               ">{{$row->Acronym}}</a>
                                @endif
                            </td>
                            <td align=" center" nowrap
                                valign="top" style="padding: 2px">{{MyUtility::getNgoType($row->TypeCode)}}
                            </td>
                            <td align="center" nowrap
                                valign="top" style="padding: 2px">{{MyUtility::getNgoStatusName($row->NGOStatusName)}} </td>
                            <td align="right" nowrap
                                valign="top"
                                style="padding:2px; ">
                                <b><a
                                            href="/ngo/report/listing_by_ngo?RID={{$row->RID}}">{{ 
								MyUtility::formatThousand($row->number_of_projects)}}</a></b></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td align="right" colspan="6"
                                bgcolor="#DEDEFE" style="padding: 2px">
                                <font color="#0000FF">
                                    <b>
                                        TOTAL:</b></font>
                            </td>
                            <td align="right"
                                bgcolor="#DEDEFE"
                                style="padding:2px; ">
                                <font color="#0000FF">
                                    <b>{{$CountAllPRN}}</b></font>
                            </td>
                        </tr>
            </table>
        </td>
    </tr>
</table>