<?php

namespace App\Http\Controllers\ngo\project;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\project\Project01Controller;

use DB; 

class ThematicMarkerController extends Controller
{
    function insert(Request $request)
    {

        $dqDate=new Project01Controller();
        $save=false;
        $PRN = $request->PRN;
        $delete = DB::table('tbl_ngo_project_thematic_marker')->where("PRN", $PRN)->delete();
        $data_thematic = array(
            ['PRN' => $PRN, 'thematicMarker' => 1, 'thematicLevel' => $request->thematicMarker1, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 2, 'thematicLevel' => $request->thematicMarker2, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 3, 'thematicLevel' => $request->thematicMarker3, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 4, 'thematicLevel' => $request->thematicMarker4, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 5, 'thematicLevel' => $request->thematicMarker5, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 6, 'thematicLevel' => $request->thematicMarker6, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 7, 'thematicLevel' => $request->thematicMarker7, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 8, 'thematicLevel' => $request->thematicMarker8, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 9, 'thematicLevel' => $request->thematicMarker9, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 10, 'thematicLevel' => $request->thematicMarker10, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 11, 'thematicLevel' => $request->thematicMarker11, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 12, 'thematicLevel' => $request->thematicMarker12, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 13, 'thematicLevel' => $request->thematicMarker13, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 14, 'thematicLevel' => $request->thematicMarker14, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 15, 'thematicLevel' => $request->thematicMarker15, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 16, 'thematicLevel' => $request->thematicMarker16, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 17, 'thematicLevel' => $request->thematicMarker17, 'YesOrNo' => 0],
            ['PRN' => $PRN, 'thematicMarker' => 18, 'thematicLevel' => $request->thematicMarker18, 'YesOrNo' => 0]
        );

        $insert = DB::table('tbl_ngo_project_thematic_marker')->insert($data_thematic);
        if($insert){
            $dqDate->dqDate($PRN);
            return true;
        }

    }


}
