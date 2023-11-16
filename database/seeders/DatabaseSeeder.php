<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Database\Factories\ListingFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        User::factory(1)->create([
            'name' => 'Sakib Hossain',
            'email'=> 'sakib@gmail.com',
            'password'=> bcrypt(11111111)
        ]);

        Listing::factory(12)->create([
            'user_id'   => User::orderBy('id','ASC')->first()->id,
        ]);

        Listing::factory(9)->create([
            'user_id'   => User::orderBy('id','DESC')->first()->id,
        ]);
    }
}
