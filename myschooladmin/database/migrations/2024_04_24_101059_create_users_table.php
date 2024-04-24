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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('admission_number', 50)->nullable();
            $table->string('roll_number', 50)->nullable();
            $table->date('admission_date')->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('country', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('local_govt_area', 50)->nullable();
            $table->string('hometown', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('mobile_number', 15)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('qualification')->nullable();
            $table->string('note')->nullable();
            $table->string('profile_pic', 100)->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('genotype', 10)->nullable();
            $table->string('disability', 50)->nullable();
            $table->string('occupation')->nullable();
            $table->tinyInteger('user_type')->default(3)->comment('1:admin, 2:teacher, 3:student, 4:parent');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not deleted, 1: deleted');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0:active, 1:inactive');
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
        Schema::dropIfExists('users');
    }
};
