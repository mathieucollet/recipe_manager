<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert(
            [
                'name'              => 'Administrateur',
                'email'             => 'admin@admin.admin',
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make('adminadmin'),
                'is_admin'          => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        );
        DB::table('users')->insert(
            [
                'name'              => 'User',
                'email'             => 'user@user.user',
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make('useruser'),
                'is_admin'          => false,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        );
    }
}
