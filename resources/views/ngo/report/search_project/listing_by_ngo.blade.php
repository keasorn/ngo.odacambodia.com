@extends('ngo.layout.with_menu')
<?php
use App\Http\Controllers\ngo\CoreDetailController;
$core = new CoreDetailController();
use App\Http\Controllers\MyUtility;
$a = CoreDetailController::getCoreDetailDictionary();

$topMenuId = "report";
$leftMenuId = "";
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
                            <td class="fontBig" align="right">
                                <a href="#none" onclick="var submitValue = '?printRegion=printRegion'
																	var w = window.open('/ngo/report/listing_by_ngo?print=true&RID={{$RID}}&ProjectStatusId={{$ProjectStatusId}}','','status=no,menubar=yes,scrollbars=yes,resizable=yes')
																	w.focus()">
                                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom"> 
								Print
                                </a>
                            </td>
                        </tr>
                        <td nowrap width="98%">                    @include("ngo.report.search_project.list_by_ngo_form")</td>
                        <tr>
                            <td width="118%">
                                <button type="button" onclick="window.open('/own_report/detail?RID={{$RID}}')">
                                <img border=" 0
                                " src="/images/Preview.gif" width="15" height="15" align="absbottom"> Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td width="118%">
                                &nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    	</div>
    </form>
@endsection