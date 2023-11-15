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
        Listing::factory(20)->create([
            'user_id'   => User::orderBy('id','DESC')->first()->id,
        ]);
    }
}
