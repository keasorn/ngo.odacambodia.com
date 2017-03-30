<?php

namespace App\Models\ngo;
use Illuminate\Database\Eloquent\Model;

class NgoProjectDocModel extends Model
{
    //
    protected $table="tbl_ngo_project_doc";
    protected $primaryKey="projectDocId";
    public $timestamps = false;
    public $incrementing = false;
}
