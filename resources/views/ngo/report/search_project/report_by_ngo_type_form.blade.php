<?php
use App\Http\Controllers\MyUtility;
use App\Http\Controllers\ngo\ReportController;
$typeCodes = array(
        '1' => 'Foreign NGO',
        '2' => "Cambodia NGO",
        '3' => 'Association'
);
?>
<table border="0" width="100%" id="table4" cellspacing="1" class="fontNormal">
    <tr>
        <td width="99%" colspan="3">
            <img border="0" src="/images/number_of_project_by_ngotype.jpg" width="253"
                 height="40"></td>
    </tr>
    <tr>
        <td width="17%" class="fontNormal" align="right">
            NGO Status:</td>
        <td width="82%" class="fontNormal" colspan="2">

            <select size="1" name="NgoStatusId" id="NgoStatusId" class="fontNormal">
                <option value="0" {{MyUtility::getSelected("",$NgoStatusId)}}>All
                </option>
            <option value="1" {{MyUtility::getSelected("1",$NgoStatusId)}}>Active</option>
            <option value="3"  {{MyUtility::getSelected("3",$NgoStatusId)}}>Not Reported</option>
            <option value="4"  {{MyUtility::getSelected("4",$NgoStatusId)}}>No Active</option>
            <option value="2" {{MyUtility::getSelected("2",$NgoStatusId)}}>Close</option>
        </select></td>
    </tr>
    <tr>
        <td width="17%" class="fontNormal" align="right">
            Project Status:
        </td>
        <td width="12%" class="fontNormal">


            <select size="1" id="ProjectStatus" name="ProjectStatus"
                    class="fontNormal">
                <option value="0" {{MyUtility::getSelected("0",$ProjectStatus)}}>All
                </option>
                <option value="1" {{MyUtility::getSelected("1",$ProjectStatus)}}>On-going
                </option>
                <option value="2" {{MyUtility::getSelected("2",$ProjectStatus)}}>Completed
                </option>
                <option value="3" {{MyUtility::getSelected("3",$ProjectStatus)}}>Suspended
                </option>
                <option value="4" {{MyUtility::getSelected("4",$ProjectStatus)}}>Pipeline
                </option>
                <option value="5" {{MyUtility::getSelected("5",$ProjectStatus)}}>(Not
                    Reported)
                </option>
            </select></td>
        <td width="70%" class="fontNormal" align="left" valign="top"><img border="0"
                                                                          src="/images/search_button.gif"
                                                                          align="absbottom"
                                                                          class="cursorHand"
                                                                          onclick="myform.submit()">
        </td>
    </tr>
    <tr>
        <td width="98%" colspan="3">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="98%" colspan="3">
            <table border="1" width="100%" id="table5" style="border-collapse: collapse"
                   bordercolor="#0099FF" bordercolorlight="#0099FF"
                   bordercolordark="#0099FF"
                   class="fontNormal" cellspacing="1">
                <tr>
                    <td align="center" nowrap bgcolor="#D2D9FF" height="10" width="2%" style="padding: 2px">
                        <font color="#0033CC">
                            <b>No</b></font></td>

                    <td align="center" nowrap bgcolor="#D2D9FF" height="10" width="5%" style="padding: 2px">
                        <font color="#0033CC">
                            <b>NGO<br>
                                Type</b></font></td>

                    <td align="center" nowrap bgcolor="#D2D9FF" height="10" width="10%" style="padding: 2px">
                        <b>
                            <font color="#0033CC">
                                Acronym</font></b></td>

                    <td align="center" nowrap bgcolor="#D2D9FF" height="10" width="57%" style="padding: 2px">
                        <b>
                            <font color="#0033CC">
                                NGO</font></b></td>
                    <td align="center" nowrap bgcolor="#D2D9FF" height="10" width="12%" style="padding: 2px">
                        <b>
                            <font color="#0033CC">
                                NGO
                                Status</font></b></td>

                    <td align="center" bgcolor="#D2D9FF" height="20" style="padding: 2px">
                        <b>
                            <font color="#0033CC">
                                Number
                                of
                                Projects</font></b></td>

                </tr>
                <?php
                $ds=new ReportController();
                $sumAllProject=$ds->getCountAllProjectByType($NgoStatusId,$ProjectStatus);
                $NumberOfType = 0;
                $rowNo = 0;


                ?>
                @foreach($typeCodes as $key=>$value)
                    <?php
                    $tmpDs=$ds->getCountProjectByStatus($NgoStatusId,$ProjectStatus,$key);
                    $recCountByNgoType=$ds->getCountNgoByType($NgoStatusId,$ProjectStatus,$key);
                    $projectsCount=$ds->getCountProjectByType($NgoStatusId,$ProjectStatus,$key);
                    $id = 0;
                    ?>
                    <tr>
                        <td align="center" bgcolor="#D5EEFF" height="10" nowrap width="2%" style="padding: 2px">
                            &nbsp;<b>{{++$NumberOfType}}.</b></td>
                        <td align="left" colspan="3"
                            bgcolor="#D5EEFF" height="10" style="padding: 2px">
                            <a href="#none"
                               onclick="CloseOpen({{$recCountByNgoType}},ById('img{{$key}}'),'trRec{{$key}}')">
                                <font color="#000080">
                                    <img id="img{{$key}}" border="0" title="Close"
                                         src="/images/minus_sign.JPG" width="9" height="9">
                                </font>
                                <b>
                                    <font color="#000080">{{$value}}</font></b></a></td>
                        <td bgcolor="#D5EEFF" align="right" style="padding: 2px">
                            <b>{{MyUtility::n2z(MyUtility::formatThousand($recCountByNgoType))}} NGOs</b></td>
                        <td bgcolor="#D5EEFF" align="right" height="10"
                            style="padding:2px; ">
                            <b>
                                {{MyUtility::n2z(MyUtility::formatThousand($projectsCount))}}
                            </b></td>

                    </tr>
                    @foreach($tmpDs as $row)
                        @if($id%2==0)
                            <tr bgcolor="" id="trRec{{$key .$id++}}" style="display:''">
                        @else
                            <tr bgcolor="#EEEEEE" id="trRec{{$key .$id++}}"
                                style="display:''">
                                @endif
                                <td align="center" valign="top" height="10"
                                    width="2%" style="padding: 2px"></td>
                                <td align="center" valign="top" height="10" style="padding: 2px">
                                    {{++$rowNo}}.
                                </td>
                                <td align="center" valign="top" height="10" style="padding: 2px">
                                    <a href="/report/coredetail/report_core_detail?RID={{$row->RID}}"
                                       target="_blank">{{$row->Acronym}}
                                    </a></td>
                                <td align="left" valign="top" height="10" style="padding: 2px">
                                    {{$row->Org_Name_E}}
                                </td>

                                <td align="center" valign="top" height="10" style="padding: 2px">
                                    {{MyUtility::getNgoStatusName($row->NGOStatusName)}}
                                </td>

                                <td align="right" nowrap
                                    valign="top"
                                    style="padding:2px; ">
                                    <b>
                                        @if($ProjectStatus==1)
                                            {{ MyUtility::formatThousand($row->OnGoing)}}
                                        @elseif($ProjectStatus==2)
                                            {{ MyUtility::formatThousand($row->Completed)}}
                                        @elseif($ProjectStatus==3)
                                            {{ MyUtility::formatThousand($row->Suspended)}}
                                        @elseif($ProjectStatus==4)
                                            {{ MyUtility::formatThousand($row->Pipeline)}}
                                        @elseif($ProjectStatus==5)
                                            {{ MyUtility::formatThousand($row->NotReported)}}
                                        @else
                                            {{ MyUtility::formatThousand($row->AllProjectStatus)}}
                                        @endif
                                    </b>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach

                            <tr bgcolor="" id="">
                                <td align="center" valign="top" height="10" bgcolor="#D2D9FF"
                                    colspan="4" style="padding: 2px">
                                    <font color="#0000FF">
                                        <b>Total
                                            Number
                                            of
                                            Projects</b></font></td>
                                <td align="right" valign="top" height="10" bgcolor="#D2D9FF" style="padding: 2px">
                                    <b>{{MyUtility::n2z(MyUtility::formatThousand($rowNo))}} NGOs</b></td>
                                <td valign="top" align="right" height="10" bgcolor="#D2D9FF"
                                    style="padding:2px; ">
                                    <b>
                                        <font color="#0000FF">{{MyUtility::formatThousand($sumAllProject)}}</font></b>
                                </td>
                            </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td width="98%" colspan="3">
            &nbsp;</td>
    </tr>
</table>
