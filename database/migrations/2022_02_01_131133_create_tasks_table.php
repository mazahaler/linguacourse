<?php

use Illuminate\Database\Migrations\Migration;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('text', 200);
            $table->enum('type', ['Question', 'Multi answer question', 'Pronunciation', 'Correct word order', 'Remove extra word', 'Write synonyms']);
            $table->json('structure');
            $table->integer('course_id');
            $table->integer('unit_id');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
