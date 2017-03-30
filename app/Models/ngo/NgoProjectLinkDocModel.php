<?php

namespace App\Models\ngo;
use Illuminate\Database\Eloquent\Model;

class NgoProjectLinkDocModel extends Model
{
    //
    protected $table="tbl_ngo_link_document";
    protected $primaryKey="linkId";
    public $timestamps = false;
    public $incrementing = false;
}
