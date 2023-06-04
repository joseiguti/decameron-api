<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
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
    protected $table = 'habitaciones';

    /**
     * Los atributos asignables en masa.
     *
     * @var array
     */
    protected $fillable = ['hotel_id', 'tipo_habitacion_id', 'acomodacion_id', 'cantidad_habitaciones'];

    /**
     * Obtiene el hotel al que pertenece la habitación.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
