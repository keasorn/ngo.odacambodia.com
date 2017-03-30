@extends('ngo.layout.with_menu')
<?php

$topMenuId = "report";
$leftMenuId = "search_ngo_type";
?>
@section('content')
    <form id="myform" name="myform">
        <div align="center">
            <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

                <tr>
                    <td width="20%" valign="top" align="left">
                        @include("ngo.layout.left_pane")
                    </td>
                    <td width="80%" valign="top">
                        <table border="0" width="100%" id="table2" class="fontNormal" cellpadding="2"
                               style="border-collapse: collapse">
                            <tr>
                                <td align="right">
                                    <a href="#none" onclick="
                                            var submitValue = '?printRegion=printRegion'
                                            var w = window.open('/ngo/report/search_project/report_by_ngo_type?print=true&NgoStatusId={{$NgoStatusId}}&ProjectStatus={{$ProjectStatus}}')
                                            w.focus()
                                            ">
                                        <img border="0" src="/images/print.gif" width="18" height="18"
                                             align="absbottom">
                                        Print
                                    </a>
                                </td>
                            </tr>
                            <td width="98%" id="printRegion" height="24">

                                @include("ngo.report.search_project.report_by_ngo_type_form")
                            </td>
                            <tr>
                                <td>
                                    &nbsp;</td>
                            </tr>
                            <tr>
                                <td height="98" valign="top" width="100%">
                                    &nbsp;</td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </form>
@endsection