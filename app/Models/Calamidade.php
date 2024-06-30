<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calamidade extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'date_start',
        'date_end',
        'user_id',
        'status',
    ];
}
