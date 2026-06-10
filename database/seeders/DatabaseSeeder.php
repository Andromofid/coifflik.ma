<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@coifflik.ma'],
            [
                'name'      => 'Admin CoiffLik',
                'password'  => bcrypt('user12345'),
                'phone'     => '0600000000',
                'role'      => 'admin',
                'is_active' => true,
            ]
        );

        $this->call([
            CoiffeurSeeder::class,
        ]);
    }
}
