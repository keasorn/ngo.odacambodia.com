<?php

namespace App\Models\oda\project;

use Illuminate\Database\Eloquent\Model;

class RunningIDModel extends Model
{
    //
    protected $table="running_id";
    protected $primaryKey="ag_id";
    public $timestamps = false;
    public $incrementing = false;
}
