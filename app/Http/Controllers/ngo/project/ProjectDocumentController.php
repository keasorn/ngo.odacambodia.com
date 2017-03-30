<?php

namespace App\Http\Controllers\ngo\project;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request; 
use App\Models\ngo\NgoProjectDocModel;

use File;
use DB;

class ProjectDocumentController extends Controller
{

    private $newDoc;
    private $attahcmentPath = "assets/ngo_attachment/";
    private $file;
    private $model;

    public function index()
    {
        return view('uploadfile');
    }

    public function uploadFile(Request $request)
    {
        $this->file = $request->file('file'); 

        $oriFileName = $this->file->getClientOriginalName();
        $ngo_id = $request->PRN;
        $destinationPath = $this->attahcmentPath . $ngo_id; // upload path

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
        $this->newDoc = new NgoProjectDocModel();
        $this->fillColumn($request);
        if ($this->newDoc->save()) {
            return $request->PRN;
        } else {
            return 0;
        }
    }
    function delete(Request $request)
    {
        $file_ids = explode(",",$request->act_ids);
        $this->model = new NgoProjectDocModel();
        foreach ($file_ids as $project_file_id) {
            $this->model =  $this->model->find($project_file_id);
            $PRN = $this->model->PRN;
            $project_file_name = $this->model->pdfDoc;
            File::delete($this->attahcmentPath . $PRN . "/" . $project_file_name);
            $this->model->delete();
        }

    }

    function fillColumn(Request $request)
    {
        $this->newDoc->PRN = $request->PRN;
        $this->newDoc->pdfDoc = $this->file->getClientOriginalName();;
    }
}
