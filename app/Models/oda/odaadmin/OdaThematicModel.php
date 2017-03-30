<?php

namespace App\Models\oda\odaadmin;

use Illuminate\Database\Eloquent\Model;

class OdaThematicModel extends Model
{
    protected $table = "tbl_thematic";

    protected $primaryKey = "ThematicID";
    public $timestamps = false;
}
