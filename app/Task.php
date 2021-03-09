<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'to-do list';
    protected $primaryKey = 'task';
    public $incrementing = false;
    protected $keyType = 'string';

}
