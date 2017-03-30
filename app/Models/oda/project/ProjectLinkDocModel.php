<?php

namespace App\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class ProjectLinkDocModel extends Model
{
    //
    protected $table="tbl_link document";
    protected $primaryKey="linkId";
    public $timestamps = false;
    public $incrementing = false;
}
