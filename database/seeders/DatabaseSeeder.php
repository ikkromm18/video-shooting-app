<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        DB::table('users')->insert([
            'name' => 'M. Khafid',
            'email' => 'user@example.com',
            'password' => bcrypt('12345'),
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Labib',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345'),
            'role' => 'admin',
        ]);

        $this->call([
            LayananSeeder::class,
            TambahanSeeder::class
        ]);
    }
}
