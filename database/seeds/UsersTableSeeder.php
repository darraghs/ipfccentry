<?php

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
        DB::table('users')->insert([
            'name' => 'Darragh Sherwin',
            'email' => 'darragh.sherwin@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => 1,
            'approved' => 1,
            'judge' => 0
        ]);
    }
}
