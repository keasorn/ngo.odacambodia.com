<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\CheckLogin;

Route::group(['middleware'=>['web']],function(){
    Route::get('/list/list_of_ngo', function (Request $request) {
        $ngo_list = DB::table('v_ngo_listing_core_details')->where("NGOStatusName",1)->orderBy('Acronym')->paginate(50);

        //    return $ngo_list;
         $user = session('ngouser');
        $RID = $user->RID;
        $data = array(
            'ngo_list' => $ngo_list,
            'RID' => $RID
        );
       return view("ngo/list/list_of_ngo")->with($data);
    });
});
Route::group(['middleware' => ['web','ngoIsLogin']], function () {


    Route::get('/ajax/list_of_ngo', function (Request $request) {
        $ngo_list = DB::table('v_ngo_listing_core_details')->orderBy('Acronym');
        $NgoType = $request->NgoType;
        $Status=$request->Status;
        $orderBy=$request->orderBy;
        $ap=$request->ap;


        if ($Status == 0 && $NgoType != 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '=' , $NgoType)->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType != 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        } else if ($Status != 0 && $NgoType == 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '!=' , $NgoType)->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType == 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '!=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType != 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '=' , $NgoType)->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType != 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType == 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '!=' , $NgoType)->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType == 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '!=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }
        $ngo_list = $ngo_list->paginate(50);
        $RID = $request->RID;
        $data = array(
            'ngo_list' => $ngo_list,
            'RID' => $RID
        );

        return view('ngo.list.list_form_ngo')->with($data)->render();
    });
    Route::get('/search/list_of_ngo', function (Request $request){
        $ngo_list = DB::table('v_ngo_listing_core_details')->orderBy('Acronym');
        $NgoType = $request->NgoType;
        $Status=$request->Status;
        $orderBy=$request->orderBy;
        $ap=$request->ap;


        if ($Status == 0 && $NgoType != 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '=' , $NgoType)->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType != 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        } else if ($Status != 0 && $NgoType == 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '!=' , $NgoType)->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType == 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '!=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType != 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '=' , $NgoType)->orderBy('Acronym');

        }else if ($Status != 0 && $NgoType != 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '=', $Status)->where('TypeCode', '=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType == 0 && $ap =='ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '!=' , $NgoType)->orderBy('Acronym');

        }else if ($Status == 0 && $NgoType == 0 && $ap != 'ALL') {
            $ngo_list = DB::table('v_ngo_listing_core_details')->where('NGOStatusName', '!=', $Status)->where('TypeCode', '!=', $NgoType)->where($orderBy,'Like',$ap .'%')->orderBy('Acronym');

        }
        $ngo_list = $ngo_list->paginate(50);




        $RID = $request->RID;
        $data = array(
            'ngo_list' => $ngo_list,
            'RID' => $RID
        );

        return view('ngo.list.list_form_ngo')->with($data)->render();
    });
});