<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassToClasstimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_time_tables', function (Blueprint $table) {

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->bigInteger('period_no');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_time_tables', function (Blueprint $table) {
            //
        });
    }
}
