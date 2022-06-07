<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;
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
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::create([
            'title' => 'Dean DFH ML',
            'tags' => 'dean, dime, ml, hell',
            'brand' => 'Dean',
            'model' => 'Dean from Hell ML',
            'location' => 'Desampa',
            'email' => 'diego@email.com',
            'phone' => '72068512',
            'description' => 'Getcha pull with this shredding machine'
            
        ]);

        Listing::create([
            'title' => 'Jackson JS32T RR',
            'tags' => 'jackson, rr,randy,rhoads',
            'brand' => 'Jackson',
            'model' => 'JS32T Rhandy Rhoads',
            'location' => 'Desampa',
            'email' => 'diego@email.com',
            'phone' => '666555438',
            'description' => 'Kick ass guitar RIP Randy.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            
        ]);

    }
}
