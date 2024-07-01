<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calamidade extends Model
{
    public const STATUS_PENDENTE = 'PEDENTE';
    
    public const STATUS_REGISTRADA = 'REGISTRADA';
    
    public const STATUS_RECUSADA = 'RECUSADA';

    
    public const ENCHENTE = 'ENCHENTE';

    public const TIROTEIO = 'TIROTEIO';

    public const MASSACRE =  'MASSACRE';

    public const COLAPSO_INFRA = 'COLAPSO_INFRA';

    public const GUERRA = 'GUERRA';


    protected $fillable = [
        'id',
        'name',
        'description',
        'date_start',
        'date_end',
        'tipo',
        'user_id',
        'status',
        'latitude',
        'longitude'
    ];

    public static function listaStatus()
    {
        return [
            self::STATUS_PENDENTE => self::STATUS_PENDENTE,
            self::STATUS_RECUSADA => self::STATUS_RECUSADA,
            self::STATUS_REGISTRADA => self::STATUS_REGISTRADA
        ];
    }

    public static function listaTipos()
    {
        return [
            self::ENCHENTE => self::ENCHENTE,
            self::TIROTEIO => self::TIROTEIO,
            self::MASSACRE => self::MASSACRE,
            self::COLAPSO_INFRA => self::COLAPSO_INFRA,
            self::GUERRA => self::GUERRA
        ];
    }
}
