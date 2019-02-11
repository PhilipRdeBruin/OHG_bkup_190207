<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'gebr_naam' => 'admin',
            'email' => 'admin@admin.nl',
            'password' => Hash::make('admin'),
            'voornaam' => 'admin',
            'achternaam' => 'admin'
        ]);
    }
}
