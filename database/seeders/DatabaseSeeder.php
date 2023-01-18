<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\company;
use App\Models\note_taking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        User::factory(5)->create();
        Company::factory(5)->create();
        NoteTaking::factory(5)->create();
    }
}
