<?php
header('Access-Control-Allow-Origin:*');
/**
 * Created by PhpStorm.
 * User: NUM_k_000
 * Date: 7/9/2016
 * Time: 7:23 AM
 */
use App\Http\Controllers\MyUtility;
use Illuminate\Http\Request;
use App\Models\ngo\CoreDetailModel;
use App\Http\Controllers\ngo\CoreDetailController;
use App\Http\Controllers\ngo\MouDocumentController;
use App\Models\ngo\ProjectMainModel;

Route::group(['middleware' => ['web', 'ngoIsLogin', 'userNgoOnly']], function () {

    Route::get('/dataentry/edit/', function (Request $request) {
        $RID = $request->RID;
        $ngo_core_detail = CoreDetailModel::find($RID);
        Session::put("ngo_core_detail", $ngo_core_detail);
        return redirect('/dataentry/core_detail/');
    });

    Route::get("/dataentry/new", function () {
        return redirect('/dataentry/');
    });

    Route::get("/data_entry/core_detail/location/get_district_combobox", function (Request $request) {
        $data = array(
            'provinceId' => $request->provinceId,
        );
        return view("ngo.dataentry.district_form")->with($data);
    });

    Route::get("/data_entry/core_detail/location/get_commune_combobox", function (Request $request) {
        $data = array(
            'districtId' => $request->districtId,
        );
        return view("ngo.dataentry.commune_form")->with($data);
    });



    Route::post("/dataentry/core_detail/save", function (Request $request) {

        $core_detail = new CoreDetailController();
        if ($request->RID == "<New RID>") {
            $RID = $core_detail->InsertCoreDetail($request);
        } else {
            $RID = $core_detail->updateCoreDetail($request);
        }
        return redirect('/dataentry/core_detail?RID=' . $RID);
    });

    Route::post("/dataentry/mou_doc/upload", function (Request $request) {
        $mou_insert = new MouDocumentController();

        $mou = $mou_insert->uploadFile($request);
        if (!$mou) {
            return 1;
        } else {

            $data = array(
                'RID' => $request->RID,
            );
            return view('ngo.dataentry.mou_document_form')->with($data);

        }
    });

    Route::get("/dataentry/mou_doc/delete", function (Request $request) {
        $mou = new MouDocumentController();
        $mou->delete($request);
        $data = array(
            'RID' => $request->RID,
        );
        return view('ngo.dataentry.mou_document_form')->with($data);
    });

    Route::get("/dataentry/mou_doc/delete_all", function (Request $request) {
        $mou = new MouDocumentController();
        $mou->deleteAll($request);
        $data = array(
            'RID' => $request->RID,
        );

        return;
    });
    Route::get("/dataentry/mou_doc/if_yes", function (Request $request) {
        $mou = new MouDocumentController();
        $mou->mouYes($request);
        $data = array(
            'RID' => $request->RID,
        );

        return view('ngo.dataentry.mou_document_form')->with($data);
    });
    Route::post("/dataentry/upload_logo", function (Request $request) {
        $mou = new CoreDetailController();
      return  $mou->uploadLogo($request);
    });
    Route::get("/dataentry/delete_logo", function (Request $request) {
        $mou = new CoreDetailController();
      return  $mou->deleteLogo($request);
    });
    Route::post("/dataentry/remove_logo", function (Request $request) {
        $mou = new MouDocumentController();
        $mou->removeLogo($request);
    });


    Route::post('/dataentry/delete/list_of_active_project', function (Request $request) {

        $model = ProjectMainModel::where("PRN", $request->PRN)->first();
        $model->delete();
        return redirect('/dataentry/list_of_active_project?RID=' . $request->RID);
    });


});
Route::group(['middleware' => ['web', 'ngoIsLogin',]], function () {

    Route::get('/dataentry/core_detail', function (Request $request) {
        $user = session('ngouser');
        $IsAdmin = $user->IsAdmin==1;
        $uid = $user->uid;
        if ($uid == "Visitor") {
            if(!$request->RID==0){

                return   redirect("/dataentry/core_detail_readonly?Acronym=".$request->RID);
            }else{
                return   redirect("/dataentry/core_detail_readonly?Acronym=351");
            }
        }

        if (!$request->isNewNGO) {
            if ($request->RID != "") {
                $RID = $request->RID;
            } else {
                if($IsAdmin){
                    $ngo_core_detail = CoreDetailModel::find("351");
                    $data = array(
                        "ngo_core_detail" => $ngo_core_detail,
                        "isNewNGO" => $request->isNewNGO
                    );
                    return view('ngo.dataentry.core_detail')->with($data);
                }
                $RID = $user->RID;
            }
            $ngo_core_detail = CoreDetailModel::find($RID);
            $data = array(
                "ngo_core_detail" => $ngo_core_detail,
                "isNewNGO" => $request->isNewNGO
            );
        } else {
            $data = array(
                "ngo_core_detail" => null,
                "isNewNGO" => $request->isNewNGO
            );
        }
        return view('ngo.dataentry.core_detail')->with($data);
    });

    Route::get('/dataentry/core_detail_readonly', function (Request $request) {
        $user = session('ngouser');
        $RID = $user->RID;
        $IsAdmin = $user->IsAdmin == 1;
        if (($RID == ($request->Acronym)) || $IsAdmin) {
            return redirect("/dataentry/core_detail?RID=" . $request->Acronym);
        } else {
            $ngo_core_detail = CoreDetailModel::where("RID", "=", $request->Acronym)->first();
            $data = array(
                "ngo_core_detail" => $ngo_core_detail,
                "RID" => $request->Acronym,
                "isNewNGO" => $request->isNewNGO
            );
            return view('ngo.dataentry.core_detail_read_only')->with($data);

        }
    });

    Route::get("/dataentry/list_of_active_project", function (Request $request) {
        $data = array(
            "RID" => $request->RID
        );
        return view("ngo.dataentry.list_of_active_project")->with($data);
    });

    Route::get('/dataentry/list_active_project', function (Request $request) {
        $data = array(
            "RID" => $request->RID
        );
        return view('ngo.dataentry.active_project')->with($data);
    });
});