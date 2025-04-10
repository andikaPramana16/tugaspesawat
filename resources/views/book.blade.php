@extends('layouts.app')
@section('content')
<div class="p-6 max-w-5xl mx-auto bg-white rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h4 class="text-lg font-bold">Ticket Booking For</h4>
        <span class="text-lg font-semibold">{{ $flights->flight_code }}</span>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-4">
        <p>{{ $flights->origin }} → {{ $flights->destination }}</p>
        <p>
            Departure:
            <strong>{{ \Carbon\Carbon::parse($flights->departure_time)->translatedFormat('l, d F Y, H:i') }}</strong>
        </p>
        <p>
            Arrival:
            <strong>{{ \Carbon\Carbon::parse($flights->arrival_time)->translatedFormat('l, d F Y, H:i') }}</strong>
        </p>
    </div>

    <form action="{{ url('/ticket/submit') }}" method="POST">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flights->id }}">

        <div class="mb-4">
            <label for="passanger_name" class="block text-sm font-medium text-gray-700">Passenger Name:</label>
            <input type="text" id="passanger_name" name="passanger_name"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                   required>
        </div>

        <div class="mb-4">
            <label for="passanger_phone" class="block text-sm font-medium text-gray-700">Passenger Phone:</label>
            <input type="text" id="passanger_phone" name="passanger_phone"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                   required>
        </div>

        <div class="mb-4">
            <label for="seat_number" class="block text-sm font-medium text-gray-700">Seat Number:</label>
            <input type="text" id="seat_number" name="seat_number"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"
                   required>
        </div>

        <div class="flex justify-center space-x-4 mt-6">
            <a href="/flights">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cancel
                </button>
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Book Ticket
            </button>
        </div>
    </form>
</div>
@endsection
