<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Garage;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Garage::paginate()->withQueryString();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        if (Garage::create($attributes)) {
            return response()->json([
                'status' => 200,
                'message' => 'El taller se añadió correctamente.'
            ]);
        }

        return response()->json([
            'status' => 500,
            'message' => "No se puedo añadir el taller."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Garage $garage)
    {
        return response()->json([
            'status' => 200,
            'data' => $garage
        ]);
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
            'status' => 200,
            'message' => 'El taller se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garage $garage)
    {
        return response()->json([
            'status' => 405,
            'message' => "Esta acción no es permitida"
        ], 405);
    }
}
