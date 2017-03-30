<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class NewDisbursementModel extends Model
{
    //
    protected $table="new actual and planned disbursements";
    protected $primaryKey="DisbID";
    public $timestamps = false;
    public $incrementing = false;
}
