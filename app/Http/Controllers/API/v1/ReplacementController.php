<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ReplacementResource;
use App\Models\Garage;
use App\Models\Replacement;
use Illuminate\Http\Request;

class ReplacementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Replacement::class, 'replacement');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReplacementResource::collection(Replacement::paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'model_id' => 'required|exists:models,id'
        ]);

        if ($replacement = Replacement::create($attributes)) {
            return response()->json([
                'message' => 'El repuesto se añadió correctamente.',
                'data' => [
                    'id' => $replacement->id
                ]
            ]);
        }

        return response()->json([
            'message' => "No se pudo añadir el repuesto."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Replacement $replacement)
    {
        return new ReplacementResource($replacement->load('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Replacement $replacement)
    {
        $replacement->fill($request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'model_id' => 'nullable|exists:models,id'
        ]));

        if($replacement->isClean()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $replacement->save();
        return response()->json([
            'message' => "El repuesto se actualizó correctamente."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return response()->json([
            'message' => "Esta acción no es permitida."
        ], 405);
    }
}
