<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'tipos_habitacion';

    /**
     * Define la relación con el modelo TipoAcomodacion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function acomodaciones()
    {
        return $this->belongsToMany(TipoAcomodacion::class, 'tipos_habitacion_acomodaciones', 'tipo_habitacion_id', 'acomodacion_id');
    }
}
