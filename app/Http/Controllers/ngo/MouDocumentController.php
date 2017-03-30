<?php

namespace App\Http\Controllers\ngo;

use App\Models\ngo\CoreDetailModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyUtility;
use File;
use App\Models\ngo\MouDocumentModel;

class MouDocumentController extends Controller
{
    private $newDoc;
    private $file;
    private $model;
    private $img;
    private $attahcmentPath = "assets/ngo_attachment/";

    public function uploadFile(Request $request)
    {
        $this->file = $request->file('file');
        $oriFileName = $this->file->getClientOriginalName();
        $RID = $request->RID;
        $destinationPath = $this->attahcmentPath . $RID;
        if (File::exists($destinationPath . "/" . $oriFileName)) {
            return false;
        } else {
            $this->file->move($destinationPath, $oriFileName); // uploading file to given path
            if ($this->insert($request) > -1) {

                return "Upload successfully";
            } else {
                return -1;
            }
        }
    }
    function insert(Request $request)
    {
        $this->newDoc = new MouDocumentModel();
        $this->fillColumn($request);
        if ($this->newDoc->save()) {
            return 1;
        } else {
            return 0;
        }
    }


    function fillColumn(Request $request)
    {
        $this->newDoc->RID = $request->RID;
        $this->newDoc->MOU_PDF = $this->file->getClientOriginalName();
    }

    function removeLogo(Request $request)
    {
        $this->model = CoreDetailModel::find($request->RID);
        $this->model->Logo = "";
        $this->img = $request->file('file');
        $oriFileName = $request->txtAcronym . ".png";
//    $oriFileName = $this->img->getClientOriginalName();
        $RID = $request->RID;
        if ($request->cmbNgoType == 1) {
            $destinationPath = $this->logo . "Foreign NGO";
        } else {
            $destinationPath = $this->logo . "Cambodian NGO";
        }
        if ($this->model->save()) {
            File::delete($destinationPath . "/" . $oriFileName);
            return 1;
        } else {
            return -1;
        }
    }

    function delete(Request $request)
    {
        $file_ids = explode(",", $request->act_ids);
        $this->model = new MouDocumentModel();
        foreach ($file_ids as $project_file_id) {
            $this->model = $this->model->find($project_file_id);
            $RIS = $this->model->RID;
            $project_file_name = $this->model->MOU_PDF;
            File::delete($this->attahcmentPath . $RIS . "/" . $project_file_name);
            $this->model->delete();
        }
        return 1;
    }

    function deleteAll(Request $request)
    {
        $core_update = CoreDetailModel::where('RID', $request->RID)->first();
        $core_update->MOU_Attachment = 0;
        $core_update->save();
        $this->model = new MouDocumentModel();
        $this->model = $this->model->where('RID', $request->RID);
        if ($this->model->delete() > 0) {
            File::deleteDirectory(public_path($this->attahcmentPath . $request->RID));
            return 1;
        } else {
            return 0;
        }

    }
    function mouYes(Request $request)
    {
        $core_update = CoreDetailModel::where('RID', $request->RID)->first();
        $core_update->MOU_Attachment = 1;
        $core_update->save();
    }

}
