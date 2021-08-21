<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\Project;
use App\Models\UserStory;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(CompanySeeder::class);
        Project::factory(25)->create();
        UserStory::factory(20)->create();
        Ticket::factory(30)->create();
    }
}
