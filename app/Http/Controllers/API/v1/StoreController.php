<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\StoreResource;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Store::class, 'store');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StoreResource::collection(Store::paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $store = Store::create($attributes);
        if ($store) {
            return response()->json([
                'message' => 'La tienda se añadió correctamente.',
                'data' => [
                    'id' => $store->id,
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puedo añadir la tienda."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return new StoreResource($store->load('branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $store->update($attributes);
        return response()->json([
            'message' => 'La tienda se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($store)
    {
        return response()->json([
            'message' => 'Esta acción no es permitida'
        ], 405);
    }
}
