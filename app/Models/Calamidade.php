<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calamidade extends Model
{
    public const STATUS_PENDENTE = 'PEDENTE';
    
    public const STATUS_REGISTRADA = 'REGISTRADA';
    
    public const STATUS_RECUSADA = 'RECUSADA';

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
