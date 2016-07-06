<?php

use Illuminate\Database\Seeder;

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
            'name' => 'yyy',
            'email' => '545374042@qq.com',
            'password' => Hash::make("123456"),
            'mobile' => '13800138000',
        ]);
    }
}
