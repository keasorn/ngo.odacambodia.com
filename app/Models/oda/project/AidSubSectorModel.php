<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class AidSubSectorModel extends Model
{
    //
    protected $table="aid sub-sector";
    protected $primaryKey="SubSectorCode";
    public $timestamps = false;
    public $incrementing = false;
}
