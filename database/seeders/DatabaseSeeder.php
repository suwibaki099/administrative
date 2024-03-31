<?php

namespace Database\Seeders;

use App\Models\files_request;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'John Caballes',
            'email' => 'admin@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bella Camz',
            'email' => 'manager@gmail.com',
            'role' => 'Manager'
        ]);

        files_request::factory(4)->create();

        // files_request::create([
        //     'extension' => 'pdf',
        //     'name' => 'wdaawd.pdf',
        //     'size' => '1.0 mb',
        //     'relative_time' => time(),
        // ]);
    }
}
