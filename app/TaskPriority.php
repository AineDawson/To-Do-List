<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskPriority extends Model
{
    protected $table = 'priorities';
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
}
