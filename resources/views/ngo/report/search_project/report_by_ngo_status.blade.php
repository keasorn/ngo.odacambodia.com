@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_ngo_status";
?>

<?php 
use App\Http\Controllers\MyUtility;
        $NgoStatus = array(
        "1" => "Active",
        "3" => "Not Reported",
        "4" => "No Active",
        "2" => "Close"
        );
        ?>
@section('content')
    <div align="center">
    <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td align="left" valign="top" width="80%">

														<table border="0" width="100%" id="table6" class="fontNormal" cellpadding="2" style="border-collapse: collapse">
															<tr>
																<td align="right">
																<a href="#none" onclick="
																	var w = window.open('/ngo/report/search_project/report_by_ngo_status?print=true','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
																<img border="0" src="/images/print.gif" width="18" height="18" align="absbottom"> 
																Print
																</a>
																</td>
															</tr>
															<td width="98%" valign="top">
															
@include("ngo.report.search_project.report_by_ngo_status_form")</td>
																														
														</table>
														
														
														
            </td>
        </tr>
    </table>
</div>
@endsection