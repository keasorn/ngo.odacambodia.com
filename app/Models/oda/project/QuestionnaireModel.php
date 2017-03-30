<?php

namespace App\Models\oda\project;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireModel extends Model
{
    //
    protected $table="new questionnaire";

    // primary key's column name must be CASE SENSITIVE
    protected $primaryKey="Record_ID";
    public $timestamps = false;
    public $incrementing = false;
}
