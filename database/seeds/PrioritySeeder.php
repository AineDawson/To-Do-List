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
            'name' => 'Urgent'
        ]);
        DB::table('priorities')->insert([
            'name' => 'Important'
        ]);
        DB::table('priorities')->insert([
            'name' => 'Ignore'
        ]);
        DB::table('priorities')->insert([
            'name' => 'Optional'
        ]);
    }
}
