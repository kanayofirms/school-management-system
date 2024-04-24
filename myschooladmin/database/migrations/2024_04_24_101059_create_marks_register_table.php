<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks_register', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('resumption_test')->default(0);
            $table->integer('assignment')->default(0);
            $table->integer('midterm_test')->default(0);
            $table->integer('project')->default(0);
            $table->integer('exam')->default(0);
            $table->integer('full_mark')->default(0);
            $table->integer('passing_mark')->default(0);
            $table->integer('created_by')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks_register');
    }
};
