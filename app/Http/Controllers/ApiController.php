<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * Obtiene los parámetros necesarios para la API.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getParameters()
    {
        // Obtener los tipos de habitación con sus acomodaciones
        $tiposHabitacion = TipoHabitacion::select('id', 'nombre')
            ->with('acomodaciones:id,nombre')
            ->get();

        return response()->json($tiposHabitacion);
    }
}
