<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PrioritySeeder::class);
         $this->call(StatusSeeder::class);
         $this->call(TaskSeeder::class);
         $this->call(TaskPrioritySeeder::class);
    }
}
