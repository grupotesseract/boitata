<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlocoBehancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloco_behances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->integer('ordem');
            $table->json('json_behance');

            $table->integer('trabalho_portfolio_id')->unsigned();
            $table->foreign('trabalho_portfolio_id')->references('id')->on('trabalho_portfolios');

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
        Schema::drop('bloco_behances');
    }
}
