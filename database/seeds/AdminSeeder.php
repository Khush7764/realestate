<?php

use App\User;
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
        User::updateOrCreate(
            [
                'email' => 'admin_neosoft@mailinator.com',
            ],
            [
                'name' => 'admin',
                'email' => 'admin_neosoft@mailinator.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('admin@neosoft'),
                'user_type' => 1,
            ]
        );
    }
}
