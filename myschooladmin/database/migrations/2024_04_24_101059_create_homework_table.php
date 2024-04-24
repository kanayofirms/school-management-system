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
        Schema::create('homework', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('class_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->date('homework_date')->nullable();
            $table->date('submission_date')->nullable();
            $table->string('document_file')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_delete')->default(0);
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
        Schema::dropIfExists('homework');
    }
};
