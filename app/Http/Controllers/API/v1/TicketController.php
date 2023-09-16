<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Insurer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Resources\v1\TicketResource;
use App\Http\Resources\v1\TicketCollection;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $branch_id = $request->user()->branch->branchable_id;
        $branch_type = strtolower($request->user()->branch->branchable_type);

        return TicketResource::collection(
            Ticket::whereRelation($branch_type,  $branch_type.'s.id', $branch_id)
                ->when(!$request->user()->isAdmin && $branch_type == 'garage', function ($query) use($request) {
                    $query->where('branch_id', $request->user()->branch_id);
                })->with(['ticket_status'])->paginate()->withQueryString()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
