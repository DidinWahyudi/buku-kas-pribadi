<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Didin Wahyudi',
                'email' => 'didinwahyudi04@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make("12345678"),
                'remember_token' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('users')->insert($user);
    }
}
