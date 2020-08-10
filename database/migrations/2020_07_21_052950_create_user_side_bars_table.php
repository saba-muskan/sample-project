<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSideBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_side_bars', function (Blueprint $table) {

            
        $table->engine = 'MyISAM';
            $table->bigInteger('id');
            $table->bigInteger('sidebar_id')->unsigned();
            $table->foreign('sidebar_id')->references('id')->on('sidebar')->onDelete('cascade');
            
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['id', 'sidebar_id', 'user_id']);
            $table->timestamps();
        });

    DB::statement('ALTER TABLE user_side_bars  MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_side_bars');
    }
}
