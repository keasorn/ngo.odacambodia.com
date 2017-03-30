<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class ProjectCounterpartModel extends Model
{
    //
    protected $table = "tbl_ngo_project_counterpart";

    protected $primaryKey ="ProjectCounterpartId";

    public $timestamps = false;
}
