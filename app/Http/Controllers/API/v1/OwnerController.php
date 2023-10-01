<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\OwnerResource;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'owner');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $branch_id = $request->user()->branch->branchable_id;
        $branch_type = strtolower($request->user()->branch->branchable_type);

        return OwnerResource::collection(
            Owner::when($branch_type == "insurer", function ($query) use ($branch_id) {
                $query->whereRelation('cars.branch', fn($query) => $query->where('branchable_id', $branch_id));
            })->paginate()->withQueryString()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:owners,email|max:255',
            'telephone' => 'required|unique:owners,telephone',
            'district_id' => 'required|exists:districts,id'
        ]);

        $owner = Owner::create($attributes);
        if ($owner) {
            return response()->json([
                'message' => 'El cliente se añadió correctamente.',
                'data' => [
                    'id' => $owner->id,
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puede añadir el cliente."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        return new OwnerResource($owner->load('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $owner->fill($request->validate([
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:owners,email|max:255',
            'telephone' => 'nullable|unique:owners,telephone|max:255',
            'district_id' => 'nullable|exists:districts,id'
        ]));

        if (!$owner->isDirty()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $owner->save();
        return response()->json([
            'message' => 'El cliente se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return response()->json([
            'message' => 'El cliente se eliminó correctamente.'
        ]);
    }
}
