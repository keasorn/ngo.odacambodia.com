<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class ImplementingNgo extends Model
{
    //
    protected $table = "tbl_ngo_implementing_ngo";

    protected $primaryKey ="impNgoId";

    public $timestamps = false;
}
