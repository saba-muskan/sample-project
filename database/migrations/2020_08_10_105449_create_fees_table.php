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
            $table->engine = 'MyISAM';
    $table->bigInteger('fee_id');
  
  
    $table->string('annual_charges');
    $table->string('lab');
    $table->string('tution_fee');  
    $table->string('year');  
    $table->bigInteger('amount');
    
    $table->bigInteger('late_charges');
    $table->string('fee_type');  
    $table->string('month');  
  
    $table->Integer('class_id')->unsigned();
    $table->Integer('branch_id')->unsigned();
  
    $table->date('feeGenerationDate');
    $table->date('due_date');
 
    $table->timestamps();
        });
        DB::statement(' ALTER TABLE fees
        ADD FOREIGN KEY (branch_id) REFERENCES branch(branch_id)');
         DB::statement(' ALTER TABLE fees
         ADD FOREIGN KEY (class_id) REFERENCES classes(class_id)');
         DB::statement('  ALTER TABLE fees ADD PRIMARY KEY (fee_id)');
       
       
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
