<?php
use App\Http\Controllers\MyUtility;
?>
<span id="printRegion">
															<table border="0" width="100%" id="table4" cellpadding="2">
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <img border="0"
                                                                             src="/images/listing_of_project_by_duration.jpg"
                                                                             width="250" height="40"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fontNormal" nowrap align="right"
                                                                        width="58%">
                                                                        Duration:
                                                                    </td>
                                                                    <td id="title" class="fontNormal" align="left"
                                                                        style="color: #000080; font-weight: bold"
                                                                        width="41%" colspan="2">
                                                                        <select size="1" name="Duration" id="Duration"
                                                                                class="fontNormal">

                                                                            <option value="0" {{MyUtility::getSelected(0,$durationType)}}>
                                                                                All Durations
                                                                            </option>
                                                                            <option value="duration1" {{MyUtility::getSelected("duration1",$durationType)}}>
                                                                                Less or equal to 1 year
                                                                            </option>
                                                                            <option value="duration2" {{MyUtility::getSelected("duration2",$durationType)}}>
                                                                                More than 1 but less than or equal to 3
                                                                                years
                                                                            </option>
                                                                            <option value="duration3" {{MyUtility::getSelected("duration3",$durationType)}}>
                                                                                More than 3 but less than or equal to 5
                                                                                years
                                                                            </option>
                                                                            <option value="duration4" {{MyUtility::getSelected("duration4",$durationType)}}>
                                                                                More than 5 but less than or equal to 10
                                                                                years
                                                                            </option>
                                                                            <option value="duration5" {{MyUtility::getSelected("duration5",$durationType)}}>
                                                                                More than to 10 years
                                                                            </option>
                                                                            <option value="duration6" {{MyUtility::getSelected("duration6",$durationType)}}>
                                                                                Project's Start and/or Completion Date
                                                                                not reported
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="fontNormal" nowrap align="right"
                                                                        width="58%">
                                                                        Project Status:
                                                                    </td>
                                                                    <td id="title" class="fontNormal" align="left"
                                                                        style="color: #000080; font-weight: bold"
                                                                        width="2%">

                                                                        <select size="1" name="ProjectStatusId"
                                                                                id="ProjectStatusId" class="fontNormal">
                                                                            <option value="0" {{MyUtility::getSelected(0,$ProjectStatusName)}}>
                                                                                All
                                                                            </option>
                                                                            <option value="1" {{MyUtility::getSelected(1,$ProjectStatusName)}}>
                                                                                On-going
                                                                            </option>
                                                                            <option value="2" {{MyUtility::getSelected(2,$ProjectStatusName)}}>
                                                                                Completed
                                                                            </option>
                                                                            <option value="3" {{MyUtility::getSelected(3,$ProjectStatusName)}}>
                                                                                Suspended
                                                                            </option>
                                                                            <option value="4" {{MyUtility::getSelected(4,$ProjectStatusName)}}>
                                                                                Pipeline
                                                                            </option>
                                                                            <option value="5" {{MyUtility::getSelected(5,$ProjectStatusName)}}>
                                                                                (Not Reported)
                                                                            </option>
                                                                        </select></td>
                                                                    <td id="title" class="fontNormal" align="left"
                                                                        style="color: #000080; font-weight: bold"
                                                                        width="2%">
															<span id="printRegion">
																<img border="0" src="/images/search_button.gif"
                                                                     width="19" height="21" class="cursorHand"
                                                                     onclick="myform.submit()" align="absbottom"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <table border="1" width="100%" id="table5"
                                                                               style="border-collapse: collapse"
                                                                               bordercolor="#0099FF" cellpadding="2"
                                                                               class="fontNormal">
                                                                            <tr>
                                                                                <th align="center" nowrap
                                                                                    style="padding: 2px">
                                                                                    Duration
                                                                                </th>
                                                                                <th align="center" nowrap width="16%"
                                                                                    style="padding: 2px">
                                                                                    NGO
                                                                                </th>
                                                                                <th align="center" nowrap width="39%"
                                                                                    style="padding: 2px">
                                                                                    Project
                                                                                </th>
                                                                                <th align="center" nowrap width="10%"
                                                                                    style="padding: 2px">
                                                                                    Start Date
                                                                                </th>
                                                                                <th align="center" nowrap width="10%"
                                                                                    style="padding: 2px">
                                                                                    Completion Date
                                                                                </th>
                                                                                <th align="center" nowrap width="6%"
                                                                                    style="padding: 2px">
                                                                                    Project Status
                                                                                </th>
                                                                            </tr>

                                                                            <?php
                                                                            if ($durationType == "0") {
                                                                                $RecordCount = $recCountByDuration = DB::table("v_ngo_listing_by_duration")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                            } else {
                                                                                $RecordCount = $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", $durationType)->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                            }
                                                                            ?>
                                                                            @if(($durationType == "duration1") || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration1")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration1")->whereIn("ProjectStatusName", $dsProjectStatusName);
                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img01').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img01').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('1-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img01"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > Less or equal to 1
                                                                                                year</a></b></td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="1-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif

                                                                            @if(($durationType == "duration2") || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration2")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration2");

                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->whereIn("ProjectStatusName", $dsProjectStatusName)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img02').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img02').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('2-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img02"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > More than 1 but less
                                                                                                than or equal to 3 years</a></b>
                                                                                    </td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="2-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            @endif

                                                                            @if($durationType == "duration3" || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration3")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration3")->whereIn("ProjectStatusName", $dsProjectStatusName);

                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img03').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img03').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('3-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img03"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > More than
                                                                                                3 but less than or equal
                                                                                                to
                                                                                                5 years</a></b></td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="3-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            @endif
                                                                            @if($durationType == "duration4" || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration4")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration4")->whereIn("ProjectStatusName", $dsProjectStatusName);

                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img04').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img04').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('4-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img04"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > More than
                                                                                                5 but less than or equal
                                                                                                to
                                                                                                10 years</a></b></td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="4-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            @endif
                                                                            @if($durationType == "duration5" || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration5")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration5")->whereIn("ProjectStatusName", $dsProjectStatusName);

                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img05').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img05').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('5-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img05"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > More than 10 years</a></b>
                                                                                    </td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="5-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            @endif
                                                                            @if($durationType == "duration6" || ($durationType == "0"))
                                                                                <?php
                                                                                $recCountByDuration = DB::table("v_ngo_listing_by_duration")->where("durationType", "=", "duration6")->whereIn("ProjectStatusName", $dsProjectStatusName)->count("PRN");
                                                                                $selectPRNByDuration = DB::table("v_ngo_listing_by_duration")->select("PRN")->where("durationType", "=", "duration6")->whereIn("ProjectStatusName", $dsProjectStatusName);

                                                                                $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN", $selectPRNByDuration)->orderBy("Acronym")->get();
                                                                                $Id = 0;
                                                                                ?>
                                                                                <tr>
                                                                                    <td align="left" valign="top"
                                                                                        colspan="3" bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <a href="#none" title="Open"
                                                                                               onclick="
                                                                                                       var n = '{{$recCountByDuration}}'
                                                                                                       var display
                                                                                                       if (this.title == 'Close') {
                                                                                                       display = 'none'
                                                                                                       ById('img06').src = '/images/plus_sign.JPG'
                                                                                                       this.title = 'Open'
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                       display = ''
                                                                                                       ById('img06').src = '/images/minus_sign.JPG'
                                                                                                       this.title = 'Close'
                                                                                                       }

                                                                                                       for (var i=1; i<=n ; i++)
                                                                                                       {
                                                                                                       ById('6-'+ i).style.display = display
                                                                                                       }

                                                                                                       "><img border="0"
                                                                                                              id="img06"
                                                                                                              src="/images/plus_sign.JPG"
                                                                                                              width="9"
                                                                                                              height="9"
                                                                                                > Project's Start and/or
                                                                                                Completion Date not
                                                                                                reported</a></b></td>
                                                                                    <td align="Center" valign="top"
                                                                                        width="32%" colspan="3"
                                                                                        bgcolor="#E8E8FF"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            {{$recCountByDuration}}
                                                                                            Projects</b></td>
                                                                                </tr>
                                                                                @foreach($ds as $row)
                                                                                    <tr id="6-{{++$Id}}"
                                                                                        style="display:none">
                                                                                        <td width="10%" align="right"
                                                                                            valign="top"
                                                                                            style="padding: 2px">
                                                                                            {{$Id}}.
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="16%"
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion0">{{$row->Acronym}}</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px"><span
                                                                                                    id="printRegion1">{{MyUtility::formatKhDate($row->PDateStart)}}</span>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            width="10%" nowrap
                                                                                            style="padding: 2px">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</td>
                                                                                        <td align="center" valign="top"
                                                                                            width="6%" nowrap
                                                                                            style="padding: 2px">{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                            @if($durationType=="0")
                                                                                <tr>
                                                                                    <td width="67%" align="center"
                                                                                        valign="top" bgcolor="#E8E8FF"
                                                                                        colspan="3"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            Total Number of Projects</b>
                                                                                    </td>
                                                                                    <td align="center" valign="top"
                                                                                        bgcolor="#E8E8FF" width="32%"
                                                                                        colspan="3"
                                                                                        style="padding: 2px">
                                                                                        <b>{{$RecordCount}} Projects</b>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        </table>

                                                                    </td>
                                                                </tr>
                                                            </table>
															</span>