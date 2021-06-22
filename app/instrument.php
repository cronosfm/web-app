<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instrument extends Model
{
    protected $fillable = ['name', 'type', 'color'];
}
