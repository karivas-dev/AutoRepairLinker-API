<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarResource::collection(Car::paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'plates' => 'required|unique:cars|max:255',
            'serial_number' => 'required|max:255',
            'owner_id' => 'required|exists:owners,id',
            'model_id' => 'required|exists:models,id',
            'branch_id' => 'required|exists:branches,id'
        ]);

        if ($car = Car::create($attributes)) {
            return response()->json([
                'message' => 'El auto se añadió correctamente.',
                'data' => [
                    'id' => $car->id,
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puede añadir el auto."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->fill($request->validate([
            'plates' => 'nullable|unique:cars|max:255',
            'serial_number' => 'nullable|max:255',
            'owner_id' => 'nullable|exists:owners,id',
            'model_id' => 'nullable|exists:models,id',
            'branch_id' => 'nullable|exists:branches,id'])
        );

        if (!$car->isDirty()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $car->save();
        return response()->json([
            'message' => 'El auto se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json([
            'message' => 'El auto se eliminó correctamente.'
        ]);
    }
}
