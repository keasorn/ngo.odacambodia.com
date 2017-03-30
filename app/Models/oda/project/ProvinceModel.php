<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    //
    protected $table="province";
    protected $primaryKey="ProvinceID";
    public $timestamps = false;
    public $incrementing = false;
}
