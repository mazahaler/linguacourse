<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('complexities', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['beginner', 'pre-intermediate', 'intermediate', 'upper-intermediate', 'advanced', 'proficiency']);
            $table->enum('level', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2']);
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
        Schema::dropIfExists('complexities');
    }
}
