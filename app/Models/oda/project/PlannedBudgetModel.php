<?php

namespace app\Models\oda\project;
use Illuminate\Database\Eloquent\Model;

class PlannedBudgetModel extends Model
{
    //
    protected $table="tbl_planned budget";
    protected $primaryKey="PlanBudgetID";
    public $timestamps = false;
    public $incrementing = false;
}
