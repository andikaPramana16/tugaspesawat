<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::create(
            [
                'flight_code' => 'JT610',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => '2025-05-01 10:00:00',
                'arrival_time' => '2025-05-01 12:00:00',
            ]
        );


        Flight::create(
            [
                'flight_code' => 'JT650',
                'origin' => 'DPS',
                'destination' => 'CGK',
                'departure_time' => '2025-05-01 08:00:00',
                'arrival_time' => '2025-05-01 10:00:00',

            ]
        );

        Flight::create(
            [
                'flight_code' => 'JT632',
                'origin' => 'DPS',
                'destination' => 'SUB',
                'departure_time' => '2025-05-04 07:00:00',
                'arrival_time' => '2025-05-04 08:00:00',
            ]
        );

        Flight::create(
            [
                'flight_code' => 'JT601',
                'origin' => 'CGK',
                'destination' => 'DPS',
                'departure_time' => '2025-05-04 05:30:00',
                'arrival_time' => '2025-05-04 07:00:00',
            ]
        );

        Flight::create(
            [
                'flight_code' => 'JT605',
                'origin' => 'CGK',
                'destination' => 'SUB',
                'departure_time' => '2025-05-04 07:10:00',
                'arrival_time' => '2025-05-04 08:10:00',
            ]
        );
    }
}
