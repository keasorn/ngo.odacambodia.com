@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_type_ass";
?>
<?php
use App\Http\Controllers\MyUtility;
?>

@section('content')
<form id="myform" id="myform">
    <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td valign="top" align="left">
                <div align="center">

														<table border="0" width="100%" id="table2" class="fontNormal" cellpadding="2" style="border-collapse: collapse">
															<tr>
																<td align="right">
																<a href="#none" onclick="
																	var w = window.open('/ngo/report/search_project/listing_by_type_of_assistance?print=true&TypeOfAssistance={{$TypeOfAssistance}}&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
																<img border="0" src="/images/print.gif" width="18" height="18" align="absbottom"> 
																Print
																</a>
																</td>
															</tr>
															<tr>
																<td width="98%">
																
        @include("ngo.report.search_project.listing_by_type_of_assistance_form")</td>
															</tr>
															<tr>
																<td class="fontBig" nowrap width="98%">
																&nbsp;</td>
															</tr>
															</table>
														&nbsp;</div>
            </td>
        </tr>
    </table>
    </form>
@endsection