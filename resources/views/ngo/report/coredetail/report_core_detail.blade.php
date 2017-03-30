@extends('ngo.layout.with_view')
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


$ngo_pro_list = DB::table('v_ngo_listing_project_on_going')->where('RID', $RID)->where("ProjectStatusName", "1")->orderBy("PName_E")->get();

$province = ProvinceModel::select("province")->where("ProvinceID", "=", $core_detail->ProvinceCode)->first();
$province = MyUtility::getColFromArray("province", $province);

$district = DistrictModel::select("district")->where("DistrictID", "=", $core_detail->DistrictCode)->first();
$district = MyUtility::getColFromArray("district", $district);

$commnune = CommuneModel::select("Commune")->where("CommuneID", "=", $core_detail->CommuneCode)->first();
$commnune = MyUtility::getColFromArray("Commune", $commnune);

$hq = HQCountryModel::select("HQ_Country_E")->where("HQCode", "=", $core_detail->HQ_CountryCode)->first();
$hq = MyUtility::getColFromArray("HQ_Country_E", $hq);
$mou = MouDocumentModel::where("RID", $RID)->get();

function getRadio($col, $value)
{
    if ($col == $value) {
        echo "radio_checked.jpg";
    } else {
        echo "radio_unchecked.jpg";
    }
}
?>


{{--@foreach($provin_model as $pro)--}}
{{--{{$pro->ProvinceID}}--}}
{{--@endforeach--}}
@section('content')
    @if(count($core_detail)>0)
        <div align="center">
            <table id="table43" style="border-collapse: collapse" class="fontnormal" width="770" cellpadding="2"
                   border="0" cellspacing="2">
                <tbody>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td align="right">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td align="left"><u>
                            <font size="3" color="#0066CC"><b>NGO's Core Detail Information</b></font><font
                                    color="#0066CC">
                            </font></u></td>
                    <td align="right">
                        <a href="#none" onclick="javascrip:window.print()">
                            <img src="/images/print.gif" width="18" border="0" align="absmiddle" height="18">
                            Print
                        </a>
                        <img src="/images/close.jpg" width="18" border="0" height="18"><a href="#none"
                                                                                          onclick="javascrip:window.close()">
                            Close
                        </a></td>
                </tr>
                <tr>
                    <td colspan="2" height="32">

                        <table id="table21" style="border-collapse: collapse" width="100%" cellpadding="2" border="0">
                            <tbody>
                            <tr>
                                <td valign="top">
                                    &nbsp;</td>
                                <td rowspan="10" valign="top" align="center">
                                        <img src="/assets/logo/{{MyUtility::getPathLogo($core_detail->TypeCode)}}/{{$core_detail->Logo}}" width="130" height="130" id="imgLogo"
             name="imgLogo">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <table id="table22" style="border-collapse: collapse" class="fontNormal"
                                           width="100%" cellspacing="2" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="2%" valign="top" nowrap="nowrap" align="left"><b>(1)</b></td>
                                            <td class="fontNormalBlue" width="8%" valign="top" nowrap="nowrap"
                                                align="right">RID:
                                            </td>
                                            <td valign="top" align="left">
                                                {{$core_detail->RID}}</td>
                                            <td class="fontNormalBlue" width="14%" valign="top" align="right">
                                                &nbsp;NGO Type:
                                            </td>
                                            <td width="11%" valign="top" nowrap="nowrap" align="left">
                                                {{MyUtility::getNgoStatusName($core_detail->NGOStatusName)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="top" nowrap="nowrap" align="left">&nbsp;</td>
                                            <td class="fontNormalBlue" width="8%" valign="top" nowrap="nowrap"
                                                align="right">
                                                &nbsp;Acronym:&nbsp;</td>
                                            <td width="63%" valign="top" align="left">
                                                {{$core_detail->Acronym}}</td>
                                            <td class="fontNormalBlue" width="14%" valign="top" align="right">NGO
                                                Status:
                                            </td>
                                            <td width="11%" valign="top" nowrap="nowrap" align="left">
                                                {{MyUtility::getNgoStatusName($core_detail->NGOStatusName)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="top" nowrap="nowrap" align="left">&nbsp;</td>
                                            <td class="fontNormalBlue" width="8%" valign="top" nowrap="nowrap"
                                                align="right">
                                                NGO Name:
                                            </td>
                                            <td width="63%" valign="top" align="left">
                                                <b>{{$core_detail->Org_Name_E}}</b></td>
                                            <td class="fontNormalBlue" width="14%" valign="top" nowrap="nowrap"
                                                align="right">
                                                Date Commenced:
                                            </td>
                                            <td width="11%" valign="top" nowrap="nowrap" align="left">
                                                {{MyUtility::z2n($core_detail->DateCommenced)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="fontNormalBlue" valign="top" nowrap="nowrap"
                                                align="right">
                                                &nbsp;</td>
                                            <td colspan="2" class="fontNormalBlue" width="76%" valign="top"
                                                align="right">
                                                &nbsp;Date Questionnaire Completed:
                                            </td>
                                            <td width="11%" valign="top" nowrap="nowrap" align="left">
                                                {{MyUtility::formatKhDate($core_detail->DateQCompleted)}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border-collapse: collapse" id="table23" class="fontNormal"
                                           width="100%" cellspacing="3" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="2%" valign="top" align="left"><b>(2)</b></td>
                                            <td class="fontNormalBlue" width="9%" valign="top" align="right">
                                                Address:
                                            </td>
                                            <td colspan="3" valign="top"
                                                align="left">{{$core_detail->Address_1_E}} </td>
                                        </tr>
                                        <tr>
                                            <td width="2%" valign="top" align="left">&nbsp;</td>
                                            <td class="fontNormalBlue" width="9%" valign="top" align="right">
                                                Province:
                                            </td>
                                            <td width="39%" valign="top" align="left">
                                                {{$province}}
                                            </td>
                                            <td class="fontNormalBlue" width="8%" valign="top" align="right">&nbsp;</td>
                                            <td width="40%" valign="top" align="left">
                                                &nbsp;</td>

                                        </tr>
                                        <tr>
                                            <td width="2%" valign="top" align="left">&nbsp;</td>
                                            <td class="fontNormalBlue" width="8%" valign="top" align="right">District:
                                            </td>
                                            <td width="40%" valign="top" align="left">
                                                {{$district}} </td>

                                            <td class="fontNormalBlue" width="8%" valign="top" align="right">&nbsp;</td>
                                            <td width="40%" valign="top" align="left">
                                                &nbsp;</td>

                                        </tr>
                                        <tr>
                                            <td width="2%" valign="top" align="left">&nbsp;</td>
                                            <td class="fontNormalBlue" width="8%" valign="top" align="right">
                                                Commune:
                                            </td>
                                            <td width="40%" valign="top" align="left">
                                                {{$commnune}}</td>

                                            <td class="fontNormalBlue" width="8%" valign="top" align="right">&nbsp;</td>
                                            <td width="40%" valign="top" align="left">
                                                &nbsp;</td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="border-collapse: collapse" id="table24" class="fontNormal"
                                           width="100%" cellspacing="2" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="18" valign="top"><b>(3)</b></td>
                                            <td class="fontNormalBlue" width="99" valign="top" align="right">
                                                Contact Name:
                                            </td>
                                            <td valign="top" align="left">{{$core_detail->Contact_Name_E}}</td>
                                        </tr>
                                        <tr>
                                            <td width="18" valign="top">&nbsp;</td>
                                            <td class="fontNormalBlue" width="99" valign="top" align="right">
                                                Contact Title:
                                            </td>
                                            <td valign="top" align="left">{{$core_detail->Contact_Title_E}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table id="table25" style="BORDER-COLLAPSE: collapse" class="fontNormal"
                                           width="100%" cellspacing="2" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="18" align="center"><b>(4)</b></td>
                                            <td class="fontNormalBlue" width="97" nowrap="nowrap" align="right">P.O.
                                                Box: [A]
                                            </td>
                                            <td width="293" nowrap="nowrap" align="left">{{$core_detail->PO_Box}}</td>
                                            <td class="fontNormalBlue" width="47" nowrap="nowrap" align="center">[B]
                                            </td>
                                            <td nowrap="nowrap" align="left">{{$core_detail->CCC_Box}}</td>
                                        </tr>
                                        <tr>
                                            <td width="18" align="center">&nbsp;</td>
                                            <td class="fontNormalBlue" width="97" nowrap="nowrap" align="right">Phone:
                                            </td>
                                            <td width="293" nowrap="nowrap" align="left">{{$core_detail->Tel_No}}</td>
                                            <td class="fontNormalBlue" width="47" nowrap="nowrap" align="center">OR</td>
                                            <td nowrap="nowrap" align="left">{{$core_detail->Alt_Tel_No}}</td>
                                        </tr>
                                        <tr>
                                            <td width="18" align="center">&nbsp;</td>
                                            <td class="fontNormalBlue" width="97" nowrap="nowrap" align="right">Fax:
                                            </td>
                                            <td width="293" nowrap="nowrap" align="left">{{$core_detail->Fax_No}}</td>
                                            <td class="fontNormalBlue" width="47" align="right">Email:</td>
                                            <td nowrap="nowrap" align="left">{{$core_detail->eMail}}</td>
                                        </tr>
                                        <tr>
                                            <td width="18" align="center">&nbsp;</td>
                                            <td class="fontNormalBlue" width="97" nowrap="nowrap" align="right">
											Website:</td>
                                            <td width="293" nowrap="nowrap" align="left">
											<a href="{{$core_detail->Website}}" target=_blank> {{$core_detail->Website}}</a></td>
                                            <td class="fontNormalBlue" width="47" align="right">&nbsp;</td>
                                            <td nowrap="nowrap" align="left">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 1px">
                                    <hr style="background-color: #FF0000">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table id="table31" style="border-collapse: collapse" class="fontNormal"
                                           width="100%" cellspacing="1" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="18"><b>(5)</b></td>
                                            <td class="fontNormalBlue" width="96" align="right">Int'l HQ:</td>
                                            <td align="left"> {{$core_detail->HQ_Address}} </td>
                                        </tr>
                                        <tr>
                                            <td width="18">&nbsp;</td>
                                            <td class="fontNormalBlue" width="96" align="right">HQ Country:</td>
                                            <td align="left"> {{$hq}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">


                                    <table id="table27" style="BORDER-COLLAPSE: collapse" class="fontNormal"
                                           width="100%" cellspacing="2" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="1%" valign="top" align="center"><b>(6)</b></td>
                                            <td colspan="6" valign="top" align="left">
                                                <b>&nbsp; Official Registration:</b></td>
                                        </tr>
                                        <tr>
                                            <td width="1%" valign="top" align="center">&nbsp;</td>
                                            <td width="5%" valign="middle" align="right">
                                                <img src="/images/{{getRadio($core_detail->RegistrationWith,2)}}">
                                            </td>
                                            <td width="34%" valign="middle" nowrap="nowrap" align="left">
                                                Ministry of Interior
                                            </td>
                                            <td width="2%" valign="middle" nowrap="nowrap" align="right">
                                                <img src="/images/{{getRadio($core_detail->RegistrationWith,1)}}"></td>
                                            <td width="28%" valign="middle" nowrap="nowrap" align="left">
                                                Council of Minister
                                            </td>
                                            <td class="fontNormalBlue" width="12%" valign="middle" nowrap="nowrap"
                                                align="right">
                                                Date of Registration:
                                            </td>
                                            <td width="15%" valign="middle" nowrap="nowrap"
                                                align="left">{{MyUtility::formatKhDate($core_detail->RegistrationDate)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="1%" valign="top" align="center">&nbsp;</td>
                                            <td width="5%" valign="middle" align="right">
                                                <img src="/images/{{getRadio($core_detail->RegistrationWith,3)}}"></td>
                                            <td width="34%" valign="middle" nowrap="nowrap" align="left">
                                                Ministry of Foreign Affairs, International
                                                Cooperation
                                            </td>
                                            <td width="2%" valign="middle" nowrap="nowrap" align="right">
                                                <img src="/images/{{getRadio($core_detail->RegistrationWith,0)}}"></td>
                                            <td width="28%" valign="middle" nowrap="nowrap" align="left">
                                                NONE
                                            </td>
                                            <td class="fontNormalBlue" width="12%" valign="middle" nowrap="nowrap"
                                                align="right">
                                                Date of Last Expiry:</td>
                                            <td width="15%" valign="middle" nowrap="nowrap"
                                                align="left">{{MyUtility::formatKhDate($core_detail->DateOfLastExpiry)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="1%" valign="top" align="center"></td>
                                            <td width="5%" valign="middle" align="right">
                                                &nbsp;</td>
                                            <td width="34%" valign="middle" nowrap="nowrap" align="left">
                                                &nbsp;</td>
                                            <td width="2%" valign="middle" nowrap="nowrap" align="right">
                                                &nbsp;</td>
                                            <td width="28%" valign="middle" nowrap="nowrap" align="left">
                                                &nbsp;</td>
                                            <td class="fontNormalBlue" width="12%" valign="middle" nowrap="nowrap"
                                                align="right">
                                                Date Expiry:
                                            </td>
                                            <td width="15%" valign="middle" nowrap="nowrap"
                                                align="left">{{MyUtility::formatKhDate($core_detail->RegistrationExpiry)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                    <table style="border-collapse: collapse" id="table28" class="fontNormal"
                                           width="100%" cellspacing="2" cellpadding="2" border="0">
                                        <tbody>
                                        <tr>
                                            <td width="1%" valign="top" align="center"><b>(7)</b></td>
                                            <td valign="middle" align="left"><b>&nbsp; Attachment:&nbsp; </b>
                                                <img src="/images/{{MyUtility::getRadio($core_detail->MOU_Attachment, 1)}}">
                                                YES
                                                <img src="/images/{{MyUtility::getRadio($core_detail->MOU_Attachment, 0)}}">
                                                NO
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="1%" valign="top" align="center">&nbsp;</td>

                                            <td width="5%" align="left">
                                                &nbsp;</td>

                                        </tr>
                                        <tr>
                                            <td width="1%" valign="top" align="center">&nbsp;</td>
                                            <td width="96%" align="left">
                                                @if($core_detail->MOU_Attachment==1)
                                                    <table class="fontNormal"
                                                           style="width: 500; border-collapse:collapse"
                                                           id="tblMouDocument" cellpadding="2" border="1"
                                                           bordercolor="#C0C0C0">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center" bgcolor="#F7F7F7" height="28"
                                                                width="80">No
                                                            </th>
                                                            <th class="text-center" style="width: 450px"
                                                                bgcolor="#F7F7F7" height="28">PDF
                                                                Document
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                        $numtr = 0;
                                                        ?>
                                                        @foreach($mou as $m)

                                                            <tr id="trDoc{{++$numtr}}"
                                                                @if($numtr%2==0) bgcolor="#F0F0F0" @endif >
                                                                <td class="text-center" height="30" align="center"
                                                                    width="80">{{$numtr}}.
                                                                </td>
                                                                <td height="30"
                                                                    style="padding-left: 4px; padding-right: 4px;"
                                                                    width="450">
                                                                    <a href="/assets/ngo_attachment/{{urlencode($RID)}}/{{$m->MOU_PDF}}"
                                                                       target="_blank">{{$m->MOU_PDF}}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="32">

                        <table class="fontNormal" id="table35" width="100%" cellpadding="2" border="0">
                            <tbody>
                            <tr>
                                <td><font color="#0066FF"><b>List Of On-going Project:</b>

                                    </font></td>
                            </tr>

                            <tr>
                                <td>
                                    <table id="table36" style="border-collapse:collapse" class="fontNormal" width="100%"
                                           cellspacing="1" bordercolor="#C0C0C0" border="1" bgcolor="">
                                        <tbody>
                                        <tr>
                                            <th bgcolor="#ECE9D8" height="22"><b>No</b></th>
                                            <th bgcolor="#ECE9D8" height="22"><b>Project Name</b></th>
                                            <th bgcolor="#ECE9D8" height="22"><b>MOU With</b></th>
                                            <th bgcolor="#ECE9D8" height="22"><b>Start Date</b></th>
                                            <th bgcolor="#ECE9D8" height="22"><b>End Date</b></th>
                                            <th width="102" bgcolor="#ECE9D8" height="22"><b>Project Status</b></th>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach($ngo_pro_list as $ngo_pro)
                                            <tr @if($i%2==0) bgcolor="#F0F0F0" @endif >
                                                <td height="22" align="center">{{$i++}}.</td>
                                                <td height="22">{{$ngo_pro->PName_E}}</td>
                                                <td height="22">{{$ngo_pro->Min_Name_E}}</td>
                                                <td height="22" nowrap
                                                    align="center">    {{MyUtility::formatKhDate($ngo_pro->PDateStart)}}
                                                </td>
                                                <td height="22" nowrap
                                                    align="center"> {{MyUtility::formatKhDate($ngo_pro->PDateFinish)}}
                                                </td>
                                                <td width="102" height="22" align="center">On-going</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <a href="#none" onclick="javascrip:window.print()">
                            <img src="/images/print.gif" width="18" border="0" align="absmiddle" height="18">
                            Print
                        </a>
                        <img src="/images/close.jpg" width="18" border="0" height="18"><a href="#none"
                                                                                          onclick="javascrip:window.close()">
                            Close
                        </a></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        &nbsp;</td>
                </tr>
                </tbody>
            </table>

        </div>
    @else

    @endif
@endsection