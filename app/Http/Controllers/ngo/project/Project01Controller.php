<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo\project;

use App\Models\ngo\ProjectMainModel;
use App\Models\oda\project\ProjectLinkDocModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Http\Controllers\MyUtility;

use Carbon\Carbon;
use App\Models\ngo\ProjectLocationModel;

class Project01Controller extends Controller
{
    private $model;
    private $proLocationModel;
    public function dqDate($PRN)
    {
        $this->model = ProjectMainModel::find($PRN);
        $this->mytime = Carbon::now();
        $this->model->DateQCompleted = $this->mytime->toDateTimeString();
        $this->model->save();
    }
    function update(Request $request)
    {
        $this->model = ProjectMainModel::where("PRN", $request->PRN)->first();
        $this->fillColumn($request);
        $this->model->save();
    }

    function updateRemark(Request $request)
    {

        //save field  remark and contact on page disbursement project
            $this->model = ProjectMainModel::where("PRN", $request->PRN)->first();
            $this->fillColumnDisbursement($request);
            $this->model->save();
        //end save field  remark and contact on page disbursement project

    }
    function fillColumnDisbursement(Request $request){
        $this->model->Org_Name_E = $request->Org_Name_E;
        $this->model->Contact_Name_E = $request->Contact_Name_E;
        $this->model->Contact_Title_E = $request->Contact_Title_E;
        $this->model->Tel_No = $request->Tel_No;
        $this->model->eMail = $request->eMail;
        $this->model->Remark = $request->Remark;
    }

    function delete(Request $request)
    {
        $this->model = ProjectMainModel::where("PRN", $request->PRN)->first();
        $this->model->delete();
    }


    function insert(Request $request)
    {
        $user = $request->session()->get('ngouser');
        $IsAdmin= $user->IsAdmin==1;

        if($IsAdmin) $request->RID = $request->adminRID;

        $this->model = new ProjectMainModel();
        $this->fillColumn($request);
        $newPRN = MyUtility::getNewPRN($request->RID);
        $this->model->PRN = $newPRN;

        if ($this->model->save() > 0) {

            return $newPRN;
        }
    }

    function fillColumn(Request $request)
    {



        $this->mytime = Carbon::now();
//        $this->model->Acronym = $request->Acronym;
//        $this->model->Org_Name_E = $request->Org_Name_E;
        $this->model->RID = $request->RID;
        $this->model->ProjectStatusName = $request->cmbProjectStatus;
        $this->model->PName_E = $request->txtPName_E;
//        $this->model->PName_K = $request->PName_K;
        $this->model->ProjectAim = $request->txtProjectAim;
        $this->model->DateQCompleted = $this->mytime->toDateTimeString();
        $this->model->idpNumber = $request->idpNumber;
//        $isFundProvider = $request->isFundProvider;
//        $this->model->StatusPdate = $request->StatusPdate;
//        $this->model->Remark = $request->Remark;
//        $this->model->Dateline = $request->Dateline;
//        $this->model->AgencyE = $request->AgencyE;
//        $this->model->AgencyK = $request->AgencyK;
        $this->model->PDateStart = MyUtility::toMySqlDate($request->txtPDateStart);
        $this->model->PDateFinish = MyUtility::toMySqlDate($request->txtPDateFinish);
        $this->model->MinCode = $request->cmbMinCodeE;
        $this->model->MinRef = $request->txtMinRef;
        $this->model->Docs = $request->rdDocs;
        $this->model->isDocSigned = $request->rdDocSigned;
        $this->model->MDateExpire = MyUtility::toMySqlDate($request->txtMDateExpire);
        $this->model->MDateStart = MyUtility::toMySqlDate($request->txtMDateStart);
    }


    //////Project location /////////////
    function insertProLocation(Request $request)
    {
        $this->proLocationModel = new ProjectLocationModel();


        $this->proLocationFilColumn($request);

        if ($this->proLocationModel->save()) {
            return true;
        } else {
            return false;
        };
    }

    function uploadProLocation(Request $request)
    {
        $this->proLocationModel = ProjectLocationModel::find($request->projectLocationId)->first();
        $this->proLocationFilColumn($request);
        if ($this->proLocationModel->save()) {
            return true;
        } else {
            return false;
        };
    }

    function deleteProLocation(Request $request)
    {

        $this->proLocationModel = ProjectLocationModel::find($request->projectId);
        if ($this->proLocationModel->delete()) {
            return true;
        } else {
            return false;
        };
    }

    function deleteChedkedProLocation(Request $request)
    {

        $id = explode(",", $request->projectId);
        $this->proLocationModel = ProjectLocationModel::whereIn("ProjectLocationId", $id);
        if ($this->proLocationModel->delete()) {
            return true;
        } else {
            return false;
        };
    }

    function proLocationFilColumn(Request $request)
    {
        $this->proLocationModel->ProjectID = $request->PRN;
        $this->proLocationModel->provinceID = $request->cmbProvinceLocation;
        $this->proLocationModel->districtID = $request->cmbDistrictLocation;
        $this->proLocationModel->communeID = $request->cmbCommuneLocation;
        $this->proLocationModel->villageID = $request->cmbVillageLocation;
    }
    ////// end project location////////
}