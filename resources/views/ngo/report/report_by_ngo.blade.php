@extends('ngo.layout.with_menu')
<?php
use App\Http\Controllers\MyUtility;
$topMenuId = "report";
$leftMenuId = "search_ngo";
?>
@section('content')
    <form id="myform" name="myform">
        <div align="center">
            <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

                <tr>
                    <td height="20" width="20%" valign="top">
                        @include("ngo.layout.left_pane")
                    </td>
                    <td valign="top" width="80%">
                        <div align="center">

                            <table border="0" width="100%" id="table6" class="fontNormal" cellpadding="2"
                                   style="border-collapse: collapse">
                                <tr>
                                    <td align="right">
                                        <a href="#none" onclick="var submitValue = '?printRegion=printRegion'
                                                var w = window.open('/ngo/report/report_core?print=true&NgoStatusId={{$NgoStatusId}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
                                                w.focus()">
                                            <img border="0" src="/images/print.gif" width="18" height="18"
                                                 align="absbottom">
                                            Print
                                        </a>
                                    </td>
                                </tr>
                                <td width="98%">


															<span id="printRegion">

															
@include("ngo.report.search_project.report_by_ngo_form")
															</span>
                                </td>

                            </table>


                            &nbsp;</div>
                    </td>
                </tr>
            </table>


        </div>


															<span id="span_ngo_logo"
                                                                  style="display:none; border-style:solid; border-color:#008000; position:absolute; z-index: 1; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px; background-color:#FFFFFF; left:36; top:348">
<table cellpadding="2">
    <tr>
        <td align="right">
            <a href="#none" onclick="ById('span_ngo_logo').style.display='none'"><b>X</b></a></td>
    </tr>
    <tr>
        <td align="center">
            <a href="#none">
                <img id="img_ngo_logo" src="" border="0" width="200" onclick="window.open(this.src)">
            </a></td>
    </tr>
</table>
</span>

    </form>
@endsection
<script>
    function reportByNgoInit() {
        ById("NgoStatusId").value = '2';
    }
    reportByNgoInit();
</script>