<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class MultiBilateralCommitmentModel extends Model
{
    //
    protected $table = "tbl_ngo_multibilateral_commitment";

    protected $primaryKey ="MultiBilateralCommitmentId";

    public $timestamps = false;
}
