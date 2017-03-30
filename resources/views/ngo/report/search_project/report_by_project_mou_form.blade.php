<?php
use App\Http\Controllers\MyUtility;
?>
<table border="0" width="100%" id="table5" class="fontNormal" cellpadding="2" style="border-collapse: collapse">
															<tr>
																<td class="fontBig" nowrap width="46%">
																<img border="0" src="/images/number_of_project_by_projectmou.jpg" width="257" height="40"></td>
																<td class="fontBig" nowrap align="right" width="24%">
																Project Status:</td>
																<td class="fontBig" width="13%">
																<!-- #include file="include/project_status.asp" -->
																<span id="printRegion0">
																<select size="1" name="ProjectStatusId" id="ProjectStatusId" class="fontNormal">
                <option value="0" {{MyUtility::getSelected(0,$ProjectStatusName)}}>
				All</option>
                <option value="1" {{MyUtility::getSelected(1,$ProjectStatusName)}}>
				On-going</option>
                <option value="2" {{MyUtility::getSelected(2,$ProjectStatusName)}}>
				Completed</option>
                <option value="3" {{MyUtility::getSelected(3,$ProjectStatusName)}}>
				Suspended</option>
                <option value="4" {{MyUtility::getSelected(4,$ProjectStatusName)}}>
				Pipeline</option>
                <option value="5" {{MyUtility::getSelected(5,$ProjectStatusName)}}>
				(Not Reported)</option>
            </select></span></td>
																<td class="fontBig" width="16%">
																<span id="printRegion"><img border="0" src="/images/search_button.gif" class="cursorHand" onclick="myform.submit()" align="absbottom"></span></td>
															</tr>
															<tr>
																<td width="118%" nowrap colspan="4">
																&nbsp;</td>
															</tr>
															<tr>
																<td width="98%" colspan="4">
																<table border="1" width="100%" id="table6" style="border-collapse: collapse" bordercolor="#0099FF" class="fontNormal" cellpadding="2">
																	<tr>
																		<td align="center" nowrap height="18" width="4%" style="padding: 2px">
																		<b>
																		<font color="#0000FF">
																		No</font></b></td>
																		<td align="center" nowrap colspan="2" width="70" height="18" style="padding: 2px">
																		<b>
																		<font color="#0000FF">
																		Ministry</font></b></td>
																		<td align="center" nowrap height="18" width="7%" style="padding: 2px">
																		<font color="#0000FF">
																		<b>NGO</b></font></td>
																		<td align="center" nowrap height="18" width="43%" style="padding: 2px">
																		<font color="#0000FF">
																		<b>Project</b></font></td>
																		<td align="center" nowrap height="18" width="12%" style="padding: 2px">
																		<font color="#0000FF">
																		<b>Start 
																		Date</b></font></td>
																		<td align="center" nowrap height="18" width="11%" style="padding: 2px">
																		<font color="#0000FF"><b>Completion Date</b></font></td>
																		<td align="center" nowrap height="18" width="11%" style="padding: 2px">
																		<font color="#0000FF">
																		<b>Project Status</b></font></td>
																	</tr>	
																	<?php
																		$NumberOfMin=0;	
																		
																	$dscount=clone $ds;																$tmpCount=clone $ds;
																	$allProjec4Count=$dscount->count("PRN");
																	?>
																	@foreach($minds as $min)
																	<?php
																	$tmpCount=clone $ds;
																	$tmpCount=$tmpCount->where("MinCode","=",$min->Min_ID)->count("PRN");
																	?>
																	@if($tmpCount>0)
																	<tr bgcolor="">
																		<td align="center" bgcolor="#E8E8FF" nowrap width="4%" style="padding: 2px">
																		<font color="#000080">
																		{{++$NumberOfMin}}.</font></td>
																		<td align="left" bgcolor="#E8E8FF" colspan="4" style="padding: 2px">
																		<b>
																		<a href="#none" onclick="
                                       var n = '{{$tmpCount}}'
                                       var display
                                       if (this.title == 'Close') {
                                       display = 'none'
                                       ById('img{{$min->Min_ID}}').src = '/images/plus_sign.JPG'
                                       this.title = 'Open'
                                       }
                                       else
                                       {
                                       display = ''
                                       ById('img{{$min->Min_ID}}').src = '/images/minus_sign.JPG'
                                       this.title = 'Close'
                                       }

                                       for (var i=0; i<n ; i++)
                                       {
                                       ById('tr{{$min->Min_ID}}'+ i).style.display = display
                                       }"> 
																		<img border="0" id="img{{$min->Min_ID}}" title="Open" src="/images/plus_sign.JPG" width="9" height="9">
																		{{$min->Min_Name_E}}</a></b>
																		</td>
																		<td align="center" bgcolor="#E8E8FF" colspan="3" valign="middle" style="padding: 2px">																		<font color="#0000FF">
																		{{$tmpCount}} 
																		Projects</font></td>
																	</tr>	
																	<?php
																	$tmp=clone $ds;
																	$tmp= $tmp->where("MinCode","=",$min->Min_ID)->get();
																	$rowNum=0;
																	 ?>
																	@foreach($tmp as $row)
																													
																	<tr  id="tr{{$min->Min_ID .$rowNum}}" style="display:none">
																		<td align="center" width="4%" style="padding: 2px">
																		&nbsp;</td>
																		<td align="center" nowrap width="3%" style="padding: 2px">
																		{{++$rowNum}}</td>
																		<td width="0%" align="center" nowrap colspan="2" style="padding: 2px">
																<span id="printRegion1">
																		{{$row->Acronym}}</span></td>
																		<td align="left" width="43%" style="padding: 2px" >
																<span id="printRegion2">
																		<a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </span>
																		</td>
																		<td align="center" width="12%" style="padding: 2px" >
																<span id="printRegion3">
																		<span id="printRegion4">
																		<span
                                                                                                    id="printRegion5">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span></span></td>
																		<td align="center" width="11%" style="padding: 2px">
																<span id="printRegion6">
																		<span id="printRegion7">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span></span></td>
																		<td align="center" nowrap width="11%" style="padding: 2px">
																<span id="printRegion8">
																		<span id="printRegion9">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span></span></td>
																	</tr>
																	@endforeach
																	@endif
																	
@endforeach																										
																	<tr bgcolor="<%=trbgColor%>">
																		<td align="center" colspan="5" bgcolor="#D2D9FF" style="padding: 2px">
																		<font color="#0000FF">
																		<b>Total 
																		Number 
																		of 
																		Projects</b></font></td>
																		<td align="center" bgcolor="#D2D9FF" style="padding:2px; " width="34%" colspan="3">
																		<font color="#0000FF">
																		{{$allProjec4Count}} 
																		projects</font></td>
																	</tr>
																</table>
																</td>
															</tr>
															</table>
																