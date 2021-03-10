<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskPriority extends Model
{
    protected $table = 'task-priorities';
    //protected $primaryKey = ['name','priority'];
    public $incrementing = false;
    //protected $keyType = 'string';
    public $timestamps = false;
}
