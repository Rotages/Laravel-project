<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Sroti',
            'email' => 'Sroti@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Laravel Junior Dev',
        //     'tags' => 'laravel, react.js',
        //     'company' => 'Jeszcze brak',
        //     'location' => 'Szczecin, Poland',
        //     'email' => 'kubanek009@gmail.com',
        //     'website' => 'brak',
        //     'description' => 'Cos tutaj wpisac jak zawsze'
        // ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Dev',
        //     'tags' => 'laravel',
        //     'company' => 'Jeszcze brak',
        //     'location' => 'Oslo, Norway',
        //     'email' => 'email@gmail.com',
        //     'website' => 'brak',
        //     'description' => 'Cos tutaj wpisac jak zawsze'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
