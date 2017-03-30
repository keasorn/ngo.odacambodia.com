<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo\project;
use App\Models\ngo\ProjectTwgModel;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; ;


class ProjectTwgController extends Controller
{
    private $ProjectTwgModel;
    function insert(Request $request){
        $this->ProjectTwgModel=new ProjectTwgModel();
        $this->fillColumn($request);
        if($this->ProjectTwgModel->save()){
            return true;
        }
    }
 

    function delete(Request $request){
        $this->ProjectTwgModel=ProjectTwgModel::find($request->ProjectTwgId);
        if($this->ProjectTwgModel->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->ProjectTwgId);
        $this->ProjectTwgModel=ProjectTwgModel::whereIn('ProjectTwgId',$acId);
        if($this->ProjectTwgModel->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->ProjectTwgModel=ProjectTwgModel::find($request->ProjectTwgId);
        $this->fillColumn($request);
        if($this->ProjectTwgModel->save()){
            return true;
        }
    }
 
    function fillColumn(Request $request){
        $this->ProjectTwgModel->PRN=$request->PRN;
        $this->ProjectTwgModel->TWG=$request->TWG;
        $this->ProjectTwgModel->TWGDetail=$request->TWGDetail;
     }
 

}