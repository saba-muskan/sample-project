<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigInteger('id');
            $table->bigInteger('subject_id');
            $table->bigInteger('year');
            $table->string('exam');
            $table->bigInteger('student_id');
            $table->primary(['id','subject_id', 'year','exam','student_id']);
            $table->integer('marks')->nullable();
            $table->integer('obtain_marks')->nullable();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
            $table->string('Promoted');
            $table->timestamps();




        });
        DB::statement('ALTER TABLE result MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result');
    }
}
