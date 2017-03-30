<?php

namespace App\Models\oda\odaadmin;

use Illuminate\Database\Eloquent\Model;

class ProjectAccessModel extends Model
{
    protected $table="tbl_project_access";
    protected $primaryKey="gId";
    public $timestamps = false;
}
