<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'            => 'Muhammad Ridho Nosa',
            'email'           => 'ridhonosa@gmail.com',
            'password'        => bcrypt('123456'),
            'profile_picture' => 'muhammad-ridho-nosa.jpg'
        ]);
    }
}
