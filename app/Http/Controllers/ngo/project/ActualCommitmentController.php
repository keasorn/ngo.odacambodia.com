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
use App\Models\ngo\MultiBilateralCommitmentModel;


class ActualCommitmentController extends Controller
{
    private $actualModel;
    function insertOther(Request $request){
        $this->actualModel=new MultiBilateralCommitmentModel();
        $this->fillColumnOther($request);
        if($this->actualModel->save()){
            return true;
        }
    }


    function insert(Request $request){
        $this->actualModel=new MultiBilateralCommitmentModel();
        $this->fillColumn($request);
        if($this->actualModel->save()){
            return true;
        }
    }

    function delete(Request $request){
        $this->actualModel=MultiBilateralCommitmentModel::find($request->MultiBilateralCommitmentId);
        if($this->actualModel->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->MultiBilateralCommitmentId);
        $this->actualModel=MultiBilateralCommitmentModel::whereIn('MultiBilateralCommitmentId',$acId);
        if($this->actualModel->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->actualModel=MultiBilateralCommitmentModel::find($request->MultiBilateralCommitmentId);
        $this->fillColumn($request);
        if($this->actualModel->save()){
            return true;
        }
    }

    function updateOther(Request $request){
        $this->actualModel=MultiBilateralCommitmentModel::find($request->MultiBilateralCommitmentId);
        $this->fillColumnOther($request);
        if($this->actualModel->save()){
            return true;
        }
    }

    function fillColumn(Request $request){
        $this->actualModel->PRN=$request->PRN;
        $this->actualModel->Year=$request->Year;
        $this->actualModel->SourceName=$request->SourceName;
        $this->actualModel->SourceType=$request->SourceType;
        $this->actualModel->Amount=$request->Amount;
        $this->actualModel->OdaProjectName=$request->OdaProjectName;
     }

    function fillColumnOther(Request $request){
        $this->actualModel->PRN=$request->PRN;
        $this->actualModel->Year=$request->Year;
        $this->actualModel->OtherSourceName=$request->OtherSourceName;
        $this->actualModel->SourceType=$request->OtherSourceType;
        $this->actualModel->Amount=$request->OtherAmount;
        $this->actualModel->NgoProjectName=$request->NgoProjectName;
    }



}