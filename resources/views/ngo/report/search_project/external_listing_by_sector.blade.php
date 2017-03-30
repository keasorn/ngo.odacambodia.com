<?php

use App\Http\Controllers\MyUtility;
?>
@extends("ngo.layout.report_detail")

@section("content")
    <table border="0" width="750" id="table1" cellspacing="1" style="border-collapse: collapse" class="fontNormal">
        <tr>
            <td colspan="2">
															<span id="printRegion">
																<img border="0"
                                                                     src="/images/listing_of_project_by_sector.jpg"
                                                                     width="250" height="40"></span></td>
        </tr>
        <tr>
            <td align="right" height="20" width="26%" valign="bottom" class="fontNormal">&nbsp;</td>
            <td align="right" height="20" valign="bottom">

                <a href="#none" onclick="window.print()">
                    <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                    Print
                </a>
                <a href="#none" onclick="window.close()">
                    <img border="0" src="/images/close.jpg" width="18" height="18">
                    Close
                </a></td>
        </tr>
        <tr>
            <td align="right" height="20" width="26%" valign="bottom" class="fontNormal">
                <b><font color="#000080">Sector:</font></b></td>
            <td align="left" height="20" valign="bottom" class="fontLarge">
                <font
                        color="#0066CC"><b>{{$SectorName_E}}</b></font></td>
        </tr>
        <tr>
            <td align="right" height="20" width="26%" class="fontNormal" valign="bottom">
                <b><font color="#000080">Project Status:</font></b></td>
            <td align="left" height="20" class="fontNormal" valign="bottom">
			<font color="#0000FF"><b>&nbsp;{{MyUtility::getProjectStatusName($ProjectStatusName)}} 
			</b></font> </td>
        </tr>

        <tr>
            <td align="right" height="20"><font color="#000080"><b>
                        Number of Projects:</b></font></td>
            <td align="left" height="20"><font color="#0066CC"><b></b></font>
			<b>
			<font color="#0000FF">{{$countPRN}}</font></b><a
                        href="#none" title="(Some Projects has more than ONE Sub-Sector)" style="text-decoration: none"><font
                            color="#FF0000">*</font></a></td>
        </tr>
        <tr>
            <td colspan="2" align="center" height="20">


<table border="0" cellpadding="2" style="border-collapse: collapse" width="100%" bordercolor="#E9EFFE"
       bordercolordark="#C0C0C0" class="fontNormal">
    <tr>
        <td>
				<span id="printRegion">
				<font color="#FF6600"><u>Note</u>: Only Sector / Sub-Sector reported for 2007 to 2015</font>
				</span></td>
    </tr>
    <tr>
        <td>
            <table class="fontNormal" border="1" cellpadding="2" style="border-collapse: collapse" width="100%"
                   bordercolor="#C0C0C0" bordercolordark="#C0C0C0">
                <tr>
                    <td bgcolor="#ECE9D8" height="25" align="center" style="padding: 2px">
					<b><font color="#0066CC">No</font></b></td>
                    <td bgcolor="#ECE9D8" height="25" align="left" style="padding: 2px">
					<b><font color="#0066CC">Sub-Sector</font></b></td>
                    <td bgcolor="#ECE9D8" height="25" align="center" style="padding: 2px">
					<b><font color="#0066CC">NGO Name</font></b></td>
                    <td bgcolor="#ECE9D8" height="25" align="center" style="padding: 2px">
					<b><font color="#0066CC">Project Name</font></b></td>
                    <td bgcolor="#ECE9D8" height="25" align="center" style="padding: 2px">
					<b><font color="#0066CC">Start Date</font></b></td>
                    <td bgcolor="#ECE9D8" height="25" align="center" style="padding: 2px">
					<b><font color="#0066CC">End Date</font></b></td>
                </tr>
                <?php
                $id=0;
                ?>
               @foreach($dsSubsector as $subSector)
               <?php
					$tmpDs = clone $ds;
					$tmpCountPRN = clone $ds;
					$tmpCountPRN = $tmpCountPRN ->where("SubSectorName_E", $subSector->subSectorCode)->count();
					$tmpDs = $tmpDs->where("SubSectorName_E", $subSector->subSectorCode)->get();
					$No=0;
				?>
                <tr>
                    <td align="center" bgcolor="#FFFFCC" height="25" style="padding: 2px"><font color="#333333"><b>{{++$id}}.</b></font></td>
                    <td bgcolor="#FFFFCC" colspan="3" height="25" style="padding: 2px" align="left"><font
                                color="#333333"><b>{{$subSector->SubSectorName_E}}</b></font></td>
                    <td colspan="2" bgcolor="#FFFFCC" align="right" height="25" style="padding: 2px">


                        <b> {{MyUtility::n2z(MyUtility::formatThousand($tmpCountPRN))}} Projects</b></td>
                </tr>
				
           @foreach($tmpDs as $row)

				@if($No % 2 == 1)
                <tr bgcolor="#EEE">
                @else
                <tr>
                @endif
                
                    <td align="center" style="padding: 2px">{{++$No}}</td>
                    <td align="left" style="padding: 2px">
                                    {{$row->SubSectorName}}</td>
                    <td align="center" style="padding: 2px">{{$row->Acronym}}</td>
                    <td style="padding: 2px">
                                    <a target="_blank"
                                       href="/ngo/report/individual_project_preview?PRN={{$row->PRN}}">
                                        {{$row->PName_E}}</a> </td>
                    <td align="center" style="padding: 2px">{{MyUtility::formatKhDate($row->PDateStart)}}</td>
                    <td align="center" style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </td>
    </tr>
</table>
</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" height="20">&nbsp;</td>
        </tr>
    </table>
@endsection