<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class CommuneModel extends Model
{
    //
    protected $table = "commune";

    protected $primaryKey ="communeID";

    public $timestamps = false;
}
