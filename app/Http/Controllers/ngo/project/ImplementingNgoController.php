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
use App\Models\ngo\ImplementingNgo;


class ImplementingNgoController extends Controller
{
    private $ImpModle;
    function insert(Request $request){
        $this->ImpModle=new ImplementingNgo();
        $this->fillColumn($request);
        if($this->ImpModle->save()){
            return true;
        }
    }
 

    function delete(Request $request){
        $this->ImpModle=ImplementingNgo::find($request->impNgoId);
        if($this->ImpModle->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->impNgoId);
        $this->ImpModle=ImplementingNgo::whereIn('impNgoId',$acId);
        if($this->ImpModle->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->ImpModle=ImplementingNgo::find($request->impNgoId);
        $this->fillColumn($request);
        if($this->ImpModle->save()){
            return true;
        }
    }
 
    function fillColumn(Request $request){
        $this->ImpModle->PRN=$request->PRN;
        $this->ImpModle->Year=$request->Year;
        $this->ImpModle->Receipient=$request->Receipient;
        $this->ImpModle->ReceipientNgoProjectName=$request->ReceipientNgoProjectName;
        $this->ImpModle->Amount=$request->Amount;
     }
 

}