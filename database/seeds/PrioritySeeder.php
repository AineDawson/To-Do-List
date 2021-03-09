<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'priority' => 'Urgent'
        ]);
        DB::table('priorities')->insert([
            'priority' => 'Important'
        ]);
        DB::table('priorities')->insert([
            'priority' => 'Ignore'
        ]);
        DB::table('priorities')->insert([
            'priority' => 'Optional'
        ]);
    }
}
