<?php

use Illuminate\Database\Seeder;
use App\User as User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create([
            'id' => 1,
            'role' => 110,
            'name' => 'yyy',
            'email' => '545374042@qq.com',
            'password' => Hash::make("123456"),
            'mobile' => '13800138000',
        ]);
        User::create([
            'id' => 2,
            'role' => 0,
            'name' => '游客1',
            'email' => 'yyy@qq.com',
            'password' => Hash::make("123456"),
            'mobile' => '13800138000',
        ]);
        User::create([
            'id' => 3,
            'role' => 0,
            'name' => '游客2',
            'email' => 'yyy2@qq.com',
            'password' => Hash::make("123456"),
            'mobile' => '13800138000',
        ]);
    }
}
