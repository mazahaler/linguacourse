<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Language::class, 'language_id')->index('course_language_idx');
            $table->foreignIdFor(\App\Models\User::class, 'author_id')->index('course_user_idx');
            $table->foreignIdFor(\App\Models\Complexity::class, 'complexity_id')->index('course_complexity_idx');
            $table->foreignIdFor(\App\Models\Accessibility::class, 'accessibility_id')->index('course_accessibility_idx');
            $table->string('title', 100);
            $table->string('slug', 100);
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
        Schema::dropIfExists('courses');
    }
}
