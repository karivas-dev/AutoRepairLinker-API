<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\BidResource;
use App\Models\Bid;
use App\Models\BidDetails;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Bid::class, 'bid');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|integer|exists:tickets,id',
            'bid_status_id'=> 'required|integer|exists:bid_statuses,id',
            'timespan' => 'required|date',
            'details' => 'required|array|min:1',
            'details.*.name' => 'required|string|max:255',
            'details.*.price' => 'required|numeric|min:0'
        ]);

        $bid = Bid::create([
            ...$request->only([
                'ticket_id',
                'bid_status_id',
                'timespan'
            ]),
            'budget' => collect($request->get('details'))->sum('price')
        ]);

        foreach ($request->get('details') as $detail) {
            BidDetails::create([
                'bid_id' => $bid->id,
                'name' => $detail['name'],
                'price' => $detail['price']
            ]);
        }

        return response()->json([
            'message' => 'La cotización se creo correctamente.',
            'data' => [
                'id' => $bid->id,
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bid $bid)
    {
        return BidResource::make($bid->load('status', 'details', 'replacements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bid $bid)
    {
        $request->validate([
            'ticket_id' => 'required|integer|exists:tickets,id',
            'bid_status_id'=> 'required|integer|exists:bid_statuses,id',
            'timespan' => 'required|date',
            'details' => 'required|array|min:1',
            'details.*.id' => 'nullable|integer|exists:bid_details,id',
            'details.*.name' => 'required|string|max:255',
            'details.*.price' => 'required|numeric|min:0'
        ]);

        $bid->update([
            ...$request->only([
                'ticket_id',
                'bid_status_id',
                'timespan'
            ]),
            'budget' => collect($request->get('details'))->sum('price')
        ]);

        foreach ($request->get('details') as $detail) {
            BidDetails::updateOrCreate([
                'id' => $detail['id'] ?? null,
                'bid_id' => $bid->id,
            ], [
                'name' => $detail['name'],
                'price' => $detail['price']
            ]);
        }

        return response()->json([
            'message' => 'La cotización se actualizo correctamente.',
            'data' => [
                'id' => $bid->id,
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bid $bid)
    {
        $bid->delete();

        return response()->json([
            'message' => 'La cotización se elimino correctamente.',
        ]);
    }
}
