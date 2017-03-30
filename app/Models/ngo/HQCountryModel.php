<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class HQCountryModel extends Model
{
    //
    protected $table = "tbl_ngo_lookup_hq_country";

    protected $primaryKey = "HQCode";

    public $timestamps = false;
}
