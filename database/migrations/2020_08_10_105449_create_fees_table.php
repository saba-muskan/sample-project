<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
     
    $table->bigInteger('fee_id');
    $table->bigInteger('class_id')->unsigned();
    $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
    $table->primary(['fee_id','class_id', 'year','month','fee_type']); 
    $table->string('annual_charges');
    $table->string('lab');
    $table->string('tution_fee');  
    $table->string('year');  
    $table->bigInteger('amount');
    $table->bigInteger('branch_id')->unsigned();
    $table->foreign('branch_id')->references('branch_id')->on('branch')->onDelete('cascade');
    $table->bigInteger('late_charges');
    $table->string('fee_type');  
    $table->string('month');  
    // $table->date('created_at');	
    $table->date('fee_generation_date');
    $table->date('due_date');
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
        Schema::dropIfExists('fees');
    }
}
