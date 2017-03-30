@extends('ngo.layout.with_menu')
<?php
use App\Http\Controllers\MyUtility;
$topMenuId = "report";
$leftMenuId = "search_project_status";
?>
@section('content')
    <div align="center">
        <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

            <tr>
                <td height="20" width="20%" valign="top">
                    @include("ngo.layout.left_pane")
                </td>
                <td valign="top">
                    <table border="0" width="100%" id="table2" class="fontNormal" cellpadding="2"
                           style="border-collapse: collapse">
                        <tr>
                            <td colspan="3" align="right">
                                <a href="#none" onclick="var w = window.open('/ngo/report/search_project/listing_by_projectstatus?print=true','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
                                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                                    Print
                                </a>
                            </td>
                        </tr>
                        <td width="98%" colspan="3">
                            
@include("ngo.report.search_project.listing_by_project_status_form")
                        </td>
                        <tr>
                            <td class="fontBig" width="63%" height="23">
                                &nbsp;</td>
                            <td class="fontBig" align="right" width="19%" height="23">
                                &nbsp;</td>
                            <td class="fontBig" width="16%" height="23">
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td width="118%" colspan="3">
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td width="98%" colspan="3">

                                &nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endsection

