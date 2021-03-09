<?php

use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task-priorities')->insert([
            'task' => 'feed cats',
            'priority'=>'Important'
        ]);
    }
}
