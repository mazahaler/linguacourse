<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Task::class, 'task_id')->index('task_review_idx');
            $table->enum('review_mark', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
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
        Schema::dropIfExists('task_reviews');
    }
}
