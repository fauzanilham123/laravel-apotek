<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'John Doe',
            'username' => 'admin',
            'password' => Hash::make('admin'), 
            'alamat' => 'Jalan ABC No. 123',
            'telepon' => '8123456789',
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'John Doe',
            'username' => 'apotek',
            'password' => Hash::make('apotek'), 
            'alamat' => 'Jalan ABC No. 123',
            'telepon' => '8123456789',
            'role' => 'apoteker',
        ]);
        DB::table('users')->insert([
            'name' => 'John Doe',
            'username' => 'kasir',
            'password' => Hash::make('kasir'), 
            'alamat' => 'Jalan ABC No. 123',
            'telepon' => '8123456789',
            'role' => 'kasir',
        ]);
    }
}