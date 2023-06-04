<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Habitacion;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Obtener la lista de hoteles o los detalles de un hotel específico.
     *
     * @param  int|null  $id_hotel  (Opcional) El ID del hotel a obtener.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id_hotel = null)
    {
        if ($id_hotel) {
            // Obtener los datos del hotel filtrado por id_hotel
            $hotel = DB::table('hoteles')
                ->where('id', $id_hotel)
                ->first();

            // Verificar si el hotel existe
            if (!$hotel) {
                return response()->json(['error' => 'Hotel not found'], 404);
            }

            // Construir la consulta filtrada por id_hotel
            $query = DB::table('habitaciones')
                ->join('tipos_habitacion', 'habitaciones.tipo_habitacion_id', '=', 'tipos_habitacion.id')
                ->join('acomodaciones', 'habitaciones.acomodacion_id', '=', 'acomodaciones.id')
                ->select(
                    'habitaciones.cantidad_habitaciones',
                    'tipos_habitacion.nombre AS tipo_habitacion_nombre',
                    'acomodaciones.nombre AS acomodacion_nombre'
                )
                ->where('habitaciones.hotel_id', $id_hotel)
                ->get();

            $hotel->habitaciones = $query;

            return response()->json($hotel);
        } else {
            // Obtener todos los hoteles sin filtrar
            $hotels = Hotel::all();

            return response()->json($hotels);
        }
    }

    /**
     * Guardar un nuevo hotel con sus habitaciones.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required',
                'direccion' => 'required',
                'ciudad' => 'required',
                'nit' => 'required',
                'num_habitaciones' => 'required|integer',
                'campos' => 'required|array',
                'campos.*.cantidadHabitaciones' => 'required|integer',
                'campos.*.tipoHabitacion' => 'required|integer',
                'campos.*.acomodacion' => 'required|integer',
            ]);

            $nombre = $request->input('nombre');

            // Validar si el nombre del hotel ya existe
            if (Hotel::where('nombre', $nombre)->exists()) {
                return response()->json(['error' => 'El nombre del hotel ya existe'], 400);
            }

            $hotel = Hotel::create($request->only(['nombre', 'direccion', 'ciudad', 'nit', 'num_habitaciones']));

            foreach ($request->campos as $campo) {
                Habitacion::create([
                    'hotel_id' => $hotel->id,
                    'tipo_habitacion_id' => $campo['tipoHabitacion'],
                    'acomodacion_id' => $campo['acomodacion'],
                    'cantidad_habitaciones' => $campo['cantidadHabitaciones'],
                ]);
            }

            return response()->json(['message' => 'Hotel agregado con éxito'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }
}
