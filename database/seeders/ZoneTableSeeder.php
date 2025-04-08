<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Zone::insert([
            [
                'name' => 'Mechi',
            ],
            [
                'name' => 'Koshi',
            ],
            [
                'name' => 'Sagarmatha',
            ],
            [
                'name' => 'Janakpur',
            ],
            [
                'name' => 'Bagmati',
            ],
            [
                'name' => 'Narayani',
            ],
            [
                'name' => 'Gandaki',
            ],
            [
                'name' => 'Dhaulagiri',
            ],
            [
                'name' => 'Lumbini',
            ],
            [
                'name' => 'Rapti',
            ],
            [
                'name' => 'Bheri',
            ],
            [
                'name' => 'Karnali',
            ],
            [
                'name' => 'Seti',
            ],
            [
                'name' => 'Mahakali',
            ],
        ]);
    }
}
