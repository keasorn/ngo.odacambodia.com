<?php

namespace App\Models\ngo;
use Illuminate\Database\Eloquent\Model;

class NgoTargetLocationModel extends Model
{
    //
    protected $table="tbl_ngo_new_targetlocation";
    protected $primaryKey="ProjectProvinceId";
    public $timestamps = false;
    public $incrementing = false;
}
