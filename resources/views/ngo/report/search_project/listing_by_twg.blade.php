@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_by_twg";
?>
<?php
use App\Http\Controllers\MyUtility;
?>
@section('content')
<form id="myform" name="myform">
    <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td valign="top">
                <div align="center">

                    <table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
						<tr>
							<td align="right">
                                <a href="#none" onclick="var submitValue = '?printRegion=printRegion'
																	var w = window.open('/ngo/report/search_project/listing_by_twg?print=true&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()">
                                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom"> 
								Print
                                </a>
                            </td>
						</tr>
						<tr>
							<td valign="top">
														@include("ngo.report.search_project.listing_by_twg_form")</td>
						</tr>
					</table>
&nbsp;</div>
            </td>
        </tr>
    </table>
    </form>
@endsection