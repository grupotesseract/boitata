<?php

use Illuminate\Database\Seeder;

class MotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Motion::create([
            "descricao" => "Teaser criado para o 6º Festival de Artes Cênicas de Bauru",
            "url" => "//www.youtube.com/embed/3J9qxFXncMg",
            'ativo' => true
        ]);

    }
}
