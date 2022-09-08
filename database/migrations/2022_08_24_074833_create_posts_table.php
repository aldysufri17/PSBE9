<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('energy_id');
            $table->unsignedBigInteger('blueprint_id');
            $table->bigInteger('usage');
            $table->string('invoice');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('energy_id')->references('id')->on('energies')->onDelete('cascade');
            $table->foreign('blueprint_id')->references('id')->on('blueprints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
