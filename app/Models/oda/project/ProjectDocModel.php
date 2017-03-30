<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class ProjectDocModel extends Model
{
    //
    protected $table="tbl_project doc";
    protected $primaryKey="projectDocId";
    public $timestamps = false;
    public $incrementing = false;
}
