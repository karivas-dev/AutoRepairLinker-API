<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BrandResource;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brand');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => 'nullable|string|max:100'
        ]);

        return BrandResource::collection(
            Brand::when($filters['search'] ?? false, function (Builder $query) use ($filters) {
                $query->where('name', 'LIKE', '%'.$filters['search'].'%');
            })->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('brands')]
        ]);

        $brand = Brand::create($attributes);
        if ($brand) {
            return response()->json([
                'message' => 'La marca se añadió correctamente.',
                'data' => [
                    'id' => $brand->id
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puedo añadir la marca."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('brands')->ignore($brand->id)]
        ]);

        $brand->update($attributes);

        return response()->json([
            'message' => "La marca se actualizó correctamente."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json([
            'message' => ''
        ]);

        return response()->json([
            'message' => "Esta acción no es permitida"
        ], 405);
    }
}
