<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Khushal Bhalsod',
            'email' => 'khushal@yopmail.com',
            'password' => '123456'            
        ]);

        User::create([
            'name' => 'Steve Smith',
            'email' => 'smith@yopmail.com',
            'password' => '123456'            
        ]);
    }
}
