<?php

namespace App\Models;

//Eloquent é ORM
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];
}
