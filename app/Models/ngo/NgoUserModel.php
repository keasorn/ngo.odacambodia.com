<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class NgoUserModel extends Model
{
    //
    protected $table = "tbl_ngo_user";

    protected $primaryKey ="ngo_no";
    public $timestamps = false;
}
