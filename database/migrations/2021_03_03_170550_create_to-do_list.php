<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToDoList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('to-do list', function (Blueprint $table) {
                $table->string('name')->unique();
                $table->string('priority');
                $table->foreign('priority')->references('name')->on('priorities');
                $table->string('status');
                $table->foreign('status')->references('status')->on('statuses');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to-do list');
    }
}
