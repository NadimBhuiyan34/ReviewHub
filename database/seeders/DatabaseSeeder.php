<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'), 
        ]);
        

        // Review::factory()->count(10)->create();
        $this->call([
            CategorySeeder::class,
        ]);
        $this->call([
            BrandSeeder::class,
        ]);
        $this->call([
            ShopSeeder::class,
        ]);
        $this->call([
            ProductSeeder::class,
        ]);
        
    }
}
