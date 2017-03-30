<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class ProjectStaffModel extends Model
{
    //
    protected $table = "tbl_ngo_project_staff";

    protected $primaryKey ="ProjectStaffId";

    public $timestamps = false;
}
