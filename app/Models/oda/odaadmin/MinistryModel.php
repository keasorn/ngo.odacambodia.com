<?php

namespace App\Models\oda\odaadmin;

use Illuminate\Database\Eloquent\Model;

class MinistryModel extends Model
{
    protected $table = "tbl_ministry";

    protected $primaryKey = "Min_ID";
    public $timestamps = false;
}
