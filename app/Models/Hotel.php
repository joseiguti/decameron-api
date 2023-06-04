<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    /**
     * Indica si el modelo tiene marcas de tiempo.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'hoteles';

    /**
     * Los atributos asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'nit',
        'num_habitaciones',
    ];
}
