<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Store::paginate()->withQueryString();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        if (Store::create($attributes)) {
            return response()->json([
                'status' => 200,
                'message' => 'La tienda se añadió correctamente.'
            ]);
        };

        return response()->json([
            'status' => 500,
            'message' => "No se puedo añadir la tienda."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return response()->json([
            'status' => 200,
            'data' => $store
        ]);
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
            'status' => 200,
            'message' => 'La tienda se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        return response()->json([
            'status' => 405,
            'message' => 'Esta acción no es permitida'
        ]);
    }
}
