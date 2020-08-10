<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Certificate', function (Blueprint $table) {
            $table->bigIncrements('Certificate_id');
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('parent_id')->on('parents')->onDelete('cascade');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->string('Description');
             $table->string('date');

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
        Schema::dropIfExists('Certificate');
    }
}
