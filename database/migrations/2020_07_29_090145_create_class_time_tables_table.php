<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_time_tables', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigInteger('id');
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
            $table->bigInteger('year')->unsigned();
          
            $table->primary(['id', 'class_id', 'year']);
            $table->timestamps();
        });
      
    DB::statement('ALTER TABLE class_time_tables MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_time_tables');
    }
}
