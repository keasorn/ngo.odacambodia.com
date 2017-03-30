<?php
use App\Models\ngo\CoreDetailModel;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function() {


    Route::get('/test_getPRN/{RID}', function ($RID) {

        echo \App\Http\Controllers\MyUtility::getNewPRN($RID);

    });
    Route::get('/test_PRN_dis', function () {
        $dataSet = DB::table("v_ngo_sum_amount_disbursement_by_PRN")->orderBy("PRN")->get();
        $dict = array();
        foreach ($dataSet as $row) {
            $key = $row->PRN;
            $value = $row;
            $dict[$key] = $value;
        }
        foreach($dataSet as $row){
            print_r($dict[$row->PRN]->own2014);
        }


    });



});
