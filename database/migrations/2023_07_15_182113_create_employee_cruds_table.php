<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_cruds', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('f_name');
			$table->string('cnic');
			$table->string('dob');
			$table->string('address');
			$table->string('experience');
			$table->string('profile_picture');
			$table->boolean('status');
            $table->softDeletes();
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
        Schema::dropIfExists('employee_cruds');
    }
}