<?php

namespace Database\Seeders;
use Database\Seeders\postSedder;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // // User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
        // postSedder::factory()->count(10)->create([
        //     'postname'=>'News feeds'
        // ]);
    }
}
