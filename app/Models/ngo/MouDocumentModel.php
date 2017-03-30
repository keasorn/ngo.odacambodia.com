<?php

namespace App\Models\ngo;

use Illuminate\Database\Eloquent\Model;

class MouDocumentModel extends Model
{
    //
    protected $table = "tbl_ngo_mou";
    protected $primaryKey ="pdfId";
    public $timestamps = false;
}
