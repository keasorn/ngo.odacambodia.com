<?php

use App\Http\Controllers\MyUtility;
?>
<table border="1" width="95%" cellpadding="2" bordercolor="#C0C0C0" style="border-collapse: collapse">
<tr class="fontNormal"><td align="center" style="padding: 2px"><b><font color="#003399">No</font></b></td>
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
		$id=0;
		?>
		
		@if(count($ds)>0)
			@foreach($ds as $row)
			@if($id % 2 ==1)
			<tr class="fontNormal" bgcolor="#EEEEEE">
			@else
			<tr class="fontNormal" bgcolor="">
			@endif
				<td width="4%" align="center" valign="top" style="padding: 2px">{{++$id}}.</td>
				<td width="14%" align="center" valign="top" style="padding: 2px">
					                {{$row->Acronym}}</td>
				<td width="43%" valign="top" align="left" style="padding: 2px">
                                    <a target="_blank"
                                       href="/ngo/report/individual_project_preview?PRN={{$row->PRN}}">
                                        {{$row->PName_E}}</a> </td>
					<td width="15%" valign="top" align="right" style="padding:2px; ">{{MyUtility::formatKhDate($row->PDateStart)}}</td>
				<td width="13%" valign="top" align="right" style="padding:2px; ">{{MyUtility::formatKhDate($row->PDateFinish)}}
                                    &nbsp;</td>
					<td width="9%" valign="top" align="center" style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}
                                    &nbsp;</td>
			</tr>
			@endforeach
		@endif
	</table>
 
