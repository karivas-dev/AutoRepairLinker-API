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
        if ($request->user()->branch->branchable_type == 'Insurer') {
            return new TicketCollection(
                Ticket::whereRelation('insurer', 'insurers.id',
                    $request->user()->branch->branchable_id)->paginate()->withQueryString()
            );
        }

        if ($request->user()->branch->branchable_type == 'Garage') {
            if ($request->user()->isAdmin) {
                return new TicketCollection(
                    Ticket::whereRelation('garage', 'id',
                        $request->user()->branch->branchable_id)->paginate()->withQueryString()
                );
            }
            return new TicketCollection(
                Ticket::whereRelation('garage', 'id',
                    $request->user()->branch->branchable_id)->where('garage_id', $request->user()->branch_id)->paginate()->withQueryString());
        }
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
