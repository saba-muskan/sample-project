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
            $table->engine = 'MyISAM';
            $table->bigInteger('id');
            $table->bigInteger('student_id')->unsigned();
            
            $table->date('due_date');
            $table->primary(['id','student_id' , 'due_date']);
            $table->string('fee_month')->nullable();
            $table->string('current_ammount')->nullable();
            $table->string('arrears')->nullable();
            $table->string('fee_status')->nullable();
            $table->bigInteger('fees_id')->unsigned();
            
           
          
            $table->timestamps();
        });
        DB::statement(' ALTER TABLE fee_details
        ADD FOREIGN KEY (student_id) REFERENCES students(student_id)');
         DB::statement(' ALTER TABLE fee_details
         ADD FOREIGN KEY (fees_id) REFERENCES classes(fee_id)');
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
