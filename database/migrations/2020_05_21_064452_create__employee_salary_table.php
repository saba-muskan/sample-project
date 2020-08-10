<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmployeeSalary', function (Blueprint $table) {
            $table->engine='MyISAM';
          
            // $table->bigIncrements('id');
            $table->bigInteger('id');
            // $table->bigInteger('empoyee_id');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->string('month');
            $table->bigInteger('year');
            $table->primary(['id','employee_id','month','year']);
            $table->bigInteger('basic_pay');
            $table->bigInteger('House_Allowance');
            $table->bigInteger('Medical_Allownace');
            $table->bigInteger('Transport_Allownace');
            $table->bigInteger('Gross_Pay');
            $table->bigInteger('Cp_Fund');
            // $table->bigInteger('Medical_Contribution');
            $table->bigInteger('Income_Tax');
           
            $table->bigInteger('Total_Deduction');
            $table->bigInteger('Net_Pay');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE EmployeeSalary MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EmployeeSalary');
    }
}
