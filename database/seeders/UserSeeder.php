<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'admin',
        ])->assignRole('admin');
        User::create([
            'name'=> 'vendedor',
            'email'=> 'vendedor@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'vendedor',
        ])->assignRole('vendedor');
        User::create([
            'name'=> 'vendedor2',
            'email'=> 'vendedor2@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'vendedor',
        ])->assignRole('vendedor');
        User::create([
            'name'=> 'vendedor3',
            'email'=> 'vendedor3@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'vendedor',
        ])->assignRole('vendedor');
        User::create([
            'name'=> 'vendedor4',
            'email'=> 'vendedor4@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'vendedor',

        ])->assignRole('vendedor');
        User::create([
            'name'=> 'vendedor5',
            'email'=> 'vendedor6@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'vendedor',

        ])->assignRole('vendedor');
        User::create([
            'name' => 'cliente',
            'email'=> 'cliente@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
        ])->assignRole('cliente');
    }
}
