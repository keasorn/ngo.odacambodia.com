<?php

namespace App\Models\oda\project;

use Illuminate\Database\Eloquent\Model;

class ParisDeclarationIndicatiorQuestionnaireModel extends Model
{
    //
    protected $table="tbl_paris declaration indicatior";

    // primary key's column name must be CASE SENSITIVE
    protected $primaryKey="id";
    public $timestamps = false;
    public $incrementing = false;
}
