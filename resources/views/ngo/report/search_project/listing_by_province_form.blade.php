<?php

use App\Http\Controllers\MyUtility;
?>
<table border="0" width="100%" id="table4"
       class="fontNormal" cellspacing="1">
    <tr>
        <td colspan="3" class="fontBig">
            <img border="0"
                 src="/images/listing_of_project_by_province.jpg"
                 width="250" height="40"></td>
    </tr>
    <tr>
        <td align="right" width="77%">
            Province:
        </td>
        <td width="5%" colspan="2">

            <select class="fontNormal" name="ProvinceId"
                    id="ProvineId" size="1">
                <option value="0">
                    All Provinces
                </option>
                @foreach($dsProvince as $key=>$value)
                    <option value="{{$key}}" {{MyUtility::getSelected($key,$ProvinceId)}}>{{$value}}</option>
                @endforeach
                <option value="99" {{MyUtility::getSelected(99,$ProvinceId)}}>(Not Reported)</option>
            </select></td>
    </tr>
    <tr>
        <td align="right" width="77%">
            Project
            Status:
        </td>
        <td width="11%">
       <select size="1" name="ProjectStatusId" id="ProjectStatusId" class="fontNormal">
                <option value="0" {{MyUtility::getSelected(0,$ProjectStatusName)}}>All</option>
                <option value="1" {{MyUtility::getSelected(1,$ProjectStatusName)}}>On-going</option>
                <option value="2" {{MyUtility::getSelected(2,$ProjectStatusName)}}>Completed</option>
                <option value="3" {{MyUtility::getSelected(3,$ProjectStatusName)}}>Suspended</option>
                <option value="4" {{MyUtility::getSelected(4,$ProjectStatusName)}}>Pipeline</option>
                <option value="5" {{MyUtility::getSelected(5,$ProjectStatusName)}}>(Not Reported)</option>
            </select>            </td>
        <td width="10%">
															<span id="printRegion">
																<img border="0" src="/images/search_button.gif"
                                                                     width="19" height="21" class="cursorHand"
                                                                     onclick="myform.submit()" align="absbottom"></span></td>
    </tr>
    <tr>
        <td align="right" height="80" colspan="3"
            valign="top">
            <table border="1" width="100%" id="table5"
                   style="border-collapse: collapse"
                   bordercolor="#0099FF" cellpadding="2"
                   class="fontNormal">
                <tr>
                    <td
                        align="center" nowrap style="padding: 2px">
                        <font color="#0033CC"><b>No</b></font>
                    </td>
                    <td
                        align="center" nowrap width="10%" style="padding: 2px">
                        <font color="#0033CC"><b>Province</b></font>
                    </td>
                    <td
                        align="center" nowrap style="padding: 2px">
                        <font color="#0033CC"><b>NGO</b></font>
                    </td>
                    <td
                        align="center" style="padding: 2px">
                        <font color="#0033CC"><b>Project
                                Name</b></font></td>
                    <td
                        align="center" width="5%" nowrap style="padding: 2px">
                        <font color="#0033CC"><b>Start
                                Date</b></font></td>
                    <td
                        align="center" width="6%" nowrap style="padding: 2px">
                        <font color="#0033CC"><b>Completion
                                Date</b></font></td>
                    <td
                        align="center" width="8%" nowrap style="padding: 2px">
                        <font color="#0033CC"><b>Project
                                Status</b></font></td>
                </tr>
                <?php
                $rowProvince=0; ?>
                @foreach($dsProvinceId as $key=>$value)
                    <?php
                    if($key != 99){
                    if($ProjectStatusName != 0){
                        $recCountByProvinceId = DB::table("v_ngo_project_location_by_PRN")->where("Province",$key)->where("ProjectStatusName",$ProjectStatusName)->count("Province");
                        $selectPRNbyProvince = DB::table("v_ngo_project_location_by_PRN")->select("PRN")->where("Province",$key)->where("ProjectStatusName",$ProjectStatusName);
                    }else{
                        $recCountByProvinceId = DB::table("v_ngo_project_location_by_PRN")->where("Province",$key)->count("Province");
                        $selectPRNbyProvince = DB::table("v_ngo_project_location_by_PRN")->select("PRN")->where("Province",$key);

                    }
                    }else{
                    if($ProjectStatusName != 0){
                        $recCountByProvinceId = DB::table("v_ngo_project_location_by_PRN")->whereNull("Province")->where("ProjectStatusName",$ProjectStatusName)->count("PRN");
                        $selectPRNbyProvince = DB::table("v_ngo_project_location_by_PRN")->select("PRN")->whereNull("Province")->where("ProjectStatusName",$ProjectStatusName);
                    }else{
                        $recCountByProvinceId = DB::table("v_ngo_project_location_by_PRN")->whereNull("Province")->count("PRN");
                        $selectPRNbyProvince = DB::table("v_ngo_project_location_by_PRN")->select("PRN")->whereNull("Province");

                    }
                    }
                    ?>
                    <tr bgcolor="#E8F9FF">
                        <td width="3%" align="center"
                            valign="top" nowrap style="padding: 2px">
                            <b>
                                {{++$rowProvince}}.</b></td>
                        <td align="left" valign="top"
                            style="padding:2px; border-right-style: none; border-right-width: medium"
                            nowrap colspan="2">
                            <a href="#none"
                               onclick="
                                       var n = '{{$recCountByProvinceId}}'
                                       var display
                                       if (this.title == 'Close') {
                                       display = 'none'
                                       ById('img{{$key}}').src = '/images/plus_sign.JPG'
                                       this.title = 'Open'
                                       }
                                       else
                                       {
                                       display = ''
                                       ById('img{{$key}}').src = '/images/minus_sign.JPG'
                                       this.title = 'Close'
                                       }

                                       for (var i=0; i<n ; i++)
                                       {
                                       ById('{{$value}}'+ i).style.display = display
                                       }"
                            >
                                <b>
                                    <img id="img{{$key}}"
                                         border="0" title="Open"
                                         src="/images/plus_sign.JPG"
                                         width="9" height="9">
                                    {{$value}}
                                </b></a>


                        </td>
                        <td valign="top"
                            style="padding:2px; border-right-style: none; border-right-width: medium"
                            nowrap colspan="3" align="left">
                            ({{MyUtility::n2z(MyUtility::formatThousand($recCountByProvinceId))}}
                            Projects)
                        </td>
                        <td align="center" valign="top"
                            style="padding:2px; border-right-style: none; border-right-width: medium"
                            nowrap>
                            @if($recCountByProvinceId>0)
                                <a target="_blank"
                                   href="/ngo/report/search_project/listing_by_province/detail?ProvinceId={{$key}}&ProjectStatusName={{$ProjectStatusName}}">
                                    <img title="Preview" border="0"
                                         src="/images/Preview.gif"
                                         width="15" height="15"></a>
                            @endif
                        </td>
                    </tr>

                    <?php
                    $ds = DB::table("v_ngo_listing_by_project_status")->whereIn("PRN",$selectPRNbyProvince)->orderBy("Acronym")->get();
                    $rowNum= 0;
                    ?>
                    @foreach($ds as $row)
                        @if($rowNum%2==0)
                            <tr bgcolor=""
                                id="{{$value.$rowNum}}" style="display:none;">

                        @else
                            <tr bgcolor="EEEEEE" id="{{$value.$rowNum}}" style="display:none;">
                                @endif
                                <td align="right" valign="top"
                                    colspan="2" style="padding: 2px">
                                    {{++$rowNum}}.
                                </td>
                                <td width="14%" align="center"
                                    valign="top" style="padding: 2px">
                                    {{$row->Acronym}}</td>
                                <td width="38%" align="left"
                                    valign="top" style="padding: 2px">
                                    <a target="_blank"
                                       href="/ngo/report/individual_project_preview?PRN={{$row->PRN}}">
                                        {{$row->PName_E}}</a>
                                </td>
                                <td width="5%" valign="top"
                                    align="center" nowrap style="padding: 2px">
                                    {{MyUtility::formatKhDate($row->PDateStart)}}</td>
                                <td width="6%" valign="top"
                                    align="center" nowrap style="padding: 2px">
                                    {{MyUtility::formatKhDate($row->PDateFinish)}}
                                    &nbsp;</td>
                                <td width="8%" valign="top"
                                    align="center" nowrap style="padding: 2px">
                                    {{MyUtility::getProjectStatusName($row->ProjectStatusName)}}
                                    &nbsp;</td>
                            </tr>
                            @endforeach
                            @endforeach

            </table>
        </td>
    </tr>
</table>