<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin  user
        User::factory([
            'email' => 'vedat@kurtay.com',
            'password' => bcrypt('toor321'),
            'email_verified_at' => now(),
            'is_admin' => true,
        ])->create();

        User::factory()->times(100)->create();
    }
}
