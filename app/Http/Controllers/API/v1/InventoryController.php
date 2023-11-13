<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return InventoryResource::collection(Inventory::where('quantity', '>', 0)
            ->with('replacement', 'branch')->get());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            /*'branch_id' => 'required|integer|exists:branches,id',*/
            'replacement_id' => 'required|integer|exists:replacements,id',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $attributes['branch_id'] = $request->user()->branch->id;
        $inventory = Inventory::create($attributes);

        return response()->json([
            'message' => 'Se añadió al inventario correctamente.',
            'data' => [
                'id' => $inventory->id,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return InventoryResource::make($inventory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $attributes = $request->validate([
            'branch_id' => 'nullable|integer|exists:branches,id',
            'replacement_id' => 'nullable|integer|exists:replacements,id',
            'quantity' => 'nullable|integer|min:0',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        $inventory->update($attributes);

        return response()->json([
            'message' => 'El inventario se actualizó correctamente.',
            'data' => [
                'id' => $inventory->id,
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        return response()->json([
            'message' => 'El inventario no se puede eliminar',
        ]);
    }
}
