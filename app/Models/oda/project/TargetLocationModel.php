<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class TargetLocationModel extends Model
{
    //
    protected $table="new targetlocation";
    protected $primaryKey="ProjectProvinceId";
    public $timestamps = false;
    public $incrementing = false;
}
