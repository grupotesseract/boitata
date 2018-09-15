<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrabalhoPortfoliosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalho_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_behance')->nullable();
            $table->string('titulo')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('ordem')->nullable();
            $table->string('url_behance')->nullable();
            $table->json('json_behance')->nullable();
            $table->json('covers')->nullable();
            $table->timestamp('data_sync')->nullable();
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
        Schema::drop('trabalho_portfolios');
    }
}
