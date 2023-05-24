<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'id' => '1',
            'fio' => 'customer',
            'login' => 'customer',
            'email' => 'customer@mail.ru',
            'password' => 'customer',
        ]);
        User::factory()->create([
            'id' => '5',
            'fio' => 'Петров',
            'login' => 'manager',
            'email' => 'manager@mail.ru',
            'password' => 'manager',
        ]);
    }
}
