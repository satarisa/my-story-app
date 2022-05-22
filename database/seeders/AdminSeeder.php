<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->user_name = 'admin';
        $user->name = 'Admin Name';
        $user->email = 'admin@mail.com';
        $user->role = 'admin';
        $user->password = Hash::make('password-msa');
        $user->save();
        $user->profile()->create();
    }
}
