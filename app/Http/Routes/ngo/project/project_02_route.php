<?php
header('Access-Control-Allow-Origin:*');
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 7:23 AM
 */
use Illuminate\Http\Request;
use App\Http\Controllers\ngo\project\ActualCommitmentController;
use App\Models\ngo\MultiBilateralCommitmentModel;
use App\Http\Controllers\ngo\project\ImplementingNgoController;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\ngo\project\CounterpartController;
use App\Http\Controllers\ngo\project\ProjectTwgController;
use App\Http\Controllers\ngo\project\ProjectActualCommitmentController;
use App\Models\ngo\CoreDetailModel;

Route::group(['middleware' => ['web','ngoIsLogin','userNgoOnly']], function () {
    Route::get('/ngo/project/project_02/source_of_fund', function (Request $request) {
        $PRN = $request->PRN;
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/source_of_fund')->with($data);
    });


    Route::get('/ngo/project/project_02/query_sourceName', function (Request $request) {
        $SourceType = $request->SourceType;
        $data = array(
            'SourceType' => $SourceType
        );
        return view('/ngo/project/project_02/query_sourceName')->with($data);
    });

    Route::get('/ngo/project/project_02/queryOdaPorjectName', function (Request $request) {
        $QuestionnaireModel = DB::table('tbl_oda_new_questionnaire')
            ->select('Record_ID', 'OfficialTitle')
            ->orderBy('OfficialTitle')
            ->where('donor', '=', $request->RID)->get();
        $data = array(
            'QuestionnaireModel' => $QuestionnaireModel
        );

        return view('ngo.project.project_02.OdaProjectName')->with($data);
    });

    Route::get('/ngo/project/project_02/queryNgoPorjectName', function (Request $request) {
        $RID = DB::table("tbl_ngo_core_details")
                    ->select("RID")
                    ->where("Acronym","=",$request->Acronym);

        $ds = DB::table("tbl_ngo_project_main")
                ->select("PName_E")
                ->groupBy("PName_E")
                ->orderBy("PName_E")
                ->whereIn("RID",$RID)->get();
        $data = array(
            'ds'=>$ds,
        );
        return view('ngo.project.project_02.NgoProjectName')->with($data);
    });

    Route::get('/ngo/project/project_02/queryNgoReceipientPorjectName', function (Request $request) {
        $RID = DB::table("tbl_ngo_core_details")
                    ->select("RID")
                    ->where("Acronym","=",$request->Acronym);
        $ds = DB::table("tbl_ngo_project_main")
                ->select("PName_E")
                ->groupBy("PName_E")
                ->orderBy("PName_E")
                ->whereIn("RID",$RID)->get();
        $data = array(
            'ds'=>$ds,
        );
        return view('ngo.project.project_02.NgoReceipientProjectName')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_insert', function (Request $request) {
        $PRN = $request->PRN;

        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/MultiBilateralCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_delete', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/MultiBilateralCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_update', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/MultiBilateralCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/MultiBilateralCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_exist', function (Request $request) {
        $recordCount = MultiBilateralCommitmentModel::where('PRN', $request->PRN)->where('OdaProjectName', $request->OdaProjectName)->where('Year',$request->Year)->count();
        return ($recordCount > 0 ? "true" : "false");
    });


    Route::get('/ngo/project/project_02/listing', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/MultiBilateralCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_other_exist', function (Request $request) {
        $recordCount = MultiBilateralCommitmentModel::where('PRN', $request->PRN)->where('NgoProjectName', $request->NgoProjectName)->where('Year', $request->Year)->count();
        return ($recordCount > 0 ? "true" : "false");
    });


    Route::get('/ngo/project/project_02/actual_commitment_other_insert', function (Request $request) {
        $PRN = $request->PRN;

        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->insertOther($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ngo_source')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_other_update', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->updateOther($request);

        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ngo_source')->with($data);
    });


    Route::get('/ngo/project/project_02/listing_other', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ngo_source')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_other_delete', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ngo_source')->with($data);
    });


    Route::get('/ngo/project/project_02/actual_commitment_other_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $actualCommitment = new ActualCommitmentController();
        $actualCommitment->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ngo_source')->with($data);
    });


    //////////////////////start project implementing ngo/////////////////////////
    Route::get('/ngo/project/project_02/implementing_ngo', function (Request $request) {
        $PRN = $request->PRN;
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });


    Route::get('/ngo/project/project_02/listing_imp', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });


    Route::get('/ngo/project/project_02/implementing_ngo_exist', function (Request $request) {
        $ImpCount = \App\Models\ngo\ImplementingNgo::where('PRN', $request->PRN)->where('ReceipientNgoProjectName', $request->ReceipientNgoProjectName)->where('Year', $request->Year)->count();
        return ($ImpCount > 0 ? "true" : "false");
    });


    Route::get('/ngo/project/project_02/implementing_ngo_save_isFundProvider', function (Request $request) {
        $PRN = $request->PRN;
        $model = ProjectMainModel::find($PRN);
        $model->isFundProvider = $request->isFundProvider;
        $model->save();
        if ($request->isFundProvider == '0') {
            $ImpCount = \App\Models\ngo\ImplementingNgo::where('PRN', $request->PRN)->delete();
        }
    });


    Route::get('/ngo/project/project_02/implementing_ngo_insert', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new ImplementingNgoController();
        $ImpCon->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });


    Route::get('/ngo/project/project_02/implementing_ngo_update', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new ImplementingNgoController();
        $ImpCon->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });

    Route::get('/ngo/project/project_02/implementing_ngo_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ImplementingNgoController();
        $ImpCon->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });


    Route::get('/ngo/project/project_02/implementing_ngo_delete', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ImplementingNgoController();
        $ImpCon->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/implementing_ngo')->with($data);
    });

    //////////////////////end project implementing ngo/////////////////////////

    /////////////////project counterpart///////////////////////////////////////
    Route::get('/project/project_02/get_CounterpartName', function (Request $request) {
        $data = array(
            'CounterType' => $request->CounterType,
        );
        return view('ngo.project/project_02/CounterpartName')->with($data);
    });


    Route::get('/ngo/project/project_02/counterpart_insert', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new CounterpartController();
        $ImpCon->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ProjectCounterpart')->with($data);
    });


    Route::get('/ngo/project/project_02/counterpart_update', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new CounterpartController();
        $ImpCon->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ProjectCounterpart')->with($data);
    });

    Route::get('/ngo/project/project_02/counterpart_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new CounterpartController();
        $ImpCon->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ProjectCounterpart')->with($data);
    });


    Route::get('/ngo/project/project_02/counterpart_delete', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new CounterpartController();
        $ImpCon->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ProjectCounterpart')->with($data);
    });



    Route::get('/ngo/project/project_02/listing_counterpart', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ProjectCounterpart')->with($data);
    });


    Route::get('/ngo/project/project_02/counterpart_exist', function (Request $request) {
        $recordCount = \App\Models\ngo\ProjectCounterpartModel::where('PRN', $request->PRN)->where('CounterType', $request->CounterType)->where('CounterName', $request->CounterName)->count();
        return ($recordCount > 0 ? "true" : "false");
    });

///////////////////////////////////end counterpart//////////////////////////////////////////////


    /////////////////project counterpart///////////////////////////////////////
    Route::get('/ngo/project/project_02/project_twg_insert', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectTwgController();
        $ImpCon->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/projecttwg')->with($data);
    });


    Route::get('/ngo/project/project_02/project_twg_update', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new ProjectTwgController();
        $ImpCon->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/projecttwg')->with($data);
    });

    Route::get('/ngo/project/project_02/project_twg_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectTwgController();
        $ImpCon->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/projecttwg')->with($data);
    });


    Route::get('/ngo/project/project_02/project_twg_delete', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectTwgController();
        $ImpCon->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/projecttwg')->with($data);
    });



    Route::get('/ngo/project/project_02/listing_project_twg', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/projecttwg')->with($data);
    });


    Route::get('/ngo/project/project_02/project_twg_exist', function (Request $request) {
        $recordCount = \App\Models\ngo\ProjectTwgModel::where('PRN', $request->PRN)->where('TWG', $request->TWG)->count();
        return ($recordCount > 0 ? "true" : "false");
    });

///////////////////////////////////end project_twg//////////////////////////////////////////////



///////////////////////////////////end project_twg//////////////////////////////////////////////
    Route::get('/ngo/project/project_02/project_ActualCommitment_insert', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectActualCommitmentController();
        $ImpCon->insert($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ActualCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/project_ActualCommitment_update', function (Request $request) {
        $PRN = $request->PRN;

        $ImpCon = new ProjectActualCommitmentController();
        $ImpCon->update($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ActualCommitment')->with($data);
    });

    Route::get('/ngo/project/project_02/project_ActualCommitment_delete_all', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectActualCommitmentController();
        $ImpCon->deleteAllChecked($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ActualCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/project_ActualCommitment_delete', function (Request $request) {
        $PRN = $request->PRN;
        $ImpCon = new ProjectActualCommitmentController();
        $ImpCon->delete($request);
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ActualCommitment')->with($data);
    });



    Route::get('/ngo/project/project_02/listing_project_ActualCommitment', function (Request $request) {
        $project = DB::table('v_ngo_listing_projects_of_data')->where('PRN', $request->PRN)->first();
        $data = array(
            'project' => $project
        );
        return view('/ngo/project/project_02/ActualCommitment')->with($data);
    });


    Route::get('/ngo/project/project_02/project_ActualCommitment_exist', function (Request $request) {
        $recordCount = \App\Models\ngo\ActualCommitmentModel::where('PRN', $request->PRN)->where('Year', $request->Year)->count();
        return ($recordCount > 0 ? "true" : "false");
    });

///////////////////////////////////end project_twg//////////////////////////////////////////////

});