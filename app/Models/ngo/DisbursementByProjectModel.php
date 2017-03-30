<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class DisbursementByProjectModel extends Model
{
    //
    protected $table = "tbl_ngo_disbursement_by_project";

    protected $primaryKey ="DisbursementId";

    public $timestamps = false;
}
