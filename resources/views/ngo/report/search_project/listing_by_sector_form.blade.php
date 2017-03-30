<?php
use App\Http\Controllers\MyUtility;
?>


<table border="0" width="100%"
       class="fontNormal"
       cellpadding="2"
       style="border-collapse: collapse">
    <tr>
        <td width="39%" valign="top" rowspan="2">
            <img border="0"
                 src="/images/listing_of_project_by_sector.jpg"
                 width="250" height="40"></td>
        <td align="right" width="41%">
            Sector/Sub-Sector:
        </td>
        <td width="10%" colspan="2">
															<span id="printRegion">
                                                                            <select class="fontNormal"
                                                                                    id="subSectorCode"
                                                                                    name="subSectorCode" size="1">

                                                                                <option value="0">
                                                                                    ALL Sector/Sub-Sectors
                                                                                </option>

                                                                                <?php
                                                                                $tmpSector = clone $dsSector;
                                                                                $tmpSector = $tmpSector->get();
                                                                                ?>
                                                                                @foreach($tmpSector as $Sector)
                                                                                    <option value="{{$Sector->SectorCode}}"
                                                                                            class="BoldBlue" {{MyUtiliTy::getSelected($Sector->SectorCode,$subSectorCode )}}>
                                                                                        {{$Sector->SectorName_E}}
                                                                                    </option>
                                                                                    <?php
                                                                                    $tmpSubSector = clone $dsSubSector;
                                                                                    $tmpSubSector = $tmpSubSector->where("SectorCode", "=", $Sector->SectorCode)->get();
                                                                                    ?>
                                                                                    @foreach($tmpSubSector as $SubSector)
                                                                                        <option value="{{$SubSector->subSectorCode }}" {{MyUtiliTy::getSelected($SubSector->subSectorCode ,$subSectorCode )}}>
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$SubSector->SubSectorName_E}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </select></span></td>
    </tr>
    <tr>
        <td align="right" width="41%">
            Project Status
        </td>
        <td width="9%">
            <select size="1" name="ProjectStatusId" id="ProjectStatusId" class="fontNormal">
                <option value="0" {{MyUtility::getSelected(0,$ProjectStatusName)}}>All</option>
                <option value="1" {{MyUtility::getSelected(1,$ProjectStatusName)}}>On-going</option>
                <option value="2" {{MyUtility::getSelected(2,$ProjectStatusName)}}>Completed</option>
                <option value="3" {{MyUtility::getSelected(3,$ProjectStatusName)}}>Suspended</option>
                <option value="4" {{MyUtility::getSelected(4,$ProjectStatusName)}}>Pipeline</option>
                <option value="5" {{MyUtility::getSelected(5,$ProjectStatusName)}}>(Not Reported)</option>
            </select></td>
        <td width="27%">
																<span id="printRegion">
																<!-- #include file="include/project_status" --></span>
            <img border="0"
                 src="/images/search_button.gif"
                 class="cursorHand"
                 onclick="myform.submit()"
                 align="absbottom"></td>
    </tr>
    <tr>
        <td colspan="4" style="padding: 0" height="0"></td>
    </tr>
    <tr>
        <td colspan="4" style="padding: 0" height="0">

            <table border="0" cellpadding="2"
                   style="border-collapse: collapse"
                   width="100%" bordercolor="#E9EFFE"
                   bordercolordark="#C0C0C0">
                <tr>
                    <td>
															<span id="printRegion0">
															<font color="#FF6600">
                                                                <u>Note</u>: Only
                                                                Sector / Sub-Sector
                                                                reported for 2007 to
                                                                2015</font></span></td>
                </tr>
                <tr>
                    <td>
                        <table border="1" width="100%"
                               id="table8"
                               cellpadding="3"
                               style="border-collapse: collapse"
                               bordercolor="#0066FF"
                               class="fontNormal">
                            <tr>
                                <td bgcolor="#C3DAF9"
                                    align="center"
                                    nowrap>
                                    <font color="#0000FF">
                                        <b>Sector /
                                            Sub-Sector</b></font>
                                </td>
                                <td bgcolor="#C3DAF9"
                                    align="center"
                                    nowrap>
                                    <b>
                                        <font color="#0000FF">Number
                                            of
                                            Projects</font><a
                                                href="#none"
                                                title="(Some Projects has more than ONE Sub-Sector)"
                                                style="text-decoration: none"><font
                                                    color="#FF0000">*</font></a></b>
                                </td>
                                <td bgcolor="#C3DAF9"
                                    align="center"
                                    nowrap>
                                    &nbsp;</td>
                            </tr>

                            @foreach($dsMainSector as $row)
                                @if( ($mainSectorCode==0) || ($row -> MainSectoRID == $mainSectorCode))
                                    <tr>
                                        <td bgcolor="#CCFFCC">
                                            <font color="#008000"><b><img
                                                            border="0"
                                                            src="/images/clearlake7.jpg"
                                                            width="8"
                                                            height="8"> {{$row->MainSector}}
                                                </b></font>
                                        </td>
                                        <td bgcolor="#CCFFCC"
                                            align="right"
                                            style="padding-right: 50px">
                                            &nbsp;</td>
                                        <td bgcolor="#CCFFCC"
                                            align="center"
                                            nowrap>
                                            &nbsp;</td>
                                    </tr>
                                    <?php
                                    $tmpSector = clone $dsSector;
                                    $tmpSector = $tmpSector->where("MainSector", "=", $row->MainSectoRID)->get();
                                    ?>
                                    @foreach($tmpSector as $Sector)
                                        @if(($sectorCode==0) || ($Sector-> SectorCode == $sectorCode))

                                            <tr>
                                                <td bgcolor="#EAF9FF">
                                                                                                            <span id="printRegion2"><font
                                                                                                                        color="#0033CC"><b>
                                                                                                                        &nbsp;
                                                                                                                        <img border="0"
                                                                                                                             src="/images/sqaure_bullet.jpg"
                                                                                                                             width="7"
                                                                                                                             height="7"> {{$Sector->SectorName_E}}
                                                                                                                    </b></font></span>
                                                </td>
                                                <td bgcolor="#EAF9FF"
                                                    align="center">
                                                    <b>{{MyUtility::getDictData($Sector->SectorCode,$countPRNBySector)}}</b></td>
                                                <td align="center"
                                                    nowrap
                                                    bgcolor="#EAF9FF">

                                                    <a href="/ngo/report/search_project/listing_by_sector/detail?sectorCode={{$Sector->SectorCode}}&ProjectStatusName={{$ProjectStatusName}}"
                                                       target="_blank">
                                                        <img border="0"
                                                             src="/images/Preview.gif"
                                                             width="15"
                                                             height="15"
                                                             align="absbottom"></a>&nbsp;
                                                    <a target="_blank"
                                                       href="/ngo/report/search_project/external_listing_by_sector?sector={{$Sector->SectorCode}}&ProjectStatusName={{$ProjectStatusName}}&countPRN={{MyUtility::getDictData($Sector->SectorCode,$countPRNBySector)}}">
                                                         <img title="View in new window"
                                                             border="0"
                                                             src="/images/table.jpg"
                                                             align="absbottom"
                                                             width="14"
                                                             height="13">
                                                     </a>
                                                </td>
                                            </tr>
                                            <?php

                                            $spId = 0;
                                            $tmpSubSector = clone $dsSubSector;
                                            $tmpSubSector = $tmpSubSector->where("SectorCode", "=", $Sector->SectorCode)->get();?>
                                            @foreach($tmpSubSector as $SubSector)
                                                @if(($subSectorCode=="0") || ($SubSector->subSectorCode ==$subSectorCode))
                                                    <tr bgcolor="#FFFFD9">
                                                        <td width="66%" style="padding: 2px">
															<span id="printRegion1">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                @if(MyUtility::getDictData($SubSector->subSectorCode ,$countPRNBySubSector) !=  null)
                                                                    <a href="#none" onclick="
                                                                            var id = '{{$Sector->SectorCode .++$spId}}'
                                                                            var img = ById('img'+ id)
                                                                            if (img.title == 'Close') {
                                                                            display = 'none'
                                                                            img.src = '/images/plus_sign.JPG'
                                                                            img.title = 'Open'
                                                                            ById(id).innerHTML = ''
                                                                            }
                                                                            else
                                                                            {
                                                                            display = ''
                                                                            img.src = '/images/minus_sign.JPG'
                                                                            img.title = 'Close'
                                                                            var submitValue = '?subSectorCode={{$SubSector->subSectorCode }}'
                                                                            submitValue += '&ProjectStatusId={{$subSectorCode }}'
                                                                            Ajax_UpdatePanel('/ngo/report/sub-listing_by_sector',submitValue,id,true)
                                                                            }
                                                                            ById('tr'+id).style.display = display
                                                                            ById(id).style.display = display
                                                                            ">
                                                                        <img border="0"
                                                                             id="img{{$Sector->SectorCode .$spId}}"
                                                                             title="Open" src="/images/plus_sign.JPG"
                                                                             width="9" height="9">
                                                                        {{$SubSector->SubSectorName_E}}
                                                                    </a>
                                                                @else
                                                                    <img border="0"
                                                                         id="img{{$Sector->SectorCode .$spId}}"
                                                                         title="Open" src="/images/plus_sign.JPG"
                                                                         width="9" height="9">
                                                                    {{$SubSector->SubSectorName_E}}
                                                                @endif
                                                                &nbsp;</span></td>

                                                        <td width="12%"
                                                            align="center"
                                                            style="padding:2px; ">
                                                            <?php
                                                            $disbRow = MyUtility::getDictData($SubSector->subSectorCode, $countPRNBySubSector);
                                                            if ($disbRow != null) {
                                                                echo $disbRow;
                                                            }
                                                            ?> </td>

                                                        <td width="7%"
                                                            align="center"
                                                            nowrap style="padding: 2px">

                                                                                                            <span id="printRegion3">
															<span id="printRegion4">@if(MyUtility::getDictData($SubSector->subSectorCode ,$countPRNBySubSector) !=  null) </span>
															</span><a
                                                                    href="/ngo/report/search_project/listing_by_sector/detail?subSectorCode={{$SubSector->subSectorCode}}&ProjectStatusName={{$ProjectStatusName}}"
                                                                    target="_blank">
                                                                <img title="Preview"
                                                                     border="0"
                                                                     src="/images/Preview.gif"
                                                                     width="15"
                                                                     height="15"
                                                                     align="absbottom"></a>&nbsp;
                                                            <a href="/ngo/report/search_project/listing_by_sector?sector={{$Sector->SectorCode}}&subSectorCode={{$SubSector->subSectorCode}}&ProjectStatusName={{$ProjectStatusName}}"
                                                               target="_blank">
                                                                <img title="View in new window"
                                                                     border="0"
                                                                     src="/images/table.jpg"
                                                                     align="absbottom"
                                                                     width="14"
                                                                     height="14"></a>@endif
                                                        </td>
                                                    </tr>
                                                    <tr id="tr{{$Sector->SectorCode .$spId}}"
                                                        style="display:{{session("display")}}">
                                                        <td id="{{$Sector->SectorCode .$spId}}"
                                                            align="center"
                                                            valign="top"
                                                            colspan="3"
                                                            width="90%"
                                                            height="20">&nbsp;</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                @endif
                            @endforeach


                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>