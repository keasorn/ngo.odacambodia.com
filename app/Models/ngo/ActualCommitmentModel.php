<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class ActualCommitmentModel extends Model
{
    //
    protected $table = "tbl_ngo_actual_commitment";

    protected $primaryKey ="ActualCommitmentId";

    public $timestamps = false;
}
