<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passanger_name' => 'required|string|max:255',
            'passanger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3',
        ]);
    
        Ticket::create($validated);
    
        return redirect('/flights')->with('success', 'Ticket booked successfully!');
    }
    public function board($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->is_boarding = true;
        $ticket->boarding_time = now();
        $ticket->save();

        return redirect()->back()->with('success', 'Passenger has boarded.');
    }

    public function destroy($id)
    {
        Ticket::destroy($id);
        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
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

}
