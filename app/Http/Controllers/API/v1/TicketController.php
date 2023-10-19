<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Ticket::class, 'ticket');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $branch_id = $request->user()->branch->branchable_id;
        $branch_type = strtolower($request->user()->branch->branchable_type);

        return TicketResource::collection(
            Ticket::whereRelation($branch_type, $branch_type.'s.id')
        );
       /* return TicketResource::collection(
            Ticket::whereRelation($branch_type, $branch_type.'s.id', $branch_id)
                ->when(!$request->user()->isAdmin && $branch_type == 'garage', function ($query) use ($request) {
                    $query->where('branch_id', $request->user()->branch_id);
                })->with(['ticket_status', 'garage'])->paginate()->withQueryString()
        );*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'description' => 'required|string|max:255',
            'garage_id' => 'nullable|integer|exists:garages,id',
            'car_id' => 'required|integer|exists:cars,id',
            'branch_id' => 'nullable|integer|exists:branches,id',
            'ticket_status_id' => 'required|integer|exists:ticket_statuses,id'
        ]);

        $ticket = Ticket::create($attributes);
        if ($ticket) {
            return response()->json([
                'message' => 'El taller se añadió correctamente.',
                'data' => [
                    'id' => $ticket->id
                ]
            ]);
        }

        return response()->json([
            'message' => "No se puedo añadir el taller."
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket->load(['user', 'garage', 'car', 'branch']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $attributes = $request->validate([
            'user_id' => 'nullable|integer|exists:users,id',
            'description' => 'nullable|string|max:255',
            'garage_id' => 'nullable|integer|exists:garages,id',
            'car_id' => 'nullable|integer|exists:cars,id',
            'branch_id' => 'nullable|integer|exists:branches,id',
            'ticket_status_id' => 'nullable|integer|exists:ticket_statuses,id'
        ]);

        $ticket->update($attributes);

        return response()->json([
            'message' => 'El ticket se actualizó correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json([
            'message' => 'Ticket eliminado correctamente.'
        ]);
    }
}
