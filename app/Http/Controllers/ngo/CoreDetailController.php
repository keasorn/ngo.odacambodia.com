<?php

namespace App\Http\Controllers\ngo;

use App\Models\ngo\CoreDetailModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyUtility;

use Carbon\Carbon;
use App\Models\ngo\NgoUserModel;

class CoreDetailController extends Controller
{
    private $core_detail;
    private $ngo_user;
    private $logo = "assets/logo/";

    private $mytime;
    public static function getCoreDetailDictionary()
    {
        $coreDetail=CoreDetailModel::select("RID")
        ->addSelect("Org_Name_E")
        ->get();
        $dict = array();
        foreach ($coreDetail as $row) {
            $key = $row->RID;
            $value = $row;
            $dict[$key] = $value;
        }
        return $dict;

    }
    public function updateCoreDetail(Request $request)
    {
        $this->core_detail = new CoreDetailModel();
        $RID = $request->RID;
        $this->core_detail = CoreDetailModel::find($RID);
        $this->fillColumnCoreDetail($request);
        if ($this->core_detail->update()) {
            return $this->core_detail->RID;
        } else {
            return "update false";
        }
    }

    public function InsertCoreDetail(Request $request)
    {
        $this->core_detail = new CoreDetailModel();
        $this->ngo_user = new NgoUserModel();
        $maxRID = CoreDetailModel::max("RID") + 1;
        $this->core_detail->RID = $maxRID;
        $this->fillColumnCoreDetail($request);

        $this->ngo_user->RID = $maxRID;
        $this->fillcolumnNgoUser($request);
        if ($this->core_detail->save()) {
            $this->ngo_user->save();
            return $maxRID;
        } else {
            return "update false";
        }
    }

    function fillcolumnNgoUser($request)
    {
        $this->ngo_user->uid = $request->txtUid;
        $this->ngo_user->pwd = $request->txtPwd;
        $this->ngo_user->IsAdmin = 0;
        $this->ngo_user->IsDisabled = 0;
    }

    function fillColumnCoreDetail($request)
    {
        $this->mytime = Carbon::now();
        $this->core_detail->Acronym = $request->txtAcronym;
        $this->core_detail->NGOStatusName = $request->cmbNgoStatus;
        $this->core_detail->Org_Name_E = $request->txtOrg_Name_E;
        $this->core_detail->Address_1_E = $request->txtAddress_1_E;
        $this->core_detail->Address_2_E = $request->txtAddress_2_E;
        $this->core_detail->Address_3_E = $request->txtAddress_3_E;

        // Ort Mean in Form
//       $this->core_detail->Address_1_K=$request->txtAddress_1_K;
//       $this->core_detail->Address_2_K=$request->txtAddress_2_K;
//       $this->core_detail->Address_3_K=$request->txtAddress_3_K;


        $this->core_detail->PO_Box = $request->txtPO_BOX;
        $this->core_detail->CCC_Box = $request->txtCCC_BOX;
        $this->core_detail->Tel_No = $request->txtTel_No;
        $this->core_detail->Alt_Tel_No = $request->txtAlt_Tel_No;
        $this->core_detail->Fax_No = $request->txtFax_No;
        $this->core_detail->eMail = $request->txtemail;
        $this->core_detail->Website = $request->txtWebsite;
        $this->core_detail->Contact_Name_E = $request->txtContact_Name_E;
        $this->core_detail->Contact_Title_E = $request->txtContact_Title_E;
//       $this->core_detail->Contact_Name_K=$request->txtContact_Name_K;
//       $this->core_detail->Contact_Title_K=$request->txtContact_Title_K;
        $this->core_detail->DateCommenced = $request->cmbDateCommenced;
        $this->core_detail->HQ_Address = $request->txtHQ_Address;
//       $this->core_detail->Date_Register=$request->Date_Register;
        $this->core_detail->TypeCode = $request->cmbNgoType;
        $this->core_detail->HQ_CountryCode = $request->cmbHQCountryE;

        $this->core_detail->ProvinceCode = $request->cmbProvinceCode;
        $this->core_detail->DistrictCode = $request->cmbDistrictCode;
        $this->core_detail->CommuneCode = $request->cmbCommuneCode;


////       $this->core_detail->Logo=$request->Logo;
        $this->core_detail->DateQCompleted = $this->mytime->toDateTimeString();
        $this->core_detail->RegistrationWith = $request->rdRegistrationWith;
        $this->core_detail->RegistrationDate = MyUtility::toMySqlDate($request->txtRegistrationDate);
        $this->core_detail->RegistrationExpiry = MyUtility::toMySqlDate($request->txtRegistrationExpiry);
        $this->core_detail->DateOfLastExpiry = MyUtility::toMySqlDate($request->txtDateOfLastExpiry);
        $this->core_detail->MOU_Attachment = $request->rdMOUAttachment;
//       $this->core_detail->MOU_PDF=$request->MOU_PDF;
    }


    function deleteLogo(Request $request){

        $this->model = CoreDetailModel::find($request->RID);
        $this->model->Logo = "";
        if ($this->model->save()) {
            return 1;
        } else {
            return -1;
        }
    }

    function uploadLogo(Request $request)
    {
        $this->img = $request->file('image_file');
        $oriFileName = $request->txtAcronym . ".png";
        $RID = $request->RID;
        if ($request->typeCode == 1) {
            $destinationPath = $this->logo . "Foreign NGO";
        } else if($request->typeCode==2) {
            $destinationPath = $this->logo . "Cambodian NGO";
        }else{
            $destinationPath = $this->logo . "Association";
        }
        $this->img->move($destinationPath, $oriFileName); // uploading file to given path
        if ($this->insertLogo($request) > -1) {
            return "ok";
        } else {
            return -1;
        }
    }

    function insertLogo(Request $request)
    {
        $this->model = CoreDetailModel::find($request->RID);
        $this->model->Logo = $request->txtAcronym . ".png";
        if ($this->model->save()) {
            return 1;
        } else {
            return -1;
        }
    }

}
