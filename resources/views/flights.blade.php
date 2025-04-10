@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @foreach ($flights as $flight)
        <div class="relative bg-white shadow-md rounded-md p-4">
            <div class="absolute top-0 left-0 m-2 text-sm font-bold bg-gray-200 px-2 py-1 rounded">
                {{ $flight->flight_code }}
            </div>
            <div class="absolute top-0 right-0 m-2 text-sm bg-gray-200 px-2 py-1 rounded">
                {{ $flight->origin }} → {{ $flight->destination }}
            </div>
            <div class="pt-12">
                <p class="text-gray-600">Departure</p>
                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y, H:i') }}
                </p>
                <p class="text-gray-600 mt-2">Arrival</p>
                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y, H:i') }}
                </p>
                <div class="flex justify-center space-x-4 mt-4">
                    <a href="/flights/book/{{ $flight ->id}}">
                        <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                            Book Ticket
                        </button>
                    </a>
                    <a href="/flights/ticket/{{ $flight->id}}">
                        <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                            View Details
                        </button>
                    </a>
                </div>                
            </div>
        </div>
    @endforeach
</div>
@endsection
