<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        DB::table('users')->insert([
            'id' => 1,
            'full_name' => 'Regita Kusuma',
            'email' => 'regitakusuma@gmail.com',
            'password' =>  Hash::make('12345678'),
            'role_id' => 1,
            'is_active' => 'Y',
            'created_at' => now(),
        ]);
    }
}
