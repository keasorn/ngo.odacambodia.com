<?php

namespace App\Models\oda\project;

use Illuminate\Database\Eloquent\Model;

class DonorPartnerModel extends Model
{
    //
    protected $table="donor partners";
    protected $primaryKey="DonorPartneRID";
    public $timestamps = false;
    public $incrementing = false;
}
