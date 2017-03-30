<?php

namespace App\Models\oda\odaadmin;

use Illuminate\Database\Eloquent\Model;

class OrganizationModel extends Model
{
    protected $table="tbl_oda_organizations";
    protected $primaryKey="Ag_ID";
    public $timestamps = false;
}
