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
use App\Models\ngo\ProjectStaffModel;


class ProjectStaffController extends Controller
{
    private $projectStaffModel;

    function insert(Request $request){
        $this->projectStaffModel=new ProjectStaffModel();
        $this->fillColumn($request);
        if($this->projectStaffModel->save()){
            return true;
        }
    }

    function delete(Request $request){
        $this->projectStaffModel=ProjectStaffModel::find($request->ProjectStaffId);
        if($this->projectStaffModel->delete()){
            return true;
        }
    }

    function deleteAllChecked(Request $request){

        $acId = explode(",", $request->ProjectStaffId);
        $this->projectStaffModel=ProjectStaffModel::whereIn('ProjectStaffId',$acId);
        if($this->projectStaffModel->delete()){
            return true;
        }
    }

    function update(Request $request){
        $this->projectStaffModel=ProjectStaffModel::find($request->ProjectStaffId);
        $this->fillColumn($request);
        if($this->projectStaffModel->save()){
            return true;
        }
    }

    function updateProjectStaff(Request $request){
        $this->projectStaffModel=ProjectStaffModel::find($request->ProjectStaffId);
        $this->fillColumnProjectStaff($request);
        if($this->projectStaffModel->save()){
            return true;
        }
    }

    function fillColumn(Request $request){
        $this->projectStaffModel->PRN=$request->PRN;
        $this->projectStaffModel->Year=$request->Year;
        $this->projectStaffModel->StaffExpatriate=$request->StaffExpatriate;
        $this->projectStaffModel->LocalStaff=$request->LocalStaff;
     }

}