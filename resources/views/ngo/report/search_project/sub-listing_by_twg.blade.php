<?php
use App\Http\Controllers\MyUtility;
?>
<table border="1" id="<%=tbl%>" width="95%" cellpadding="2" bordercolor="#C0C0C0" style="border-collapse: collapse">
    <tr class="fontNormal">
        <td align="center" style="padding: 2px"><b><font color="#003399">No</font></b></td>
        <td align="center" style="padding: 2px"><b>
                <font color="#003399">NGO Name</font></b></td>
        <td align="center" style="padding: 2px"><b>
                <font color="#003399">Project Name</font></b></td>
        <td align="center" width="109" style="padding: 2px"><b>
                    <font color="#003399">Start Date</font></b></td>
        <td align="center" width="105" style="padding: 2px"><b>
                <font color="#003399">End Date</font></b></td>
        <td align="center" width="121" style="padding: 2px"><b>
                    <font color="#003399">Status</font></b></td>
    </tr>
    <?php
    $trbgColor = 0;
    
    ?>
    @foreach($ds as $row)
    @if($trbgColor % 2 == 0)
    <tr>
    @else
    <tr class="fontNormal" bgcolor="#EEEEEE">
    @endif
        <td width="4%" align="center" valign="top" style="padding: 2px">{{++$trbgColor}}.</td>
        <td width="14%" align="center" valign="top" style="padding: 2px">
            <span id="printRegion">
															<span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
															</span></td>
        <td width="43%" valign="top" align="left" style="padding: 2px">
<span id="printRegion1">
															<a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
															</span></td>
        <td width="15%" valign="top" align="right" style="padding:2px; ">
<span id="printRegion2">
															<span
                                                                                                    id="printRegion3">{{MyUtility::formatKhDate($row->PDateStart)}}</span></span></td>
        <td width="13%" valign="top" align="right" style="padding:2px; ">
<span id="printRegion4">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span></td>
        <td width="9%" valign="top" align="center" style="padding: 2px">
<span id="printRegion5">
																	{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span></td>
    </tr>
    @endforeach
</table>