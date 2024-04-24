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
        Schema::create('student_add_fees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('total_amount')->nullable()->default(0);
            $table->integer('paid_amount')->nullable()->default(0);
            $table->integer('remaining_amount')->nullable()->default(0);
            $table->string('payment_type')->nullable();
            $table->text('remark')->nullable();
            $table->tinyInteger('is_payment')->default(0);
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
        Schema::dropIfExists('student_add_fees');
    }
};
