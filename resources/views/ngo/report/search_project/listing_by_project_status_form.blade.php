<?php

        use App\Http\Controllers\MyUtility;
        ?>
<table border="0" width="100%" id="table4" cellpadding="2">
    <tr>
        <td colspan="2" class="fontBig">
            <img border="0" src="/images/listing_of_project_by_projectstatus.jpg" width="250"
                 height="40"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <td colspan="2">
																<span id="printRegion">																					
																<table border="1" width="100%" id="table5"
                                                                       style="border-collapse: collapse"
                                                                       bordercolor="#0099FF" class="fontNormal"
                                                                       cellpadding="2">
                                                                    <tr>
                                                                        <td align="center" nowrap
                                                                            width="5%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>No</b></font></td>
                                                                        <td align="center" nowrap colspan="2"
                                                                            width="5%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>Project
                                                                                    Status</b></font></td>
                                                                        <td align="center" nowrap
                                                                            width="5%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>NGO</b></font></td>
                                                                        <td align="center" nowrap
                                                                            width="39%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>
                                                                                    Project
                                                                                    Name</b></font></td>
                                                                        <td align="center" nowrap
                                                                            width="16%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>Start
                                                                                    Date</b></font></td>
                                                                        <td align="center" nowrap
                                                                            width="14%" style="padding: 2px">
                                                                            <font color="#0000FF">
                                                                                <b>Completion
                                                                                    Date</b></font></td>
                                                                    </tr>
                                                                    <?php
                                                                    $ds = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 1)->orderBy("Acronym")->get();
                                                                    $countPRNOngoin = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 1)->count("PRN");
                                                                    $Id = 0;
                                                                    ?>

                                                                    <tr>
                                                                        <td align="center" valign="top" nowrap
                                                                            bgcolor="#E8E8FF" width="5%"
                                                                            style="padding: 2px">
                                                                            <b>
                                                                                1.</b></td>
                                                                        <td align="left" valign="top" colspan="4"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            <a href="#none" title="Open" onclick="
                                                                                    var n = '{{$countPRNOngoin}}'
                                                                                    var display
                                                                                    if (this.title == 'Close') {
                                                                                    display = 'none'
                                                                                    ById('imgOngoing').src = '/images/plus_sign.JPG'
                                                                                    this.title = 'Open'
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    display = ''
                                                                                    ById('imgOngoing').src = '/images/minus_sign.JPG'
                                                                                    this.title = 'Close'
                                                                                    }

                                                                                    for (var i=1; i<=n ; i++)
                                                                                    {
                                                                                    ById('Ongoing'+ i).style.display = display
                                                                                    }

                                                                                    ">
                                                                                <img border="0" id="imgOngoing"
                                                                                     title="Open"
                                                                                     src="/images/plus_sign.JPG"
                                                                                     width="9" height="9">
                                                                                <b>On-going</b></a></td>
                                                                        <td align="right" valign="top" bgcolor="#E8E8FF"
                                                                            style="padding:2px; ">
                                                                            <b>
                                                                                <font color="#000080">
                                                                                    {{MyUtility::formatThousand($countPRNOngoin)}}
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td align="center" valign="top"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            @if($countPRNOngoin>0)
                                                                                <a target="_blank"
                                                                                   href="file:///H:/google%20drive/cdc.khmer.biz/httpdocs/ngo/report/project_preview_by_where"
                                                                                   onclick="
																		 	this.href = '/own_report/detail_by_status?ProjectStatusName=1'
																		 "><img border="0" src="/images/Preview.gif"
                                                                                width="15" height="15"></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>

                                                                    @foreach($ds as $row)
                                                                        <tr id="Ongoing{{++$Id}}" style="display:none">
                                                                            <td align="right" valign="top" nowrap
                                                                                colspan="2" width="0"
                                                                                style="padding: 2px">
                                                                                {{$Id}}.
                                                                            </td>
                                                                            <td align="center" valign="top" colspan="2"
                                                                                style="padding: 2px">
                                                                                {{$row->Acronym}}</td>
                                                                            <td valign="top" align="left" width="39%"
                                                                                style="padding: 2px">
                                                                                <a href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                   target="_blank">
                                                                                    {{$row->PName_E}}</a></td>
                                                                            <td valign="top" align="center" width="16%"
                                                                                style="padding: 2px">
                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                                                            <td valign="top"
                                                                                align="center"
                                                                                style="padding: 2px">{{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <?php
                                                                    $ds = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 2)->orderBy("Acronym")->get();
                                                                    $countPRNOcompleted = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 2)->count("PRN");
                                                                    $Id = 0;
                                                                    ?>

                                                                    <tr>
                                                                        <td align="center" valign="top" nowrap
                                                                            bgcolor="#E8E8FF" width="5%"
                                                                            style="padding: 2px">
                                                                            <b>

                                                                                2.</b></td>
                                                                        <td align="left" valign="top" colspan="4"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            <a href="#none" title="Open" onclick="
                                                                                    var n = '{{$countPRNOcompleted}}'
                                                                                    var display
                                                                                    if (this.title == 'Close') {
                                                                                    display = 'none'
                                                                                    ById('imgCompleted').src = '/images/plus_sign.JPG'
                                                                                    this.title = 'Open'
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    display = ''
                                                                                    ById('imgCompleted').src = '/images/minus_sign.JPG'
                                                                                    this.title = 'Close'
                                                                                    }

                                                                                    for (var i=1; i<=n ; i++)
                                                                                    {
                                                                                    ById('Completed'+ i).style.display = display
                                                                                    }

                                                                                    ">
                                                                                <img border="0" id="imgCompleted"
                                                                                     title="Open"
                                                                                     src="/images/plus_sign.JPG"
                                                                                     width="9" height="9">
                                                                                <b>Completed</b></a></td>
                                                                        <td align="right" valign="top" bgcolor="#E8E8FF"
                                                                            style="padding:2px; ">
                                                                            <b>
                                                                                <font color="#000080">
                                                                                    {{MyUtility::formatThousand($countPRNOcompleted)}}
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td align="center" valign="top"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            @if($countPRNOcompleted>0)
                                                                                <a target="_blank"
                                                                                   href="file:///H:/google%20drive/cdc.khmer.biz/httpdocs/ngo/report/project_preview_by_where"
                                                                                   onclick="
																		 	this.href = '/own_report/detail_by_status?ProjectStatusName=2'																		 ">
                                                                                    <img border="0"
                                                                                         src="/images/Preview.gif"
                                                                                         width="15" height="15"></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>


                                                                    @foreach($ds as $row)
                                                                        <tr id="Completed{{++$Id}}"
                                                                            style="display:none">
                                                                            <td align="right" valign="top" nowrap
                                                                                colspan="2" width="0"
                                                                                style="padding: 2px">
                                                                                {{$Id}}.
                                                                            </td>
                                                                            <td align="center" valign="top" colspan="2"
                                                                                style="padding: 2px">
                                                                                {{$row->Acronym}}</td>
                                                                            <td valign="top" align="left" width="39%"
                                                                                style="padding: 2px">
                                                                                <a href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                   target="_blank">
                                                                                    {{$row->PName_E}}</a></td>
                                                                            <td valign="top" align="center" width="16%"
                                                                                style="padding: 2px">
                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                                                            <td valign="top"
                                                                                align="center"
                                                                                style="padding: 2px">{{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                        </tr>
                                                                    @endforeach


                                                                    <?php
                                                                    $ds = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 3)->orderBy("Acronym")->get();
                                                                    $countPRNSubpended = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 3)->count("PRN");
                                                                    $Id = 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="center" valign="top" nowrap width="0"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            <b>3.</b></td>
                                                                        <td align="left" valign="top" nowrap colspan="4"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            <a href="#none" title="Open" onclick="
                                                                                    var n = '{{$countPRNSubpended}}'
                                                                                    var display
                                                                                    if (this.title == 'Close') {
                                                                                    display = 'none'
                                                                                    ById('imgSuspended').src = '/images/plus_sign.JPG'
                                                                                    this.title = 'Open'
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    display = ''
                                                                                    ById('imgSuspended').src = '/images/minus_sign.JPG'
                                                                                    this.title = 'Close'
                                                                                    }

                                                                                    for (var i=1; i<=n ; i++)
                                                                                    {
                                                                                    ById('Suspended'+ i).style.display = display
                                                                                    }

                                                                                    ">
                                                                                <img border="0" id="imgSuspended"
                                                                                     title="Open"
                                                                                     src="/images/plus_sign.JPG"
                                                                                     width="9" height="9">
                                                                                <b>Suspended</b></a></td>
                                                                        <td align="right" valign="top" bgcolor="#E8E8FF"
                                                                            style="padding:2px; ">
                                                                            <b>
                                                                                <font color="#000080">
                                                                                    {{MyUtility::formatThousand($countPRNSubpended)}}
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td valign="top" align="center"
                                                                            bgcolor="#E8E8FF" style="padding: 2px">
                                                                            @if ($countPRNSubpended>0)
                                                                                <a target="_blank"
                                                                                   href="file:///H:/google%20drive/cdc.khmer.biz/httpdocs/ngo/report/project_preview_by_where"
                                                                                   onclick="																		 	this.href = '/own_report/detail_by_status?ProjectStatusName=3'
																		 "><img border="0" src="/images/Preview.gif"
                                                                                width="15" height="15"></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>


                                                                    @foreach($ds as $row)
                                                                        <tr id="suspended{{++$Id}}"
                                                                            style="display:none">
                                                                            <td align="right" valign="top" nowrap
                                                                                colspan="2" width="0"
                                                                                style="padding: 2px">
                                                                                {{$Id}}.
                                                                            </td>
                                                                            <td align="center" valign="top" colspan="2"
                                                                                style="padding: 2px">
                                                                                {{$row->Acronym}}</td>
                                                                            <td valign="top" align="left" width="39%"
                                                                                style="padding: 2px">
                                                                                <a href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                   target="_blank">
                                                                                    {{$row->PName_E}}</a></td>
                                                                            <td valign="top" align="center" width="16%"
                                                                                style="padding: 2px">
                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                                                            <td valign="top"
                                                                                align="center"
                                                                                style="padding: 2px">{{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                        </tr>
                                                                    @endforeach



                                                                    <?php
                                                                    $ds = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 4)->orderBy("Acronym")->get();
                                                                    $countPRNPipeline = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 4)->count("PRN");
                                                                    $Id = 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="center" valign="top" nowrap width="0"
                                                                            bgcolor="#E8E8FF">
                                                                            <b>4.</b></td>
                                                                        <td align="left" valign="top" nowrap colspan="4"
                                                                            bgcolor="#E8E8FF">
                                                                            <a href="#none" title="Open" onclick="
                                                                                    var n = '{{$countPRNPipeline}}'
                                                                                    var display
                                                                                    if (this.title == 'Close') {
                                                                                    display = 'none'
                                                                                    ById('imgPipeline').src = '/images/plus_sign.JPG'
                                                                                    this.title = 'Open'
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    display = ''
                                                                                    ById('imgPipeline').src = '/images/minus_sign.JPG'
                                                                                    this.title = 'Close'
                                                                                    }

                                                                                    for (var i=1; i<=n ; i++)
                                                                                    {
                                                                                    ById('Pipeline'+ i).style.display = display
                                                                                    }

                                                                                    ">
                                                                                <img border="0" id="imgPipeline"
                                                                                     title="Open"
                                                                                     src="/images/plus_sign.JPG"
                                                                                     width="9" height="9"> <b>
                                                                                    Pipeline</b></a></td>
                                                                        <td align="right" valign="top" bgcolor="#E8E8FF"
                                                                            style="padding-right: 15px">
                                                                            <b>
                                                                                <font color="#000080">
                                                                                    {{MyUtility::formatThousand($countPRNPipeline)}}
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td valign="top" align="center"
                                                                            bgcolor="#E8E8FF">
                                                                            @if($countPRNPipeline>0)
                                                                                <a target="_blank"
                                                                                   href="file:///H:/google%20drive/cdc.khmer.biz/httpdocs/ngo/report/project_preview_by_where"
                                                                                   onclick="																		 	this.href = '/own_report/detail_by_status?ProjectStatusName=4'

																		 "><img border="0" src="/images/Preview.gif"
                                                                                width="15" height="15"></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>


                                                                    @foreach($ds as $row)
                                                                        <tr id="Pipeline{{++$Id}}" style="display:none">
                                                                            <td align="right" valign="top" nowrap
                                                                                colspan="2" width="0">
                                                                                {{$Id}}.
                                                                            </td>
                                                                            <td align="center" valign="top" colspan="2">
                                                                                {{$row->Acronym}}</td>
                                                                            <td valign="top" align="left" width="39%">
                                                                                <a href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                   target="_blank">
                                                                                    {{$row->PName_E}}</a></td>
                                                                            <td valign="top" align="center" width="16%">
                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                                                            <td valign="top"
                                                                                align="center">{{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                        </tr>
                                                                    @endforeach



                                                                    <?php
                                                                    $ds = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 5)->orderBy("Acronym")->get();
                                                                    $countPRNNotreported = DB::table("v_ngo_listing_by_project_status")->where("ProjectStatusName", "=", 5)->count("PRN");
                                                                    $Id = 0;
                                                                    ?>
                                                                    <tr>
                                                                        <td align="center" valign="top" nowrap width="0"
                                                                            bgcolor="#E8E8FF">
                                                                            <b>5.</b></td>
                                                                        <td align="left" valign="top" nowrap colspan="4"
                                                                            bgcolor="#E8E8FF">
                                                                            <a href="#none" title="Open" onclick="
                                                                                    var n = '{{$countPRNNotreported}}'
                                                                                    var display
                                                                                    if (this.title == 'Close') {
                                                                                    display = 'none'
                                                                                    ById('impNotReported').src = '/images/plus_sign.JPG'
                                                                                    this.title = 'Open'
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    display = ''
                                                                                    ById('impNotReported').src = '/images/minus_sign.JPG'
                                                                                    this.title = 'Close'
                                                                                    }

                                                                                    for (var i=1; i<=n ; i++)
                                                                                    {
                                                                                    ById('NotReported'+ i).style.display = display
                                                                                    }

                                                                                    ">
                                                                                <img border="0" id="impNotReported"
                                                                                     title="Open"
                                                                                     src="/images/plus_sign.JPG"
                                                                                     width="9" height="9"> <b>
                                                                                    NotReported</b></a></td>
                                                                        <td align="right" valign="top" bgcolor="#E8E8FF"
                                                                            style="padding-right: 15px">
                                                                            <b>
                                                                                <font color="#000080">
                                                                                    {{MyUtility::formatThousand($countPRNNotreported)}}
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td valign="top" align="center"
                                                                            bgcolor="#E8E8FF">
                                                                            @if($countPRNNotreported>0)
                                                                                <a target="_blank"
                                                                                   href="file:///H:/google%20drive/cdc.khmer.biz/httpdocs/ngo/report/project_preview_by_where"
                                                                                   onclick="																		 	this.href = '/own_report/detail_by_status?ProjectStatusName=5'
																		 "><img border="0" src="/images/Preview.gif"
                                                                                width="15" height="15"></a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>


                                                                    @foreach($ds as $row)
                                                                        <tr id="NotReported{{++$Id}}"
                                                                            style="display:none">
                                                                            <td align="right" valign="top" nowrap
                                                                                colspan="2" width="0">
                                                                                {{$Id}}.
                                                                            </td>
                                                                            <td align="center" valign="top" colspan="2">
                                                                                {{$row->Acronym}}</td>
                                                                            <td valign="top" align="left" width="39%">
                                                                                <a href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                   target="_blank">
                                                                                    {{$row->PName_E}}</a></td>
                                                                            <td valign="top" align="center" width="16%">
                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                                                            <td valign="top"
                                                                                align="center">{{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td align="center" valign="top"
                                                                            bgcolor="#D2D9FF" colspan="5" nowrap>
                                                                            <b>
                                                                                <font color="#0000FF">
                                                                                    Total
                                                                                    Number
                                                                                    of
                                                                                    Projects</font></b></td>
                                                                        <td valign="top" align="right" bgcolor="#D2D9FF"
                                                                            width="6%" style="padding-right: 15px">
                                                                            <b>
                                                                                <font color="#0000FF">


                                                                                    <?php
                                                                                    $countPRN = DB::table("v_ngo_listing_by_project_status")->count("PRN");
                                                                                    echo $countPRN;
                                                                                    ?>
                                                                                    Projects
                                                                                </font>
                                                                            </b>
                                                                        </td>
                                                                        <td valign="top" align="right"
                                                                            bgcolor="#D2D9FF">
                                                                            &nbsp;</td>
                                                                    </tr>
                                                                </table>
																						
																	</span></td>
</table>