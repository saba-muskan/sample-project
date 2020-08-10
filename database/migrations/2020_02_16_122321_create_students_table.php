<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_roll_no');
            $table->string('student_gender');
            $table->date('student_dob');
            $table->string('student_blood_group')->nullable();
            $table->string('student_nationality')->nullable();
            $table->string('student_religion')->nullable();
            $table->string('student_address')->nullable();
            $table->string('student_phone_number')->nullable();
            $table->string('student_pic_path')->nullable();
            $table->date('student_date_of_admission');
            $table->string('student_class_of_admission');
        
            $table->string('student_previous_school')->nullable();
            $table->string('student_disability')->nullable();
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('parent_id')->on('parents')->onDelete('cascade');
            // $table->integer('parent_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('students');
    }
}
