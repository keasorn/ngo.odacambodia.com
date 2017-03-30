@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_project_mou";
?>
<?php
use App\Http\Controllers\MyUtility;
?>
	
@section('content')
<form id="myform" name="myform">
    <div align="center">
    <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td align="left" valign="top">
                <div align="left">

														<table border="0" width="100%" id="table4" style="border-collapse: collapse">
															<tr>
																<td class="fontNormal" align="right"><a href="#none" onclick="
																	var w = window.open('/ngo/report/search_project/report_by_project_mou?print=true&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
																<img border="0" src="/images/print.gif" width="18" height="18" align="absbottom"> 
																Print
																</a></td>
															</tr>
															<tr>
																<td id="printRegion">
														@include("ngo.report.search_project.report_by_project_mou_form")</td>
															</tr>
														</table>
														&nbsp;</div>
            </td>
        </tr>
    </table>
</div>
</form>
@endsection