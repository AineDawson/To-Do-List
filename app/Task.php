<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'to-do list';
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';

}
