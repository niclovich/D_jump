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
        User::create([
            'name' => 'cliente2',
            'email'=> 'cliente2@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-17 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente3',
            'email'=> 'cliente3@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-01 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente4',
            'email'=> 'cliente4@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-01 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente5',
            'email'=> 'cliente5@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-03 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente6',
            'email'=> 'cliente6@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-05 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente7',
            'email'=> 'cliente7@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-01-05 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente8',
            'email'=> 'cliente8@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-02-06 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente9',
            'email'=> 'cliente9@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-02-06 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente10',
            'email'=> 'cliente10@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-02-06 20:01:20'
        ])->assignRole('cliente');
        User::create([
            'name' => 'cliente11',
            'email'=> 'cliente11@gmail.com',
            'password'=> hash::make('12345'),
            'rol' => 'cliente',
            'created_at'=>'2023-02-20 20:01:20'
        ])->assignRole('cliente');



    }
}
