<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ModelResource;
use App\Models\Brand;
use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Model::class, 'model');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Brand $brand)
    {
        return ModelResource::collection(Model::where('brand_id', $brand->id)->paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exist:brands,id'
        ]);

        if ($model = Model::create($attributes)) {
            return response()->json([
                'message' => 'El modelo se añadió correctamente.',
                'data' => [
                    'id' => $model->id
                ]
            ]);
        }

        return response()->json([
            'message' => "No se pudo añadir el modelo."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Model $model)
    {
        return new ModelResource($model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Model $model)
    {
        $model->fill($request->validate([
            'name' => 'required|string|max:255'
        ]));

        if ($model->isClean()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $model->save();
        return response()->json([
            'message' => "El modelo se actualizó correctamente."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Model $model)
    {
        return response()->json([
            'message' => "Esta acción no es permitida."
        ], 405);
    }
}
