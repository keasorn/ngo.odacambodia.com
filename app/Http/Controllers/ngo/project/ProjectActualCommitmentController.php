<?php
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 11:52 AM
 */

namespace App\Http\Controllers\ngo\project;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ngo\ActualCommitmentModel;

class ProjectActualCommitmentController extends Controller
{
    private $ProjectActualCommitmentModel;
    function insertOther(Request $request){
        $this->ProjectActualCommitmentModel=new ActualCommitmentModel();
        $this->fillColumnOther($request);
        if($this->ProjectActualCommitmentModel->save()){
            return true;
        }
    }


    function insert(Request $request){
        $this->ProjectActualCommitmentModel=new ActualCommitmentModel();
        $this->fillColumn($request);
        if($this->ProjectActualCommitmentModel->save()){
            return true;
        }
    }

    function delete(Request $request){
        $this->ProjectActualCommitmentModel=ActualCommitmentModel::find($request->ActualCommitmentId);
        if($this->ProjectActualCommitmentModel->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->ActualCommitmentId);
        $this->ProjectActualCommitmentModel=ActualCommitmentModel::whereIn('ActualCommitmentId',$acId);
        if($this->ProjectActualCommitmentModel->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->ProjectActualCommitmentModel=ActualCommitmentModel::find($request->ActualCommitmentId);
        $this->fillColumn($request);
        if($this->ProjectActualCommitmentModel->save()){
            return true;
        }
    }

    function updateOther(Request $request){
        $this->ProjectActualCommitmentModel=ActualCommitmentModel::find($request->ActualCommitmentId);
        $this->fillColumnOther($request);
        if($this->ProjectActualCommitmentModel->save()){
            return true;
        }
    }

    function fillColumn(Request $request){
        $this->ProjectActualCommitmentModel->PRN=$request->PRN;
        $this->ProjectActualCommitmentModel->Year=$request->Year;
        $this->ProjectActualCommitmentModel->PlanBudget=$request->PlanBudget;
        $this->ProjectActualCommitmentModel->OwnFund=$request->OwnFund;
        $this->ProjectActualCommitmentModel->RGCFund=$request->RGCFund;
    }


}