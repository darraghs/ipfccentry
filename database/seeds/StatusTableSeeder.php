<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('competition_statuses')->insert([
            ['status'=>'entry', 'current'=>true],
            ['status'=>'closed', 'current'=>false],
            ['status'=>'mono_scoring', 'current'=>false],
            ['status'=>'colour_scoring', 'current'=>false],
            ['status'=>'comments', 'current'=>false],
            ['status'=>'finished', 'current'=>false],
         ]);
    }
}
