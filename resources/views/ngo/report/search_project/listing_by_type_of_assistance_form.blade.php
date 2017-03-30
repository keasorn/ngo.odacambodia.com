<?php
use App\Http\Controllers\MyUtility;
?>
                                <span id="printRegion">
																<table border="0" width="100%" id="table4"
                                                                       cellpadding="2" class="fontNormal">
                                                                    <tr>
                                                                        <td colspan="3" class="fontBig">
                                                                            <img border="0"
                                                                                 src="/images/listing_of_project_by_typeoa.jpg"
                                                                                 width="250" height="40"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" width="58%">
                                                                            Type of
                                                                            Assistance:
                                                                        </td>
                                                                        <td width="40%" align="left" colspan="2">
                                                                            <select size="1" name="TypeOfAssistance"
                                                                                    class="fontNormal">
                                                                                <option value="0" {{MyUtility::getSelected('0',$TypeOfAssistance)}}>
                                                                                    All Types of
                                                                                    Assistance
                                                                                </option>
                                                                                <option value="1" {{MyUtility::getSelected('1',$TypeOfAssistance)}}>
                                                                                    Free-Standing
                                                                                    Technical
                                                                                    Cooperation
                                                                                </option>
                                                                                <option value="5" {{MyUtility::getSelected('5',$TypeOfAssistance)}}>
                                                                                    Pre-Investment-Related
                                                                                    Technical
                                                                                    Cooperation
                                                                                </option>
                                                                                <option value="6" {{MyUtility::getSelected('6',$TypeOfAssistance)}}>
                                                                                    Investment
                                                                                    Project/Programme
                                                                                </option>
                                                                                <option value="10" {{MyUtility::getSelected('10',$TypeOfAssistance)}}>
                                                                                    Food Aid
                                                                                </option>
                                                                                <option value="11" {{MyUtility::getSelected('11',$TypeOfAssistance)}}>
                                                                                    Emergency and
                                                                                    Relief
                                                                                    Assistance
                                                                                </option>
                                                                                <option value="12" {{MyUtility::getSelected('12',$TypeOfAssistance)}}>
                                                                                    (Not Reported)
                                                                                </option>
                                                                            </select></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="right" width="58%">
                                                                            Project
                                                                            Status:
                                                                        </td>
                                                                        <td width="14%" align="left">
																<span id="printRegion">
																<!-- #include file="include/project_status.asp" -->
       <select size="1" name="ProjectStatusId" id="ProjectStatusId" class="fontNormal">
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
                                                                        <td width="26%" align="left">
																<span id="printRegion">
																<img border="0" src="/images/search_button.gif"
                                                                     class="cursorHand" onclick="myform.submit()"
                                                                     align="absbottom"></span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="-69" align="right" colspan="3">

                                                                            <table border="1" width="100%" id="table5"
                                                                                   style="border-collapse: collapse"
                                                                                   bordercolor="#0099FF" cellpadding="2"
                                                                                   class="fontNormal">
                                                                                <tr>
                                                                                    <td align="center" nowrap width="6%"
                                                                                        style="padding: 2px">
                                                                                        <font color="#0000FF">
                                                                                            <b>No</b></font></td>
                                                                                    <td nowrap colspan="2"
                                                                                        align="center"
                                                                                        style="padding: 2px">
                                                                                        <font color="#0000FF">
                                                                                            <b>NGO</b></font></td>
                                                                                    <td nowrap align="center"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <font color="#0000FF">
                                                                                                Project
                                                                                                Name</font></b></td>
                                                                                    <td nowrap align="center"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <font color="#0000FF">
                                                                                                Start
                                                                                                Date</font></b></td>
                                                                                    <td nowrap align="center"
                                                                                        style="padding: 2px">
                                                                                        <b>
                                                                                            <font color="#0000FF">
                                                                                                Completion
                                                                                                Date</font></b></td>
                                                                                    <td nowrap align="center"
                                                                                        style="padding: 2px">
                                                                                        <font color="#0000FF">
                                                                                            <b>
                                                                                                Status</b></font></td>
                                                                                @if(($TypeOfAssistance==0)
                                                                            || ($TypeOfAssistance==1))
                                                                                    <?php
                                                                                    $tmpFTC = clone $ds;
                                                                                    $tmpFTC = clone $ds;
                                                                                    $recCountByFTC = $tmpFTC->where("SubTypeOfAssistance", "=", "1")->count();
                                                                                    $tmpFTC = $tmpFTC->where("SubTypeOfAssistance", "=", "1")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Free-Standing
                                                                                                    Technical
                                                                                                    Cooperation</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByFTC>0)
                                                                                                        {{$recCountByFTC}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpFTC
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                                style="padding: 2px"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top"
                                                                                                style="padding: 2px">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap
                                                                                                style="padding: 2px">
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif @if(($TypeOfAssistance==0)
																	|| ($TypeOfAssistance==5))

                                                                                    <?php
                                                                                    $tmpICT = clone $ds;
                                                                                    $tmpICT = clone $ds;
                                                                                    $recCountByICT = $tmpICT->where("SubTypeOfAssistance", "=", "5")->count();
                                                                                    $tmpICT = $tmpICT->where("SubTypeOfAssistance", "=", "5")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Pre-Investment-Related
                                                                                                    Technical
                                                                                                    Cooperation</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByICT>0)
                                                                                                        {{$recCountByICT}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpICT
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                                style="padding: 2px"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top"
                                                                                                style="padding: 2px">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap
                                                                                                style="padding: 2px">
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif @if(($TypeOfAssistance==0)
																	|| ($TypeOfAssistance==6))

                                                                                    <?php
                                                                                    $tmpIPP = clone $ds;
                                                                                    $tmpIPP = clone $ds;
                                                                                    $recCountByIPP = $tmpIPP->where("SubTypeOfAssistance", "=", "6")->count();
                                                                                    $tmpIPP = $tmpIPP->where("SubTypeOfAssistance", "=", "6")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Investment
                                                                                                    Project/Programme</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByIPP>0)
                                                                                                        {{$recCountByIPP}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpIPP
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                                style="padding: 2px"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top"
                                                                                                style="padding: 2px">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap
                                                                                                style="padding: 2px">
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif
                                                                                @if(($TypeOfAssistance==0)
                                                                                ||
                                                                                ($TypeOfAssistance==10))
                                                                                    <?php
                                                                                    $tmpFOA = clone $ds;
                                                                                    $tmpFOA = clone $ds;
                                                                                    $recCountByFOA = $tmpFOA->where("SubTypeOfAssistance", "=", "10")->count();
                                                                                    $tmpFOA = $tmpFOA->where("SubTypeOfAssistance", "=", "10")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Food Aid</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByFOA>0)
                                                                                                        {{$recCountByFOA}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpFOA
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                                style="padding: 2px"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top"
                                                                                                style="padding: 2px">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap
                                                                                                style="padding: 2px">
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif
                                                                                @if(($TypeOfAssistance==0)
                                                                                ||
                                                                                ($TypeOfAssistance==11))
                                                                                    <?php
                                                                                    $tmpERA = clone $ds;
                                                                                    $tmpERA = clone $ds;
                                                                                    $recCountByERA = $tmpERA->where("SubTypeOfAssistance", "=", "11")->count();
                                                                                    $tmpERA = $tmpERA->where("SubTypeOfAssistance", "=", "11")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Emergency
                                                                                                    and
                                                                                                    Relief
                                                                                                    Assistance</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByERA>0)
                                                                                                        {{$recCountByERA}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpERA
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                                style="padding: 2px"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top"
                                                                                                style="padding: 2px">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center"
                                                                                                style="padding: 2px">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap
                                                                                                style="padding: 2px">
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif
                                                                                @if(($TypeOfAssistance==0)
                                                                                ||
                                                                                ($TypeOfAssistance==12))
                                                                                    <?php
                                                                                    $tmpNOT = clone $ds;
                                                                                    $tmpNOT = clone $ds;
                                                                                    $recCountByNOT = $tmpNOT->whereNull("SubTypeOfAssistance")->count();
                                                                                    $tmpNOT = $tmpNOT->whereNull("SubTypeOfAssistance")->get();
                                                                                    $Id = 0;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td align="left" valign="top"
                                                                                            colspan="4"
                                                                                            bgcolor="#F0F8FF"
                                                                                            style="padding: 2px">
                                                                                            <font color="#0033CC">
                                                                                                <b>
                                                                                                    <img border="0"
                                                                                                         src="/images/OrangeArrow_10x10.png"
                                                                                                         width="10"
                                                                                                         height="10">
                                                                                                    Not
                                                                                                    Reported</b></font>
                                                                                        </td>
                                                                                        <td valign="top" align="right"
                                                                                            bgcolor="#F0F8FF" nowrap
                                                                                            colspan="3"
                                                                                            style="padding: 2px">

                                                                                            <font color="#000080">
                                                                                                <b>
                                                                                                    @if($recCountByNOT>0)
                                                                                                        {{$recCountByNOT}}
                                                                                                        Projects
                                                                                                    @endif
                                                                                                </b>
                                                                                            </font>
                                                                                        </td>
                                                                                    </tr>


                                                                                    </tr>



                                                                                    @foreach($tmpNOT
                                                                        as $row)
                                                                                        <tr>
                                                                                            <td align="right"
                                                                                                valign="top" colspan="2"
                                                                                                id="-{{++$Id}}"
                                                                                            >
                                                                                                {{$Id}}.
                                                                                            </td>
                                                                                            <td align="center"
                                                                                                valign="top">
                                                                                                {{$row->Acronym}}</td>
<span id="printRegion">
                                                                                        <td align="left" valign="top"
                                                                                            width="39%"
                                                                                            style="padding: 2px"><a
                                                                                                    href="individual_project_preview?PRN={{$row->PRN}}"
                                                                                                    target="_blank">
                                                                                                {{$row->PName_E}}</a>
                                                                                        </td>
															</span>
                                                                                            <td valign="top"
                                                                                                align="center">
																		<span id="printRegion2">
																		<span
                                                                                id="printRegion1">
																		{{MyUtility::formatKhDate($row->PDateStart)}}</span></span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center">
																		<span id="printRegion3">
                                                                                            {{MyUtility::formatKhDate($row->PDateFinish)}}</span>
                                                                                            </td>
                                                                                            <td valign="top"
                                                                                                align="center" nowrap>
																		<span id="printRegion4">
																																				{{MyUtility::getProjectStatusName($row->ProjectStatusName)}}</span>
                                                                                            </td>
                                                                                        </tr>

                                                                                    @endforeach
                                                                                @endif


                                                                            </table>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="-69" colspan="3">
                                                                            <font color="#FF0000">
                                                                                * Some
                                                                                projects
                                                                                implement on
                                                                                more than one
                                                                                Type of
                                                                                Assistance</font>&nbsp;</td>
                                                                    </tr>
                                                                </table>
																</span>
																