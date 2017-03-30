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
use App\Models\ngo\ProjectCounterpartModel;


class CounterpartController extends Controller
{
    private $CounterpartModel;
    function insert(Request $request){
        $this->CounterpartModel=new ProjectCounterpartModel();
        $this->fillColumn($request);
        if($this->CounterpartModel->save()){
            return true;
        }
    }
 

    function delete(Request $request){
        $this->CounterpartModel=ProjectCounterpartModel::find($request->ProjectCounterpartId);
        if($this->CounterpartModel->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->ProjectCounterpartId);
        $this->CounterpartModel=ProjectCounterpartModel::whereIn('ProjectCounterpartId',$acId);
        if($this->CounterpartModel->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->CounterpartModel=ProjectCounterpartModel::find($request->ProjectCounterpartId);
        $this->fillColumn($request);
        if($this->CounterpartModel->save()){
            return true;
        }
    }
 
    function fillColumn(Request $request){
        $this->CounterpartModel->PRN=$request->PRN;
        $this->CounterpartModel->CounterType=$request->CounterType;
        $this->CounterpartModel->CounterName=$request->CounterName;
     }
 

}