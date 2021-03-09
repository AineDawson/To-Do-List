<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';
    protected $primaryKey = 'priority';
    public $incrementing = false;
    protected $keyType = 'string';
}
