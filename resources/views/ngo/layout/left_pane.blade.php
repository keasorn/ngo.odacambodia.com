<?php
use App\Http\Controllers\MyUtility;

if (!isset($topMenuId)) {
	$leftMenuId = "";
}
?>
<table border="0" width="100%" id="table10" cellpadding="3" class="table" style="border-collapse: collapse" cellspacing="3">
	<tr>
		<td align="left"><fieldset style="padding: 5">
		<legend align="left" class="fontNormalBlue">
		<img border="0" src="/images/report.png" width="16" height="16" align="absmiddle"><b> Search Project By</b></legend>
		<br>
		<table border="0" width="100%" id="table14" style="border-collapse: collapse" cellpadding="4">
			<tr class="{!! MyUtility::selectLeftMenu("search_ngo",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/report_core"><span class="">NGO</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_ngo_type",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/report_by_ngo_type?ProjectStatus=1"><span class="8">NGO Type</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_ngo_status",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/report_by_ngo_status"><span class="9">NGO Status</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_project_status",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/listing_by_projectstatus">
				<span class="205">Project Status</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_province",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" valign="top" style="padding-top: 4px; padding-bottom: 4px">c
				<a href="/ngo/report/search_project/listing_by_province?ProjectStatusId=1"><span class="203">Province</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_duration",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal " valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/listing_by_duration"><span class="206">Duration</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_type_ass",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/listing_by_type_of_assistance">
				<span class="204">Type of Assistance</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_project_mou",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/report_by_project_mou"><span class="7">Project's MOU</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_sector",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal " valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/listing_by_sector"><span class="7">Sector/Sub-Sector</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_by_twg",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/search_project/listing_by_twg"><span class="207">Technical Working Group</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr class="{!! MyUtility::selectLeftMenu("search_by_last_update",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal " valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="/ngo/report/listing_by_lastupdate"><span class="208">Last Updated Project</span></a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
		</table><br/></fieldset> </td>
	</tr>
	<tr>
		<td style="padding-top: 4px; padding-bottom: 4px" align="left">
		<fieldset style="padding: 5">
		<legend align="left" class="fontNormalBlue">
		<img border="0" src="/images/report_link.png" width="16" height="16" align="absmiddle"><b> 
				Summary Reports</b></legend><br/>
		<table border="0" width="100%" id="table12" style="border-collapse: collapse" cellpadding="4">
			<tr class="{!! MyUtility::selectLeftMenu("so",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none"
																				onclick="
																					popup('/ngo/report/summary/project_summary_report_board',400,160);
																				">Project Summary Report</a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" onclick="popup('/ngo/report/summary/summary_disb_board','','')">Summary of Disbursement by Project of the year</a><span ><a href="/ngo/own_report/design_own_report"><img src="/images/tick.png"></a></span></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" onclick="popup('/ngo/report/summary_disbursement_by_year_board','400','350')">Summary of Disbursement by Type of Assistance of the year</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" target="_blank">List of Source of Funds By NGO</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a target="_blank" href="#none">List of NGO Projects with Budget, Commitment and Sector</a></td>
			</tr>
			<tr class="210">
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<a  href="#none" ><span class="210">List of Source of Funds <br>By Sector</span></a><font color="#FF0000"><img border="0" src="/images/NEW.gif" width="30" height="15"></font></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" style="padding-top: 4px; padding-bottom: 4px">
				<span class="210"><a target="_blank" href="#none">NGO Source of Funding 
				<br>2014-2018</a></span><font color="#FF0000"><img border="0" src="/images/NEW.gif" width="30" height="15"></font></td>
			</tr>
			<tr class="300">
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" onclick="">Disbursement by Sector and Sub-Sector</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" onclick="popup('/ngo/report/disbursement_by_province_board','','')">Disbursement by Province</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a href="#none" onclick="">Disbursement by Criteria</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a href="" target="_blank">List of NGO Projects by Donor</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a target="_blank" href="#none">Disbursement by NGO 2008 - 2018</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a target="_blank" href="#none">NGO with Own Fund since 1993</a></td>
			</tr>
			<tr>
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">
				<a target="_blank" href="#none">By Sector, NGO with Own Fund since 1993</a></td>
			</tr>
			<tr  class="301">
				<td width="16" align="right" class="fontNormal" valign="middle" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">&nbsp;</td>
				<td class="fontNormal {!! MyUtility::selectLeftMenu("a1",$leftMenuId) !!}" valign="top" dir="ltr" style="padding-top: 4px; padding-bottom: 4px">&nbsp;</td>
			</tr>
		</table><br/></fieldset> </td>
	</tr>
	<tr>
		<td align="left"><fieldset style="padding: 5">
		<legend align="left" class="fontNormalBlue">
		<img border="0" src="/images/report_edit.png" width="16" height="16" align="absmiddle"><b> 
				Others</b></legend><br/>
		<table border="0" width="100%" id="table18" style="border-collapse: collapse" cellpadding="2">
			<tr class="{!! MyUtility::selectLeftMenu("des_own_report",$leftMenuId) !!}">
				<td width="16" align="right" class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<img border="0" src="/images/arrow_gray.gif" width="8" height="9"></td>
				<td class="fontNormal" style="padding-top: 4px; padding-bottom: 4px">
				<span ><a href="/ngo/own_report/design_own_report">
				<font color="#008000">Design Your Own Report</font><img src="/images/tick.png"></a></span></td>
			</tr>
		</table><br/></fieldset> </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>