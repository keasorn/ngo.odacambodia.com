<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class ProjectLocationModel extends Model
{
    //
    protected $table = "tbl_ngo_project_locations";

    protected $primaryKey ="ProjectLocationId";

    public $timestamps = false;
}
