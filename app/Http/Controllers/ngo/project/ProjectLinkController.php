<?php

namespace App\Http\Controllers\ngo\project;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\project\Project01Controller;
use App\Models\ngo\NgoProjectLinkDocModel;

use DB;

class ProjectLinkController extends Controller
{

    private $newLink;
    function insert(Request $request)
    {

        $dqDate=new Project01Controller();
        $mac_id = DB::table('tbl_ngo_new_targetlocation')->max('ProjectProvinceId');
        $this->newLink = new NgoProjectLinkDocModel();
        $this->fillColumn($request);
        if ($this->newLink->save()) {
            $dqDate->dqDate($request->PRN);
            return $request->PRN;
        } else {
            return 0;
        }
    }

    function update(Request $request)
    {

        $dqDate=new NewQuestionnaireController();
        $this->newLink = NgoProjectLinkDocModel::find($request->linkId);
        $this->fillColumn($request);
        if ($this->newLink->save()) {
            $dqDate->dqDate($request->PRN);
            return $request->PRN;
        } else {
            return 0;
        }
    }
    function delete(Request $request)
    {
        $id = explode(",", $request->act_ids);
        $delete = NgoProjectLinkDocModel::whereIn("linkId",$id)->delete();
        if ($delete) {
            return $id;
        } else {
            return 0;
        }
    }
    function fillColumn(Request $request)
    {
        $this->newLink->PRN = $request->PRN;
        $this->newLink->link = $request->link;
    }
}
