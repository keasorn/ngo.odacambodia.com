@extends('ngo.layout.with_menu')
<?php
$topMenuId = "report";
$leftMenuId = "search_duration";
?>
@section('content')

    <form id="myform" name="myform">
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
                                <td class="fontBig" nowrap align="right">
                                    <a href="#none" onclick="var w = window.open('/ngo/report/search_project/listing_by_duration?print=true&Duration={{$durationType}}&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
                                        <img border="0" src="/images/print.gif" width="18" height="18"
                                             align="absbottom">
                                        Print
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td width="98%" height="21" valign="top" class="fontBig">
															@include("ngo.report.search_project.listing_by_duration_form")</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </form>
@endsection