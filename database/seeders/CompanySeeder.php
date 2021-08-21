<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->random(5)->each(function($user){
            Company::factory()->create()->users()->attach($user->id);
        });

        Company::factory(10)->create();
    }
}
