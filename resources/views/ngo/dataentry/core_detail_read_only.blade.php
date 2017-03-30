@extends('ngo.layout.with_menu')
<?php
use App\Http\Controllers\MyUtility;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ProvinceModel;
use App\Models\ngo\DistrictModel;
use App\Models\ngo\CommuneModel;
use App\Models\ngo\HQCountryModel;
use App\Models\ngo\MouDocumentModel;

$pro_model = new ProvinceModel();
$dis_model = new DistrictModel();
$hq_model = new HQCountryModel();

$core_detail = CoreDetailModel::where('RID', $RID)->first();
$list_core = CoreDetailModel::select("RID", "Acronym")->orderBy("Acronym")->get();
$ngo_pro_list = DB::table('v_ngo_listing_project_on_going')->where('RID', $RID)->where("ProjectStatusName", "1")->orderBy("PName_E")->get();

$province = ProvinceModel::select("province")->where("ProvinceID", "=", $core_detail->ProvinceCode)->first();
$province = MyUtility::getColFromArray("province", $province);

$district = DistrictModel::select("district")->where("DistrictID", "=", $core_detail->DistrictCode)->first();
$district = MyUtility::getColFromArray("district", $district);


$commune = CommuneModel::select("commune")->where("CommuneID", "=", $core_detail->CommuneCode)->first();
$commune = MyUtility::getColFromArray("commune", $commune);

$hq = HQCountryModel::select("HQ_Country_E")->where("HQCode", "=", $core_detail->HQ_CountryCode)->first();
$hq = MyUtility::getColFromArray("HQ_Country_E", $hq);

$mou = MouDocumentModel::where("RID", $RID)->get();

$topMenuId = "coreDetail";

?>
@section('content')
    @if(count($core_detail)>0)

        <form id="myform" method="POST" name="myform">
            <div align="center">

                <table border="0" width="99%" cellpadding="2" style="border-collapse: collapse" height="78">
                    <tr>
                        <td height="45">&nbsp;</td>
                        <td align="right" height="45" colspan="2">
                            Quick Jump:
                            <select style="visibility:visible;" id="cmbAcronymTop" name="cmbAcronymTop"
                                    class="fontNormal"
                                    size="1" onchange="CoreDetailQJChange(this.value)">
                                @foreach($list_core as $core)
                                    <option value="{{$core->RID}}">{{$core->Acronym}}</option>
                                @endforeach
                            </select></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <b>
                                <a href="#none">
                                    <font color="#FF0066 " class="red">Core Detail</font></a>
                                &gt;
                                <a href="/dataentry/list_of_active_project?RID={{$RID}}" onclick=""><font
                                            color="#114DFF"
                                            class="blue">
                                        List of On-going Projects</font></a>
                            </b></td>
                        <td align="right">

                            <a href="/report/coredetail/report_core_detail?RID={{$RID}}" target="_blank" onclick="
				this.href = '../report/coredetail/report_core_detail?RID='+ ById('cmbRID').value
			" class="fontnormal">
                                <img src="/images/Preview.gif" width="15" border="0" align="absbottom" height="15">
                                Preview</a></td>
                    </tr>
                </table>

            </div>

            <div align="center">
                <table border="0" width="99%" cellpadding="2" style="border-collapse: collapse">
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            <b>(1)</b></td>
                        <td class="fontNormalBlue" width="143" nowrap="" align="right" valign="top"
                            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            <font color="#0000FF">RID:
                            </font>
                        </td>
                        <td align="left" width="36%" valign="top"
                            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            {{$core_detail->RID}}</td>
                        <td align="right" width="168" valign="top"
                            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            <font color="#0000FF">NGO Status:
                            </font>
                        </td>
                        <td align="left" width="197" valign="top"
                            style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            {{MyUtility::getNgoStatusName($core_detail->NGOStatusName)}} </td>
                        <td align="left" width="242" valign="top" style="padding:2px; " colspan="2" rowspan="9">
                            <p align="center">
                                <img src="/assets/logo/{{MyUtility::getPathLogo($core_detail->TypeCode)}}/{{$core_detail->Logo}}"
                                     width="130" height="130" id="imgLogo"
                                     name="imgLogo"></td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">Acronym:
                            </font>
                        </td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->Acronym}}</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">NGO Type:
                            </font>
                        </td>
                        <td valign="top"
                            style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            {{MyUtility::getNgoType(TypeCode)}} 
                            </td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">NGO Name:</font></td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <b>{{$core_detail->Org_Name_E}}</b></td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">Date Commenced:
                            </font>
                        </td>
                        <td valign="top"
                            style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                            {{$core_detail->DateCommenced}} </td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC"
                            colspan="2" align="right">
                            Date Questionnaire Completed:
                        </td>

                        <td valign="top"
                            style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">
                            {{MyUtility::formatKhDate($core_detail->DateQCompleted)}}</td>
                    </tr>
                    @if($isNewNGO)
                    @endif
                    <tr>
                        <td align="center" valign="top"
                            style="border-left:medium none #C0C0C0; border-right:medium none #C0C0C0; border-top:1px solid #C0C0C0; border-bottom:medium none #C0C0C0; padding:2px; "
                            colspan="5">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC"><b>(2)</b></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">
                            <font color="#0000FF">Address:
                            </font>
                        </td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">
                            {{$core_detail->Address_1_E}} {{$core_detail->Address_2_E}} {{$core_detail->Address_3_E}} </td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">
                            <font color="#0000FF">Province:
                            </font>
                        </td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px" bordercolor="#CCCCCC">
                            {{$province}}</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">
                            <font color="#0000FF">District:</font></td>
                        <td width="36%" align="left" id="spanDistrict" valign="top"
                            style="border: medium none #CCCCCC; padding: 2px" bordercolor="#CCCCCC">{{$district}} </td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">
                            <font color="#0000FF">Commune:
                            </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">{{$commune}} </td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px"
                            bordercolor="#CCCCCC">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="top" style="padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <b>(3)</b></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">Contact Name:
                            </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->Contact_Name_E}}</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <font color="#0000FF">Contact Title:</font></td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            {{$core_detail->Contact_Title_E}}</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="top" style="padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <b>(4)</b></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">P.O. Box.<b> [A]:</b></font></td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->PO_Box}}</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF"><b>[B]:</b></font></td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->CCC_Box}}</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">Phone:
                            </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->Tel_No}}</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">OR:
                            </font>
                        </td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->Alt_Tel_No}}</td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border:medium none #CCCCCC; padding:2px; ">
                            <font color="#0000FF">Fax:
                            </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border:medium none #CCCCCC; padding:2px; ">
                            {{$core_detail->Fax_No}}</td>
                        <td align="right" valign="top" style="border:medium none #CCCCCC; padding:2px; ">
                            <font color="#0000FF">Email:
                            </font>
                        </td>
                        <td valign="top" style="border:medium none #CCCCCC; padding:2px; ">
                            {{$core_detail->eMail}}</td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <font color="#0000FF">Website: </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <a href="{{$core_detail->Website}}" target=_blank> {{$core_detail->Website}}</a></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="top" style="padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <b>(5)</b></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">International
                                HQ:
                            </font>
                        </td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            {{$core_detail->HQ_Address}} </td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <font color="#0000FF">HQ Country:</font></td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            {{$hq}}</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="top" style="padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <b>(6)</b></td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF"><b>Official Registration</b></font></td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border: medium none #CCCCCC; padding: 2px">
                            <img src="/images/{{MyUtility::getRadio(2,$core_detail->RegistrationWith)}}">
                            Ministry of Interior<img
                                    src="/images/{{MyUtility::getRadio(1,$core_detail->RegistrationWith)}}">
                            Council of Ministers
                        </td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <font color="#0000FF">Date of Registration:
                            </font>
                        </td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">
                            <div id="RegistrationDate"
                                 class="input-group date my-datepicker"
                                 data-date-format="dd-mm-yyyy">
                                {{MyUtility::formatKhDate($core_detail->RegistrationDate)}}

                            </div>
                        </td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border:medium none #CCCCCC; padding:2px; ">
                            <img src="/images/{{MyUtility::getRadio($core_detail->RegistrationWith,3)}}">
                            Ministry of Foreign
                            Affairs, International
                            Cooperation<img src="/images/{{MyUtility::getRadio($core_detail->RegistrationWith,0)}}">
                            NONE
                        </td>
                        <td align="right" valign="top" style="border:medium none #CCCCCC; padding:2px; ">
                            <font color="#0000FF">Date of last Expiry</font><font color="#114DFF">:</font></td>
                        <td valign="top" style="border:medium none #CCCCCC; padding:2px; ">

                            {{MyUtility::formatKhDate($core_detail->DateOfLastExpiry)}}
                        </td>
                        <td valign="top" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <font color="#0000FF">Date Expiry:
                            </font>
                        </td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">

                            <div id="RegistrationExpiry"
                                 class="input-group date my-datepicker"
                                 data-date-format="dd-mm-yyyy">
                                {{MyUtility::formatKhDate($core_detail->RegistrationExpiry)}}
                            </div>
                        </td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center" valign="top" style="padding: 2px">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <b>(7)</b></td>
                        <td colspan="6" align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
                            <p align="left"><font color="#0000FF">
                                    <b>Attachment: </b>Legal
                                    Document (MOU, Ministry
                                    or Department Partner
                                    Agreement)</font></td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            height="37">&nbsp;</td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px" height="37">
                            &nbsp;</td>
                        <td width="36%" align="left" id="spanCommune" valign="top"
                            style="border: medium none #CCCCCC; padding: 2px" height="37">
                            <img src="/images/{{MyUtility::getRadio($core_detail->MOU_Attachment, 1)}}">
                            YES
                            <img src="/images/{{MyUtility::getRadio($core_detail->MOU_Attachment, 0)}}">
                            NO
                        </td>
                        <td align="right" valign="top" style="border: medium none #CCCCCC; padding: 2px" height="37">
                            &nbsp;</td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px" height="37">&nbsp;</td>
                        <td valign="top" style="border: medium none #CCCCCC; padding: 2px" height="37">&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"
                            height="37">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="43" align="center" valign="top"
                            style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td align="right" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td id="mou_document" colspan="3" valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            <table class="fontNormal" style="width: 500; border-collapse:collapse"
                                   id="tblMouDocument" cellpadding="2" border="1" bordercolor="#C0C0C0">
                                <thead>
                                <tr>
                                    <th class="text-center" bgcolor="#F7F7F7" height="28" width="80">No</th>
                                    <th class="text-center" style="width: 450px" bgcolor="#F7F7F7" height="28">PDF
                                        Document
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $numtr = 0;
                                ?>
                                @foreach($mou as $m)

                                    <tr id="trDoc{{++$numtr}}">
                                        <td class="text-center" height="30" align="center" width="80">{{$numtr}}.</td>
                                        <td height="30" style="padding-left: 4px; padding-right: 4px" width="450">
                                            <a href="/assets/ngo_attachment/{{urlencode($RID)}}/{{$m->MOU_PDF}}"
                                               target="_blank">{{$m->MOU_PDF}}</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                            <p>&nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                        <td valign="top"
                            style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">
                            &nbsp;</td>
                    </tr>
                </table>

            </div>@else

            @endif
        </form>
        <script>

            function CoreDetailQJChange(val) {
                window.location = "/dataentry/core_detail_readonly?Acronym=" + val;
            }
            ;
            function coreReadonlyInit() {
                $("#cmbAcronymTop").val('{{$RID}}');
            }
            ;
            coreReadonlyInit();
        </script>
@endsection