@extends('ngo.layout.with_menu')
<?php
$topMenuId = "report";
$leftMenuId = "search_sector";
?>
<?php

        use App\Http\Controllers\MyUtility;
        ?>
@section('content')
<form id="myform" id="myform">
    <div align="center">
    <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td valign="top" align="left">
                <div align="center">

                    <table border="0" width="100%" id="table6" class="fontNormal" cellpadding="2"
                           style="border-collapse: collapse">
                        <tr>
                            <td align="right">
                                &nbsp;</td>
                            <td align="right">
                                <a href="#none" onclick="
																	var submitValue = '?printRegion=printRegion'
																	var w = window.open('/ngo/report/search_project/listing_by_sector?print=true&subSectorCode={{$subSectorCode}}&ProjectStatusId={{$ProjectStatusName}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()						
	 															">
                                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                                    Print
                                </a>
                            </td>
                        </tr>
                        <td width="98%" colspan="2">
															<span id="printRegion">
															
@include("ngo.report.search_project.listing_by_sector_form")
															</span></td>

                    </table>


                    &nbsp;</div>
            </td>
        </tr>
    </table>
    </div>
    </form>
@endsection