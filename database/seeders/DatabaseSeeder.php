<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lapangan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // =======================
        //      SEED ADMIN      
        // =======================
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        // =======================
        //      SEED LAPANGAN
        // =======================
        // SEED LAPANGAN INDOOR
        Lapangan::create([
            'lokasi' => 'indoor',
            'jenis' => 'reguler',
            'price' => '300000'
        ]);
        Lapangan::create([
            'lokasi' => 'indoor',
            'jenis' => 'matras',
            'price' => '250000'
        ]);
        Lapangan::create([
            'lokasi' => 'indoor',
            'jenis' => 'rumput',
            'price' => '200000'
        ]);

        // SEED LAPANGAN OUTDOOR
        Lapangan::create([
            'lokasi' => 'outdoor',
            'jenis' => 'reguler',
            'price' => '250000'
        ]);
        Lapangan::create([
            'lokasi' => 'outdoor',
            'jenis' => 'matras',
            'price' => '200000'
        ]);
        Lapangan::create([
            'lokasi' => 'outdoor',
            'jenis' => 'rumput',
            'price' => '150000'
        ]);
        // ----------END SEED LAPANGAN----------

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
