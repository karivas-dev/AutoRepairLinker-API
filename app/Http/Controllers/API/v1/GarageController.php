<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GarageResource;
use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GarageResource::collection(Garage::paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $garage = Garage::create($attributes);
        if ($garage) {
            return response()->json([
                'message' => 'El taller se añadió correctamente.',
                'data' => [
                    'id' => $garage->id
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puedo añadir el taller."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Garage $garage)
    {
        return new GarageResource($garage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garage $garage)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $garage->update($attributes);

        return response()->json([
            'message' => 'El taller se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($garage)
    {
        return response()->json([
            'message' => "Esta acción no es permitida"
        ], 405);
    }
}
