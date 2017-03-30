<?php

namespace App\Models\oda\odaadmin;

use Illuminate\Database\Eloquent\Model;

class OdaUserModel extends Model
{
    protected $table = "tbl_password";
    protected $primaryKey = "uid";
    public $timestamps = false;
    public $incrementing = false;
    //
}
