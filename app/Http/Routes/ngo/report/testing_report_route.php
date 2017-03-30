<?php
header('Access-Control-Allow-Origin:*');
use Illuminate\Http\Request;
use App\Models\ngo\CoreDetailModel;
use App\Models\ngo\ProjectMainModel;
use App\Http\Controllers\ngo\ReportController;

Route::group(['middleware' => ['web', 'ngoIsLogin']], function () {

});