<?php

namespace Database\Seeders;

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
        // (new BouncerSeeder)->run();
        (new CategorySeeder)->run();
        (new PrioritySeeder)->run();
        (new UserSeeder)->run();
        (new TicketSeeder)->run();
    }
}
