<?php

namespace App\Http\Controllers\ngo\project;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\ngo\NgoTargetLocationModel;
use App\Http\Controllers\ngo\project\Project01Controller;

class TargetLocationController extends Controller
{
    private $newTarget;
    function insert(Request $request)
    {
        $dqDate=new Project01Controller();
        $this->newTarget = new NgoTargetLocationModel();
        $this->fillColumn($request);
        if ($this->newTarget->save()) {
            $dqDate->dqDate($request->PRN);
            return $request->PRN;
        } else {
            return 0;
        }
    }
    function exits(Request $request){
        $this->newTarget = NgoTargetLocationModel::where("Province",$request->Province)->first();
        return count($this->newTarget);
    }
    function update(Request $request)
    {
        $dqDate=new Project01Controller();
        $this->newTarget = NgoTargetLocationModel::where("ProjectProvinceId",$request->target_id)->first();
        $this->fillColumn($request);
        if ($this->newTarget->save()) {
            $dqDate->dqDate($request->PRN);
            return $request->PRN;
        } else {
            return 0;
        }
    }
    function delete(Request $request)
    {
        $id = explode(",", $request->act_ids);
        $delete = NgoTargetLocationModel::whereIn('ProjectProvinceId', $id)->delete();
        if ($delete) {
            return $id;
        } else {
            return 0;
        }
    }
    function fillColumn(Request $request)
    {
        $this->newTarget->PRN = $request->PRN;
        $this->newTarget->Province = $request->Province;
        $this->newTarget->Percent2016 = $request->Percent2016;
    }
}
