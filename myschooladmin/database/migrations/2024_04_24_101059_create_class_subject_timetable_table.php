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
        Schema::create('class_subject_timetable', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('class_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('week_id')->nullable();
            $table->string('start_time', 25)->nullable();
            $table->string('end_time', 25)->nullable();
            $table->string('class_room')->nullable();
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
        Schema::dropIfExists('class_subject_timetable');
    }
};
