<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\BidReplacement;
use App\Models\Inventory;
use Illuminate\Http\Request;

class BidReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Esta acción no es permitida'
        ], 405);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'bid_id' => 'required|integer|exists:bids,id',
            'replacement_id' => 'required|integer|exists:replacements,id',
            'quantity' => 'required|integer',
            'price' => 'required'
        ]);

        $inventory = Inventory::where('id', $request->inventory_id)->first();

        if ($request->quantity > $inventory->quantity)
        {
            return response()->json([
                'message' => 'No hay suficientes repuestos disponibles.',
            ]);
        }

        $bidreplacement = BidReplacement::create($attributes);

        return response()->json([
            'message' => 'Se añadió el repuesto correctamente.',
            'data' => [
                'id' => $bidreplacement->id,
                'inventory' => $inventory
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BidReplacement $bidReplacement)
    {
        return response()->json([
            'message' => 'Esta acción no es permitida'
        ], 405);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidReplacement $bidReplacement)
    {
        return response()->json([
            'message' => 'Esta acción no es permitida'
        ], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidReplacement $bidReplacement)
    {
        return response()->json([
            'message' => 'Esta acción no es permitida'
        ], 405);
    }
}
