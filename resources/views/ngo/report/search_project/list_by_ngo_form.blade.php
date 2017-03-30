<?php
use App\Http\Controllers\ngo\CoreDetailController;
$core = new CoreDetailController();
use App\Http\Controllers\MyUtility;
$a = CoreDetailController::getCoreDetailDictionary();
?>

															<span id="printRegion">
															<table border="0" width="100%" id="table4"
                                                                   class="fontNormal" cellspacing="1">
                                                                <tr>
                                                                    <td colspan="3" class="fontBig">
                                                                        <u>
                                                                            <font color="#FF0066">
                                                                                <b>
                                                                                    Listing </b>
                                                                            </font><b>
                                                                                <font color="#FF0066">
                                                                                    of
                                                                                    Projects
                                                                                    of: </font></b>
                                                                        </u></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" rowspan="2" width="62%"
                                                                        class="fontLarge">

                                                                        <b>
                                                                            <font color="#008000"><?php
                                                                                $core = MyUtility::getDictData($RID, $a);
                                                                                echo $core->Org_Name_E;
                                                                                ?></font></b></td>
                                                                    <td align="right" width="14%" nowrap>
                                                                        NGO:</td>
                                                                    <td width="15%">
                                                                        <select id="RID" name="RID"
                                                                                class="fontNormal" size="1"
                                                                                onchange="
									myform.action = 'listing_by_ngo?RID='+ this.value +'&NgoStatusId=' + ById('ProjectStatusId').value
								">
                                                                            @foreach($coreDetailLookUp as $row)
                                                                                <option value="{{$row->RID}}" {{MyUtility::getSelected($row->RID,$RID)}}>{{$row->Acronym}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right" width="14%" nowrap>
                                                                        Project
                                                                        Status:
                                                                    </td>
                                                                    <td width="15%">
                                                                        <select size="1" name="ProjectStatusId"
                                                                                id="ProjectStatusId" class="fontNormal">


                                                                            <option value="" {{MyUtility::getSelected("",$ProjectStatusId)}}>
                                                                                All
                                                                            </option>
                                                                            <option value="1" {{MyUtility::getSelected("1",$ProjectStatusId)}}>
                                                                                On-going
                                                                            </option>
                                                                            <option value="2" {{MyUtility::getSelected("2",$ProjectStatusId)}}>
                                                                                Completed
                                                                            </option>
                                                                            <option value="3" {{MyUtility::getSelected("3",$ProjectStatusId)}}>
                                                                                Suspended
                                                                            </option>
                                                                            <option value="4" {{MyUtility::getSelected("4",$ProjectStatusId)}}>
                                                                                Pipeline
                                                                            </option>
                                                                            <option value="5" {{MyUtility::getSelected("5",$ProjectStatusId)}}>
                                                                                (Not Reported)
                                                                            </option>

                                                                        </select>
															<span id="printRegion">
																<img border="0" src="/images/search_button.gif"
                                                                     width="19" height="21" class="cursorHand"
                                                                     onclick="myform.submit()" align="absbottom"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" colspan="3">
                                                                        <table border="1" width="100%" id="table5"
                                                                               cellspacing="1"
                                                                               style="border-collapse: collapse"
                                                                               bordercolor="#0099FF" class="fontNormal">
                                                                            <tr>
                                                                                <td
                                                                                    align="center" nowrap style="padding: 2px">
                                                                                    <font color="#0000FF">
                                                                                        <b>No</b></font></td>
                                                                                <td
                                                                                    align="center" nowrap style="padding: 2px">
                                                                                    <font color="#0000FF">
                                                                                        <b>Project Name</b></font></td>
                                                                                <td
                                                                                    align="center" nowrap style="padding: 2px">
                                                                                    <b>
                                                                                        <font color="#0000FF">
                                                                                            Start</font></b></td>
                                                                                <td
                                                                                    align="center" nowrap style="padding: 2px">
                                                                                    <b>
                                                                                        <font color="#0000FF">
                                                                                            Finish</font></b></td>
                                                                                <td
                                                                                    align="center" nowrap style="padding: 2px">
                                                                                    <b>
                                                                                        <font color="#0000FF">
                                                                                            Project Status</font></b></td>
                                                                            </tr>
                                                                            <?php

                                                                            $rowNum = 0;
                                                                            ?>
                                                                            @foreach($projects
																			as
																			$row)
                                                                                @if($rowNum%2==0)
                                                                                    <tr bgcolor="">
                                                                                @else
                                                                                    <tr bgcolor="#EEEEEE">
                                                                                        @endif
                                                                                        <td align="center" valign="top" style="padding: 2px">
                                                                                            <font color="#0000FF">
                                                                                                {{++$rowNum}}.</font>
                                                                                        </td>
                                                                                        <td align="left" valign="top" style="padding: 2px">
                                                                                            <a target="_blank"
                                                                                               href="/ngo/report/individual_project_preview?PRN={{$row->PRN}}">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
                                                                                        <td valign="top" align="center"
                                                                                            nowrap style="padding: 2px">
                                                                                            <font color="#0000FF">
                                                                                                {{MyUtility::formatKhDate($row->PDateStart)}}</font>
                                                                                        </td>
                                                                                        <td valign="top" align="center"
                                                                                            nowrap style="padding: 2px">
                                                                                            <font color="#0000FF">
                                                                                                {{MyUtility::formatKhDate($row->PDateFinish)}} &nbsp;</font></td>
                                                                                        <td valign="top" align="center"
                                                                                            nowrap style="padding: 2px">
                                                                                            <font color="#0000FF">
                                                                                                {{MyUtility::getProjectStatusName($row->ProjectStatusName)}} &nbsp;</font></td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
															</span>