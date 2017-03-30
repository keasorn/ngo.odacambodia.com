<?php

use App\Http\Controllers\MyUtility;
?>
@extends("ngo.layout.report_detail")
@section("content")
    <table border="0" width="100%" id="table1" cellspacing="1" style="border-collapse: collapse" class="fontNormal">
        <tr>
            <td colspan="2">
                <img border="0" src="/images/listing_of_project_by_twg.jpg" width="274" height="40"></td>
            <td align="right" colspan="2">

                <a href="#none" onclick="window.print()">
                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                    Print
                </a>
                <a href="#none" onclick="window.close()">
                    <img border="0" src="/images/close.jpg" width="18" height="18">
                    Close
                </a>
            </td>
        </tr>
        <tr>
            <td align="right" height="20" width="25%" valign="bottom" class="fontNormal">
                &nbsp;</td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="47%">&nbsp;</td>
            <td align="right" height="20" class="fontNormal" valign="bottom" width="12%">&nbsp;</td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="14%">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" height="20" width="25%" valign="bottom" class="fontNormal">
                <font color="#003399">Technical Working Group:</font></td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="47%"><font
                        color="#0066CC"><b>{{$Twg}}</b></font></td>
            <td align="right" height="20" class="fontNormal" valign="bottom" width="12%"><font color="#003399">Project
                    Status:</font></td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="14%"><b><font color="#0066CC">

                    </font></b>&nbsp;<font color="#0000FF"><b>
                        &nbsp; {{MyUtility::getProjectStatusName($ProjectStatusName)}}
                    </b></font></td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="20"><span id="<%=spanId%>">
					@include("ngo.report.search_project.sub-listing_by_twg")
</span>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="20">&nbsp;</td>
        </tr>
    </table>
@endsection