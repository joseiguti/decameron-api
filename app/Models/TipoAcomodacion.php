<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAcomodacion extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'acomodaciones';

    /**
     * Define la relación con el modelo TipoHabitacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tiposHabitacion()
    {
        return $this->belongsToMany(TipoHabitacion::class, 'tipos_habitacion_acomodaciones', 'acomodacion_id', 'tipo_habitacion_id');
    }
}
