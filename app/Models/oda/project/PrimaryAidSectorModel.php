<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class PrimaryAidSectorModel extends Model
{
    //
    protected $table="primary aid sector";
    protected $primaryKey="SectorCode";
    public $timestamps = false;
    public $incrementing = false;
}
