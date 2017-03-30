<?php
use App\Http\Controllers\MyUtility;
?>
<table width="100%" border="1" cellpadding="3" cellspacing="1" bordercolor="#CCCCCC" style="border-collapse:collapse">
  <tr align="center" bgcolor="#FFFFCC">
    <td width="7%" style="padding: 2px">
	<span style="color: #0033FF; font-weight:700">No</span></td>
    <td width="41%" style="padding: 2px">
	<span style="color: #0033FF; font-weight:700">Project Name</span></td>
    <td width="18%" style="padding: 2px">
	<span style="color: #0033FF; font-weight:700">Start Date</span></td>
    <td width="18%" style="padding: 2px">
	<span style="color: #0033FF; font-weight:700">Completion Date</span></td>
    <td width="16%" style="padding: 2px">
	<span style="color: #0033FF; font-weight:700">Last Updated</span></td>
  </tr>
  <?php
  $id=0;
  ?>
  
 @foreach($ds as $row)
  <tr bgcolor="#FFFFFF">
    <td align="center" style="padding: 2px">{{++$id}}</td>
    <td style="padding: 2px">
<span id="printRegion">
															<a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </span></td>
    <td align="center" style="padding: 2px">
<span id="printRegion2">
															<span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span></span></td>
    <td align="center" style="padding: 2px">
<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span></td>
    <td align="center" style="padding: 2px">
<span id="printRegion4">
                                                                                            {{MyUtility::formatKhDate($row->DateQCompleted)}}</span></td>
  </tr> 
  @endforeach
</table>
