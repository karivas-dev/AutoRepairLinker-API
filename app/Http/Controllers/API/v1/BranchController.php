<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BranchResource;
use App\Http\Resources\v1\BrandResource;
use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Branch::class, 'branch');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return BranchResource::collection(Branch::where('branchable_id', $request->user()->branch->branchable_id )->paginate()->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|max:255',
            'telephone' => 'required|max:100',
            'main' => 'required|boolean',
            'district_id' => 'required|exists:districts,id',
            'branchable_id' => 'required',
            'branchable_type' => 'required',
        ]);

        if ($branch = Branch::create($attributes)) {
            return response()->json([
                    'message' => 'La sucursal se añadió correctamente.',
                    'data' => [
                        'id' => $branch->id
                    ]
                ]
            );
        }

        return response()->json([
            'message' => "No se pudo añadir la sucursal."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return new BranchResource($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->fill($request->validate([
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|max:100',
            'main' => 'nullable|boolean',
            'district_id' => 'nullable|exists:districts,id',
            'branchable_id' => 'nullable',
            'branchable_type' => 'nullable',
        ]));

        if ($branch->isClean()) {
            return response()->json([
                'message' => 'No hay datos que actualizar.'
            ]);
        }

        $branch->save();
        return response()->json([
            'message' => "La sucursal se actualizó correctamente."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->json([
            'message' => 'La sucursal se eliminó correctamente.'
        ]);
    }
}
