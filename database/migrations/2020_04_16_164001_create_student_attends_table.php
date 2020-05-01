<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attends', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('class_title');
            $table->string('class_description');
            $table->string('student_email');
            $table->string('course_name');
            $table->string('lecturer_name');
            $table->string('attendance_date');
            $table->string('is_approved')->default(0);
            $table->string('approved_by')->nullable();
            $table->string('approved_date')->nullable();
            $table->string('photo_one');
            $table->string('photo_two');
            $table->string('photo_three');
            $table->string('photo_four');
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
        Schema::dropIfExists('attends');
    }
}
