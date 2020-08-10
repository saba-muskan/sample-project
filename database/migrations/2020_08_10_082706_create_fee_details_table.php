<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_details', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->date('due_date');
            $table->primary(['id','student_id' , 'due_date']);
            $table->string('fee_month')->nullable();
            $table->string('current_ammount')->nullable();
            $table->string('arrears')->nullable();
            $table->string('fee_status')->nullable();
            $table->bigInteger('fees_id')->unsigned();
            $table->foreign('fees_id')->references('fee_id')->on('fees')->onDelete('cascade');
          
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
        Schema::dropIfExists('fee_details');
    }
}
