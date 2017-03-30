@extends('ngo.layout.with_menu')
<?php
$topMenuId = "report";
$leftMenuId = "search_province";
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
                        <td align="right">
                            <a href="#none" onclick="var w = window.open('/ngo/report/search_project/listing_by_province?print=true&ProvinceId={{$ProvinceId}}&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
                                <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                                Print
                            </a>
                        </td>
                    </tr>
                    <td width="92%">
															<span id="printRegion">

@include("ngo.report.search_project.listing_by_province_form")
																</span></td>
                </table>
            </td>
        </tr>
    </table>
    </div>
    </form>
@endsection