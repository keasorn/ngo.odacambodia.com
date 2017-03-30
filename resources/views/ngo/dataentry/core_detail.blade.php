@extends('ngo.layout.with_menu')
<?php
use App\Models\ngo\CoreDetailModel;
use App\Http\Controllers\MyUtility;
use App\Models\ngo\ProvinceModel;
use App\Models\ngo\HQCountryModel;


$topMenuId = "coreDetail";
if (count($ngo_core_detail) > 0) {
    $RID = $ngo_core_detail->RID;
} else {
    $RID = 351;
}
$list_core = CoreDetailModel::select("RID", "Acronym")->orderBy("Acronym")->get();
?>
<?php
$hq_country = HQCountryModel::orderBy('HQ_Country_E')->get();
$province = ProvinceModel::where("ProvinceID", "<>", "90")->orderBy("Province")->get();
$RID = "<New RID>";
$Acronym = "";
$NGOStatusName = "";
$Org_Name_E = "";
$Address_1_E = "";
$Address_2_E = "";
$Address_3_E = "";
$Address_1_K = "";
$Address_2_K = "";
$Address_3_K = "";
$PO_Box = "";
$CCC_Box = "";
$Tel_No = "";
$Alt_Tel_No = "";
$Fax_No = "";
$eMail = "";
$Website = "";
$Contact_Name_E = "";
$Contact_Title_E = "";
$Contact_Name_K = "";
$Contact_Title_K = "";
$DateCommenced = "";
$HQ_Address = "";
$Date_Register = "";
$TypeCode = "";
$HQ_CountryCode = "";
$ProvinceCode = 12;
$DistrictCode = 1201;
$CommuneCode = 120101;
$Logo = "";
$DateQCompleted = "";
$RegistrationWith = "";
$RegistrationDate = "";
$RegistrationExpiry = "";
$DateOfLastExpiry = "";
$MOU_Attachment = "";
$MOU_PDF = "";

if (count($ngo_core_detail) > 0) {
    $RID = $ngo_core_detail->RID;
    $Acronym = $ngo_core_detail->Acronym;
    $NGOStatusName = $ngo_core_detail->NGOStatusName;
    $Org_Name_E = $ngo_core_detail->Org_Name_E;
    $Address_1_E = $ngo_core_detail->Address_1_E;
    $Address_2_E = $ngo_core_detail->Address_2_E;
    $Address_3_E = $ngo_core_detail->Address_3_E;
    $Address_1_K = $ngo_core_detail->Address_1_K;
    $Address_2_K = $ngo_core_detail->Address_2_K;
    $Address_3_K = $ngo_core_detail->Address_3_K;
    $PO_Box = $ngo_core_detail->PO_Box;
    $CCC_Box = $ngo_core_detail->CCC_Box;
    $Tel_No = $ngo_core_detail->Tel_No;
    $Alt_Tel_No = $ngo_core_detail->Alt_Tel_No;
    $Fax_No = $ngo_core_detail->Fax_No;
    $eMail = $ngo_core_detail->eMail;
    $Website = $ngo_core_detail->Website;
    $Contact_Name_E = $ngo_core_detail->Contact_Name_E;
    $Contact_Title_E = $ngo_core_detail->Contact_Title_E;
    $Contact_Name_K = $ngo_core_detail->Contact_Name_K;
    $Contact_Title_K = $ngo_core_detail->Contact_Title_K;
    $DateCommenced = $ngo_core_detail->DateCommenced;
    $HQ_Address = $ngo_core_detail->HQ_Address;
    $Date_Register = $ngo_core_detail->Date_Register;
    $TypeCode = $ngo_core_detail->TypeCode;
    $HQ_CountryCode = $ngo_core_detail->HQ_CountryCode;
    $ProvinceCode = $ngo_core_detail->ProvinceCode;
    $DistrictCode = $ngo_core_detail->DistrictCode;
    $CommuneCode = $ngo_core_detail->CommuneCode;
    $Logo = $ngo_core_detail->Logo;
    $DateQCompleted = $ngo_core_detail->DateQCompleted;
    $RegistrationWith = $ngo_core_detail->RegistrationWith;
    $RegistrationDate = $ngo_core_detail->RegistrationDate;
    $RegistrationExpiry = $ngo_core_detail->RegistrationExpiry;
    $DateOfLastExpiry = $ngo_core_detail->DateOfLastExpiry;
    $MOU_Attachment = $ngo_core_detail->MOU_Attachment;
    $MOU_PDF = $ngo_core_detail->MOU_PDF;

}
?>
@section('content')

    <form id="myform" method="POST" name="myform">
    @if(!$isNewNGO)
        <div align="center">
            <table border="0" width="99%" cellpadding="2">
                <tr>
                    <td>
                        <p align="right">Quick Jump:
                            <select style="visibility:visible;" id="cmbAcronymTop" name="cmbAcronymTop"
                                    class="fontNormal"
                                    size="1" onchange="CoreDetailQJChange(this.value)">
                                @foreach($list_core as $core)
                                    <option value="{{$core->RID}}">
                                        {{$core->Acronym}}</option>
                                @endforeach
                            </select>
                    </td>
                </tr>
            </table>
        </div>
        <table style="border-collapse: collapse;" id="table6" width="99%" cellpadding="0" border="0"
               class="margin-auto">
            <tbody>
            <tr>
                <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px"
                    class="fontNormalBlue"
                    nowrap="" align="left">
                    <b>
                        <a href="#none">
                            <font color="#FF0066 " class="red">Core Detail</font></a>
                        >
                        <a href="/dataentry/list_of_active_project?RID={{$RID}}" onclick=""><font color="#114DFF"
                                                                                                  class="blue">List of
                                On-going
                                Projects</font></a>
                    </b></td>
                <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px"
                    class="fontNormalBlue"
                    nowrap="" align="left">
                    <p align="right">
                        <a href="/report/coredetail/report_core_detail?RID={{$RID}}" target="_blank" onclick="
				this.href = '../report/coredetail/report_core_detail?RID='+ ById('cmbRID').value
			" class="fontnormal">
                            <img src="/images/Preview.gif" width="15" border="0" align="absbottom" height="15">
                            Preview</a></td>
            </tr>
            </tbody>
        </table>

    @endif
    <p>
        <div align="center">
            <table border="0" width="99%" cellpadding="2"
                   style="border-left:0px solid #CCCCCC; border-top:0px solid #CCCCCC; border-collapse: collapse; border-right-color:#CCCCCC; border-bottom-color:#CCCCCC"
                   cellspacing="2">
                <tr>
                    <td width="43" align="center"
                        style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                        <b>(1)</b></td>
                    <td class="fontNormalBlue" width="109" nowrap="" align="right"
                        style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                        <font color="#114DFF">RID:
                        </font>
                    </td>
                    <td align="left" width="40%"
                        style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                        <input name="RID" id="RID" value="{{$RID}}" readonly=""
                               class="fontNormal" size="25" type="text"></td>
                    <td align="right" width="85"
                        style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
    <p align="right">NGO Status:
        </td>
    <td align="left" width="197"
        style="border-left:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; border-right-color:#CCCCCC">
        <select name="cmbNgoStatus" size="1" class="fontNormal"
                id="cmbNgoStatus">
            <option value="1">Active</option>
            <option value="3" selected="">Not Reported</option>
            <option value="4" selected="">No Active</option>
            <option value="2">Close</option>
        </select></td>
    <td align="center" width="242"
        style="border-left:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; border-right-color:#CCCCCC; border-top-color:#CCCCCC"
        colspan="2" rowspan="5">
        @if(!$isNewNGO)
        <img src="/assets/logo/{{MyUtility::getPathLogo($TypeCode)}}/{{$Logo}}" width="130" height="130" id="imgLogo"
             name="imgLogo">

        <p>
            <input type="file" name="img_logo" id="img_logo" accept="image/gif, image/jpeg, image/png" size="20"
                   style="display: none;"></p>

        <p>&nbsp;<input type="button" value="Browse Logo" id="btnBrowseLogo"
                        onclick="document.getElementById('img_logo').click();"/><input type="button" value="Use Logo"
                                                                                       name="btnUploadeLogo"
                                                                                       id="btnUploadeLogo"
                                                                                       onclick="uploadLogo(this.value)">
      @endif
    </td>

    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">Acronym: </font>
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtAcronym" id="txtAcronym" value="{{$Acronym}}"
                   class="fontNormal" maxlength="15" size="25"
                   onkeyup="acronym_onChange()" type="text"><font
                    color="#FF0000">*</font></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">NGO Type:
        </td>
        <td style="border-left:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; border-right-color:#CCCCCC">
            <select name="cmbNgoType" size="1" id="cmbNgoType" onchange="
				var ngoType = this.value
				var flag = byId('imgNgoType')
				flag.style.visibility = 'visible'
				if (ngoType==1) {
					flag.src = '/images/globe_flag.jpg'
				}
				else if(ngoType==2){
					flag.src = '/images/cmb_flag.jpg'
				}
				else {
					flag.style.visibility='hidden'
				}
			" class="fontNormal">
                <option value="1">Foreign NGO</option>
                <option value="2" selected="">Cambodian NGO</option>
                <option value="3" selected="">Association</option>
            </select><img id="imgNgoType" style="visibility:visible"
                          src="/images/cmb_flag.jpg" align="absmiddle"
                          height="17"></td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">NGO Name:</font></td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtOrg_Name_E" id="txtOrg_Name_E"
                   value="{{$Org_Name_E}}" style="width:95%"
                   class="fontNormal" maxlength="200" type="text"><font
                    color="#FF0000">*</font></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">Date
            Commenced:
        </td>
        <td style="border-left:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; border-right-color:#CCCCCC">
            <select name="cmbDateCommenced" id="cmbDateCommenced" size="1"
                    class="fontNormal">
                <option value=""></option>@for($i=0;$i<=71;$i++)
                    <option value="{{1979+$i}}">{{1979+$i}}
                    </option>@endfor
            </select></td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-top:medium none #CCCCCC; border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>

        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; ">
            <font color="#800080">
                @if($isNewNGO)
                    <b>User name: </b>@endif
            </font></b></td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            @if($isNewNGO)
                <input name="txtUid" id="txtUid" size="25" maxlength="15"
                       style="color: rgb(128, 0, 0);"
                       type="text">
            @endif
        </td>
        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; "
            nowrap>
            Date Questionnaire Completed:
        </td>
        <td style="border-left:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; border-right-color:#CCCCCC">
            <input name="txtDateQCompleted" id="txtDateQCompleted"
                   value="{{MyUtility::formatKhDate($DateQCompleted)}}"
                   readonly=""
                   class="fontNormal"
                   size="10"
                   style="text-align: center" type="text"></td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-top:medium none #CCCCCC; border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right"
            style="border-top:medium none #CCCCCC; border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <p align="right"><span id="tdPwd"><b>
                        <font color="#800080">
                            @if($isNewNGO)
                                Password:
                            @endif
                        </font></b></span></td>
        <td style="border-top:medium none #CCCCCC; border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            @if($isNewNGO)
                <input name="txtPwd" id="txtPwd" size="25" maxlength="15"
                       style="color: rgb(128, 0, 0);"
                       type="text">
            @endif
        </td>
        <td align="right"
            style="border-top:medium none #CCCCCC; border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-top:medium none #CCCCCC; border-left:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; border-right-color:#CCCCCC">
            &nbsp;</td>
    </tr>

    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>(2)</b></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">Address: </font>
        </td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <input name="txtAddress_1_E" id="txtAddress_1_E"
                   value="{{$Address_1_E}}" style="width:150px"
                   class="fontNormal"
                   maxlength="50" type="text">
            <input name="txtAddress_2_E" id="txtAddress_2_E"
                   value="{{$Address_2_E}}" style="width:90"
                   class="fontNormal"
                   maxlength="50" type="text">
            <input name="txtAddress_3_E" id="txtAddress_3_E"
                   value="{{$Address_3_E}}"
                   style="width:90" class="fontNormal" maxlength="50"
                   type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">Province: </font>
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            <select size="1" onchange="refreshDistrict(this.value)"
                    class="fontNormal"
                    name="cmbProvinceCode" id="cmbProvinceCode"
                    style="width: 150px">@foreach($province as $pro)
                    <option value="{{$pro->ProvinceID}}">{{$pro->Province}}
                    </option>@endforeach


            </select></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">District:</font></td>
        <td width="40%" align="left" id="spanDistrict" style="border:medium none #CCCCCC; padding:2px; "></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">Commune: </font>
        </td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>(3)</b></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <p align="right"><font color="#114DFF">Contact Name: </font>
        </td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <input name="txtContact_Name_E" id="txtContact_Name_E"
                   value="{{$Contact_Name_E}}" class="fontNormal"
                   maxlength="50"
                   size="50" type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">&nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">
            <p align="right"><font color="#114DFF">Contact Title:</font></td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">
            <input name="txtContact_Title_E" id="txtContact_Title_E"
                   value="{{$Contact_Title_E}}" class="fontNormal"
                   maxlength="50" size="50"
                   type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            height="27">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>(4)</b></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <font color="#114DFF">P.O. Box:
                <b>[A]</b></font></td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <input name="txtPO_BOX" id="txtPO_BOX" value="{{$PO_Box}}"
                   class="fontNormal"
                   maxlength="50" type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>[B]</b></td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <input name="txtCCC_BOX" id="txtCCC_BOX" value="{{$CCC_Box}}"
                   class="fontNormal" maxlength="50" type="text"></td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">
            <font color="#114DFF">Phone:
            </font>
        </td>
        <td width="40%" align="left" id="spanCommune" style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtTel_No" id="txtTel_No" value="{{$Tel_No}}"
                   class="fontNormal" maxlength="10" type="text"></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; ">OR
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtAlt_Tel_No" id="txtAlt_Tel_No"
                   value="{{$Alt_Tel_No}}"
                   class="fontNormal" maxlength="10" type="text"></td>
        <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px">
            &nbsp;</td>
        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; ">
            <font color="#114DFF">Fax:
            </font>
        </td>
        <td width="40%" align="left" id="spanCommune"
            style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtFax_No" id="txtFax_No" value="{{$Fax_No}}"
                   class="fontNormal"
                   maxlength="10" type="text"></td>
        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; ">
            Email:
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            <input name="txtemail" id="txtemail" value="{{$eMail}}"
                   class="fontNormal" maxlength="50" type="text"></td>
        <td style="border:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <font color="#114DFF">Website:</font></td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <input name="txtWebsite" id="txtFax_No0" value="{{$Website}}"
                   class="fontNormal"
                   maxlength="50" type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>(5)</b></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <font color="#114DFF">International
                HQ:
            </font>
        </td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <input maxlength="255" name="txtHQ_Address" id="txtHQ_Address"
                   value="{{$HQ_Address}}" class="fontNormal" size="50"
                   type="text"></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <font color="#114DFF">HQ Country:</font></td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            <select id="cmbHQCountryE" name="cmbHQCountryE"
                    class="fontNormal"
                    size="1">
                <option value="null"></option>@foreach($hq_country as $hq)
                    <option value="{{$hq->HQCode}}">{{$hq->HQ_Country_E}}
                    </option>@endforeach

            </select></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC"><b>(6)</b></td>
        <td align="left"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC" colspan="2">
            <font color="#114DFF"><b>Official Registration</b></font></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; " bordercolor="#CCCCCC">&nbsp;</td>
        <td width="40%" align="left" id="spanCommune" style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">
            <input value="2" name="rdRegistrationWith"
                   id="rdRegistrationWithMOI" type="radio"><label
                    for="rdRegistrationWithMOI">
                Ministry of Interior</label><input name="rdRegistrationWith" value="1"
                                                   id="rdRegistrationWithCOM" type="radio"><label
                    for="rdRegistrationWithCOM">
                Council of Ministers</label></td>
        <td align="right" style="border:medium none #CCCCCC; padding:2px; " bordercolor="#CCCCCC">Date of Registration:
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; " bordercolor="#CCCCCC">
            <div id="RegistrationDate"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtRegistrationDate" id="txtRegistrationDate"
                       value="{{MyUtility::formatKhDate($RegistrationDate)}}"
                       readonly="" class="fontNormal text-left" size="10"
                       style="text-align: center" type="text">
                                                            <span class="input-group-addon"
                                                                  style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
        </td>
        <td style="border:medium none #CCCCCC; padding:2px; " bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px"
            bordercolor="#CCCCCC">&nbsp;</td>
        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td width="40%" align="left" id="spanCommune"
            style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">
            <input name="rdRegistrationWith" value="3"
                   id="rdRegistrationWithMFA" type="radio"><label
                    for="rdRegistrationWithMFA">
                Ministry of Foreign Affairs, International Cooperation</label><input name="rdRegistrationWith" value="0"
                                          id="rdRegistrationWithNONE" type="radio"
                                          onclick="RegistrationWithNONE()" checked><label
                    for="rdRegistrationWithNONE" onclick="RegistrationWithNONE()">
                NONE</td>
        <td align="right"
            style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">Date of Last Extend:</td>
        <td style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">

            
            <div id="DateOfLastExpiry"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtDateOfLastExpiry"
                       id="txtRegistrationExpiry"
                       value="{{MyUtility::formatKhDate($DateOfLastExpiry)}}"
                       readonly="" class="fontNormal text-left" size="10"
                       style="text-align: center" type="text"><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
</td>
        <td style="border:medium none #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px"
            bordercolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td width="40%" align="left" id="spanCommune"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">
            </label></td>
        <td align="right"
            style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">Date Expiry:
        </td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">

            <div id="RegistrationExpiry"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtRegistrationExpiry"
                       id="txtRegistrationExpiry"
                       value="{{MyUtility::formatKhDate($RegistrationExpiry)}}"
                       readonly="" class="fontNormal text-left" size="10"
                       style="text-align: center" type="text"><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
        </td>
        <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
        <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; "
            bordercolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="7" align="center" style="padding:2px; border-style:none; border-width:medium; ">
            &nbsp;</td>
    </tr>
    <tr>
        <td width="43" align="center"
            style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <b>(7)</b></td>
        <td colspan="6" align="right"
            style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
            <p align="left"><font color="#114DFF"><b>Attachment: </b>
                    Legal Document (MOU, Ministry or Department Partner
                    Agreement)</font></td>
    </tr>
    @if(!$isNewNGO)
        <tr>
            <td width="43" align="center"
                style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                &nbsp;</td>
            <td align="right" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td width="40%" align="left" id="spanCommune" style="border:medium none #CCCCCC; padding:2px; ">
                <input name="rdMOUAttachment"
                       onclick="mouDoc(this.value)" value="1"
                       id="rdMOUAttachmentYes" type="radio"><label
                        for="rdMOUAttachmentYes">
                    YES </label>
                <input name="rdMOUAttachment" value="0"
                       id="rdMOUAttachmentNo"
                       type="radio"
                       onclick="mouDoc(this.value)" checked><label
                        for="rdMOUAttachmentNo">
                    NO</label></td>
            <td align="right" style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td style="border:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
            <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                &nbsp;</td>
        </tr>

        <tr>
            <td width="43" align="center"
                style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                &nbsp;</td>
            <td align="right"
                style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                &nbsp;</td>
            <td id="mou_document" colspan="3"
                style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                @include('ngo.dataentry.mou_document_form')
                <p>&nbsp;</td>
            <td style="border-left:medium none #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                &nbsp;</td>
            <td style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:1px solid #CCCCCC; padding:2px; ">
                &nbsp;</td>
        </tr>
        @endif
        </table>
        </div>

        {!! csrf_field() !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <br>
        <div class="text-center">
            <button type="reset" id="BntSave" name="BntSave1" class="fontNormal">
                <img src="/images/undo.png" width="16" border="0" align="absmiddle" height="16">
                Reset
            </button>
            <button type="button" id="BntSave" name="BntSave" class="fontNormal" onclick="saveAllCoreDetail()">
                <img src="/images/save_all.gif" width="17" border="0" align="absmiddle" height="16">
                Save All
            </button>
            <button onclick="location.href='/list/list_of_project';" type="button" id="bntCancelCoreDetail"
                    class="fontNormal"
                    name="bntCancelCoreDetail">
                <img src="/images/finish.png" width="16" border="0" align="absmiddle" height="16">
                Finish
            </button>
        </div>

        <script type="text/javascript">

            function RegistrationWithNONE() {
                $("#txtRegistrationDate").val("")
                $("#txtRegistrationExpiry").val("")
                $("#txtDateOfLastExpiry").val("")
            }
            function refreshDistrict(provinceId) {
                var data = '?provinceId=' + provinceId;
                Ajax_UpdatePanelAsync("/data_entry/core_detail/location/get_district_combobox", data, "spanDistrict", true);
                $("#cmbDistrictCode").change();
            }

            function refreshCommune(districtId) {
                var data = '?districtId=' + districtId;
                Ajax_UpdatePanelAsync("/data_entry/core_detail/location/get_commune_combobox", data, "spanCommune", true);
            }

            function registrationWith(id) {
                if (id == 1) {
                    byId('rdRegistrationWithCOM').checked = true;
                } else if (id == 2) {

                    byId('rdRegistrationWithMOI').checked = true;

                } else if (id == 3) {

                    byId('rdRegistrationWithMFA').checked = true;

                } else if (id == 0) {
                    byId('rdRegistrationWithNONE').checked = true;
                }
            }

            function attachmentNo(id) {
                if (id == 1) {
                    byId('rdMOUAttachmentYes').checked = true;
                } else {
                    byId('rdMOUAttachmentNo').checked = true;
                    byId("tblMouDocument").style.display = 'none';
                }

            }
            function acronym_onChange() {

                var RID = byid("RID").value
                if (RID == "<New RID>") {
                    byid("txtUid").value = byid("txtAcronym").value
                    byid("txtPwd").value = byid("txtAcronym").value
                }
                else {
                }


            }

        </script>
        <script type="text/javascript">
            function uploadLogo(val) {
                var file_data = $('#img_logo').prop('files')[0];
                if (file_data == null) {
                } else {
                    // images only
                    var file_name = file_data['name']
                    var ext = file_name.split('.').pop().toLowerCase();

                    var form_data = new FormData();
                    form_data.append('image_file', file_data);
                    form_data.append('RID', "{{$RID}}");
                    form_data.append('txtAcronym', $("#txtAcronym").val());
                    form_data.append('typeCode', '{{$TypeCode}}');
                    if (val == "Use Logo") {

                        $.ajax({
                            url: '/dataentry/upload_logo',
                            dataType: 'text',  // what to expect back from the PHP script, if anything
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            async: true,
                            success: function (response, status) {
                                if (response == 1) {
                                    alert("File is already exist");
                                } else {
                                    if (response != "") {
                                        $("#btnUploadeLogo").val("Delete Logo");
                                    }

                                }
                            },
                            error: function (xhr, status, error) {
                                alert(error)
                            }
                        });
                    } else {
                        var data = "?RID=" + '{{$RID}}'
                        Ajax_getResult("/dataentry/delete_logo", data);
                        $('#imgLogo').attr('src', "");
                        $('#btnBrowseLogo').val('Browse Logo')
                        $("#btnUploadeLogo").val("Use Logo");
                        byid("btnUploadeLogo").style.display = "none";
                    }

                }
            }


            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgLogo').attr('src', e.target.result);

                        byid("btnUploadeLogo").style.display = "";
                        $('#btnBrowseLogo').val('Change Logo')
                        $("#btnUploadeLogo").val("Use Logo");
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#img_logo").change(function () {
                readURL(this);
            });
            function mouDoc(id) {
                id = id == 1;
                var data = '?RID=' + "{{$RID}}";
                if (!id) {
                    var answer = confirm("Are you sure to change?");
                    if (answer) {
                        Ajax_UpdatePanel("/dataentry/mou_doc/delete_all", data, "mou_document", false);
                    } else {
                        byId("rdMOUAttachmentYes").checked = true;
                    }
                } else {
                    Ajax_UpdatePanel("/dataentry/mou_doc/if_yes", data, "mou_document", true);
                }
            }
            $(function () {
                $('#PDateStart').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });

                $('#RegistrationDate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });
                $('#DateOfLastExpiry').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });
                $('#RegistrationExpiry').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });
            });
            function checkFill() {
                if ($("#txtAcronym").val() == "") {
                    byId('txtAcronym').title = 'Acronym could not be blank';
                    $('#txtAcronym').tooltip('show')
                    $('#txtAcronym').focus()
                    return false;
                }
                if ($("#txtOrg_Name_E").val() == "") {
                    byId('txtOrg_Name_E').title = 'NGO Name could not be blank';
                    $('#txtOrg_Name_E').tooltip('show')
                    $('#txtOrg_Name_E').focus()
                    return false;
                }
                @if($isNewNGO)
                  if ($("#txtUid").val() == "") {
                    byId('txtUid').title = 'User Name could not be blank';
                    $('#txtUid').tooltip('show')
                    $('#txtUid').focus()
                    return false;
                }
                if ($("#txtPwd").val() == "") {
                    byId('txtPwd').title = 'Password could not be blank';
                    $('#txtPwd').tooltip('show')
                    $('#txtPwd').focus()
                    return false;
                }
                @endif
                return true;
            }
            function saveAllCoreDetail() {
                if (!checkFill()) {
                    return;
                } else {
                    $("#myform").attr("action", "/dataentry/core_detail/save");
                    $("#myform").submit();
                }
                ;
            }
            ;
            function CoreDetailQJChange(val) {
                window.location = "/dataentry/core_detail_readonly?Acronym=" + val;
            }
            ;
            function coreInit() {
                $("#cmbAcronymTop").val('{{$RID}}');
                $("#cmbProvinceCode").val({{$ProvinceCode}});
                refreshDistrict({{$ProvinceCode}})
                $("#cmbDistrictCode").val({{$DistrictCode}});
                refreshCommune({{$DistrictCode}});
                ById("cmbCommuneCode").value = "{{$CommuneCode}}";
                var Logo = '{{$Logo}}';

                @if(!$isNewNGO)
                registrationWith({{$RegistrationWith}});
                attachmentNo({{$MOU_Attachment}});
                if (Logo != "") {
                    $("#btnBrowseLogo").val("Change Logo");
                    $("#btnUploadeLogo").val("Delete Logo");
                } else {

                    byid("btnUploadeLogo").style.display = "none";
                    $('#btnBrowseLogo').val('Browse Logo');
                }
                @endif
                $("#cmbNgoStatus").val({{$NGOStatusName}});
                $("#cmbNgoType").val({{$TypeCode}});


                $("#cmbDateCommenced").val({{$DateCommenced}});
                $("#cmbHQCountryE").val({{$HQ_CountryCode}});


            }
            coreInit();
        </script>

@endsection