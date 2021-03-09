<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('to-do list')->insert([
            'task' => 'feed cats',
            'status'=>'Incomplete',
            'created_at' => Carbon::parse('2020-03-03'),
            'updated_at' => Carbon::parse('2021-03-03'),
        ]);
    }
}
