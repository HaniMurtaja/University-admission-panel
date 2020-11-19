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
        Schema::create('course_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('fees');
            $table->integer('duration');
            $table->text('description');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->on('course_type')->references('id')->onDelete('set null');
            $table->foreign('university_id')->on('universities')->references('id')->onDelete('set null');
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
        Schema::dropIfExists('course_type');
    }
}
