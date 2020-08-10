<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolLeavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_leavings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->date('Date');
            $table->string('Certificate');
           
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
        Schema::dropIfExists('school_leavings');
    }
}
