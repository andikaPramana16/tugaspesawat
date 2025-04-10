@extends('layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto bg-white rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h4 class="text-lg font-bold">Ticket Details for {{ $flight->flight_code }}</h4>
        <span class="text-lg font-semibold">{{ $count }} Passengers • {{ $boarding }} Boarding</span>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-4">
        <p>{{ $flight->origin }} → {{ $flight->destination }}</p>
        <p>
            Departure:
            <strong>{{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y, H:i') }}</strong>
        </p>
        <p>
            Arrival:
            <strong>{{ \Carbon\Carbon::parse($flight->arrival_time)->translatedFormat('l, d F Y, H:i') }}</strong>
        </p>
    </div>

    {{-- Ticket table --}}
    <table class="w-full ">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 ">No.</th>
                <th class="p-2 ">Name</th>
                <th class="p-2 ">Phone</th>
                <th class="p-2 ">Seat</th>
                <th class="p-2 ">Boarding</th>
                <th class="p-2 ">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr>
                    <td class="p-2 ">{{ $loop->iteration }}</td>
                    <td class="p-2 ">{{ $ticket->passanger_name }}</td>
                    <td class="p-2 ">{{ $ticket->passanger_phone }}</td>
                    <td class="p-2 ">{{ $ticket->seat_number }}</td>
                    <td class="p-2">
                        @if ($ticket->is_boarding)
                            {{ $ticket->boarding_time }}
                        @else
                            <form action="{{ route('tickets.board', $ticket->id) }}" method="POST" onsubmit="return confirm('Confirm boarding for {{ $ticket->passanger_name }}? Boarding can not be undone')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="rounded text-bold bg-gray-500 text-white px-2 py-1">Confirm</button>
                            </form>
                        @endif
                    </td>                    
                    <td class="p-2">
                        @if ($ticket->is_boarding)
                            <button class="px-2 py-1 text-white bg-gray-400 rounded ">
                                Delete
                            </button> 
                        @else 
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Delete ticket for {{ $ticket->passanger_name }}? This cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md bg-gray-600 hover:bg-gray-500 text-white px-2 py-1">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-2">No tickets booked yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="flex justify-center space-x-4 mt-6">
        <a href="/flights">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back
            </button>
        </a>
    </div>
</div>
@endsection
