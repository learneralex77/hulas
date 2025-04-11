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
            ['name_en' => 'Mechi', 'name_np' => 'Mechi'],
            ['name_en' => 'Koshi', 'name_np' => 'Koshi'],
            ['name_en' => 'Sagarmatha', 'name_np' => 'Sagarmatha'],
            ['name_en' => 'Janakpur', 'name_np' => 'Janakpur'],
            ['name_en' => 'Bagmati', 'name_np' => 'Bagmati'],
            ['name_en' => 'Narayani', 'name_np' => 'Narayani'],
            ['name_en' => 'Gandaki', 'name_np' => 'Gandaki'],
            ['name_en' => 'Dhaulagiri', 'name_np' => 'Dhaulagiri'],
            ['name_en' => 'Lumbini', 'name_np' => 'Lumbini'],
            ['name_en' => 'Rapti', 'name_np' => 'Rapti'],
            ['name_en' => 'Bheri', 'name_np' => 'Bheri'],
            ['name_en' => 'Karnali', 'name_np' => 'Karnali'],
            ['name_en' => 'Seti', 'name_np' => 'Seti'],
            ['name_en' => 'Mahakali', 'name_np' => 'Mahakali'],
        ]);
    }
}
