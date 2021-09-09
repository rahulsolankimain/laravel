<?php

use App\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for default user
        $user = User::where('email','rd@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name' => 'R.D',
                'email' => 'rd@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
