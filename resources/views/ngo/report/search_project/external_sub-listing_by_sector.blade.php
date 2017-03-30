<?php

use App\Http\Controllers\MyUtility;
?>
@extends("ngo.layout.report_detail")

@section("content")
    <table border="0" width="100%" id="table1" cellspacing="1" style="border-collapse: collapse" class="fontNormal">
        <tr>
            <td colspan="2">
															<span id="printRegion">
																<img border="0"
                                                                     src="/images/listing_of_project_by_sector.jpg"
                                                                     width="250" height="40"></span></td>
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
            <td align="right" height="20" width="25%" valign="bottom" class="fontNormal"><font
                        color="#003399">Sector:</font></td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="34%"><font
                        color="#0066CC"><b>{{$SectorName_E}}</b></font></td>
            <td align="right" height="20" valign="bottom" class="fontLarge" width="19%">&nbsp;</td>
            <td align="left" height="20" valign="bottom" class="fontLarge" width="21%">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" height="20" width="25%" class="fontNormal" valign="bottom"><font color="#003399">Sub-Sector:</font>
            </td>
            <td align="left" height="20" class="fontLarge" valign="bottom" width="34%"><font
                        color="#0066CC">{{$SubSectorName_E}}</font></td>
            <td align="right" height="20" class="fontNormal" valign="bottom" width="19%"><font color="#003399">Project
                    Status:</font></td>
            <td align="left" height="20" class="fontLarge" valign="bottom">
			<font color="#0000FF"><b>&nbsp; {{MyUtility::getProjectStatusName($ProjectStatusName)}} 
			</b></font> </td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="20"><span id="">
@include("ngo.report.search_project.sub-listing_by_sector")
</span>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center" height="20">&nbsp;</td>
        </tr>
    </table>
@endsection