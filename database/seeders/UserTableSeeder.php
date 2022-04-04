<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $admin = new User();
        $admin->name = 'Micaela';
        $admin->email = 'molivera@mail.com';
        $admin->password = bcrypt('123');
        $admin->save();
    }
}
