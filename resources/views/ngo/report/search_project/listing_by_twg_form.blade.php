<?php
use App\Http\Controllers\MyUtility;
?>
<span id="printRegion">
														<table border="0" width="100%" id="table2" class="fontNormal" cellpadding="2" style="border-collapse: collapse">
															<tr>
																<td class="fontBig" nowrap width="63%">
																<img border="0" src="/images/listing_of_project_by_twg.jpg" width="274" height="40"></td>
																<td class="fontBig" nowrap align="right" width="7%">
																Project Status:</td>
																<td class="fontBig" width="14%">
																<!-- #include file="include/project_status.asp" -->&nbsp;<select size="1" name="ProjectStatusId" id="ProjectStatusId" class="fontNormal">
                <option value="0" {{MyUtility::getSelected(0,$ProjectStatusName)}}>All</option>
                <option value="1" {{MyUtility::getSelected(1,$ProjectStatusName)}}>On-going</option>
                <option value="2" {{MyUtility::getSelected(2,$ProjectStatusName)}}>Completed</option>
                <option value="3" {{MyUtility::getSelected(3,$ProjectStatusName)}}>Suspended</option>
                <option value="4" {{MyUtility::getSelected(4,$ProjectStatusName)}}>Pipeline</option>
                <option value="5" {{MyUtility::getSelected(5,$ProjectStatusName)}}>(Not Reported)</option>
            </select></td>
																<td class="fontBig" width="12%">
														<span id="printRegion">
																<img border="0" src="/images/search_button.gif" class="cursorHand" onclick="myform.submit()" align="absbottom"></span></td>
															</tr>
															<tr>
																<td width="118%" nowrap colspan="4">
																&nbsp;</td>
															</tr>
															<tr>
																<td width="98%" colspan="4">
																<table border="1" width="100%" id="table3" cellspacing="0" style="border-collapse: collapse" bordercolor="#0099FF" cellpadding="2" class="fontNormal">
																	<tr>
																		<td background="/images/table_bg_light_blue01.JPG" align="center" nowrap>
																		<font color="#0000FF">
																		<b>No</b></font></td>
																		<td background="/images/table_bg_light_blue01.JPG" align="center" nowrap>
																		<font color="#0000FF"><b>
																		Technical 
																		Working 
																		Group</b></font></td>
																		<td background="/images/table_bg_light_blue01.JPG" align="center" width="14%" nowrap>
																		<b>
																		<font color="#0000FF">
																		Number 
																		of 
																		Projects</font></b></td>
																		<td background="/images/table_bg_light_blue01.JPG" align="center" width="14%" nowrap>
																		&nbsp;</td>
																		<?php
																		$id=0;
																		?>
							 													
							 													@foreach($dsTwg as $key => $value)							 										@if($id % 2 == 1)
																	<tr bgcolor="#EEEEEE">
																	@else
																	<tr>
																	@endif
																	
																		<td width="3%" align="center" valign="top">
																		<font color="#0033CC">{{++$id}}.</font></td>
																		<td width="71%" align="left" valign="top" class="fontNormal">
																		<b>
																		<font color="#0033CC">
																		@if(MyUtility::getDictData($key,$countPRNByTwg)>0)
																		<a href="#none" 

																		onclick="
																		
																			var tr = ById('tr{{$id}}')
																			display  = tr.style.display
																			img = ById('img{{$id}}')
																			if (display != '')
																			{ 
																			display =''
																			 img.src = '/images/minus_sign.jpg'
																				var submitValue = '?twg_id={{$key}}'
																				submitValue += '&ProjectStatusId='+ {{$ProjectStatusName}}
																				Ajax_UpdatePanel('/ngo/report/search_project/sub-listing_by_twg',submitValue,'td{{$id}}',true)
																			}else{
																		    display ='none'
																			img.src = '/images/plus_sign.jpg'
																			}
																			 tr.style.display = display
																		">
																		<font color="#0066CC"><img id="img{{$id}}" border="0"  title="Open" src="/images/plus_sign.JPG" width="9" height="9">
																		{{$value}}</font></a>
																		@else
																		<font color="#0066CC"><img id="img{{$id}}" border="0"  title="Open" src="/images/plus_sign.JPG" width="9" height="9">
																		{{$value}}</font>
																		@endif
																		</font></b></td>
																		<td width="14%" valign="top" align="center">
																		<b>{{MyUtility::formatThousand(MyUtility::getDictData($key,$countPRNByTwg))}}</b></td>
																		<td valign="top"  nowrap class="fontNormal" align="center">
																		@if(MyUtility::getDictData($key,$countPRNByTwg)>0)
																			<a href="/ngo/report/search_project/sub-listing_by_twg/detail?twg_id={{$key}}&ProjectStatusId= {{$ProjectStatusName}}" target="_blank">
																			<img title="Preview" border="0" src="/images/Preview.gif" width="15" height="15" align="absbottom"></a>&nbsp;
																			<a href="/ngo/report/search_project/external_sub-listing_by_twg?&twg_id={{$key}}&ProjectStatusId={{$ProjectStatusName}}" target="_blank">
																			<img border="0" src="/images/table.jpg"  align="absbottom" width="14" height="13" title="View in neew window"></a>
																		@endif
																		</td>
																	</tr>
																	
																	<tr id="tr{{$id}}"  style="display:none">
																	<td colspan="4" id="td{{$id}}" align="center">
																	</td>
																	</tr>
																	@endforeach
																</table>
																</td>
															</tr>
															<tr>
																<td width="118%" colspan="4">
																&nbsp;</td>
															</tr>
															<tr>
																<td width="118%" colspan="4">
																&nbsp;</td>
															</tr>
														</table>
														</span>
														