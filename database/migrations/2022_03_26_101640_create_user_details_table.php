<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->string('fname');
            $table->string('sname');
            $table->string('oname');
            $table->string('gender');
            $table->string('title');
            $table->string('dob');
            $table->string('staff_number');
            $table->string('address');
            $table->string('specialization');
            $table->string('qualification');
            $table->string('phone_number');
            $table->string('position');
            $table->string('national_id_number');
            $table->string('birth_entry_number');
            $table->string('next_of_kin');
            $table->string('next_of_kin_relationship');
            $table->string('next_of_kin_address');
            $table->string('next_of_kin_phone_number');
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
