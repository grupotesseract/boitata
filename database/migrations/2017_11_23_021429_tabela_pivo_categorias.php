<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPivoCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorizavels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id');
            $table->integer('categorizavel_id')->nullable();
            $table->string('categorizavel_type')->nullable();
            $table->timestamps();
            $table->softdeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorizavels');
    }
}
