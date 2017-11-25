<?php

use Illuminate\Database\Seeder;

class TrabalhosRecentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Ambientação para a 13º Colóquio de Moda",
            "ordem" => 1,
            "url" => "https://www.behance.net/gallery/58590797/Ambientacao-Evento-de-Moda"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_1"]));
        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Identidade visual para a festa universitária Inter M1l Gr4u",
            "ordem" => 2,
            "url" => "https://www.behance.net/gallery/58043495/Branding-Festa-Inter-M1l-Gr4u"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_2"]));

        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Identidade visual para festa de 17ª anos da Naumteria",
            "ordem" => 3,
            "url" => "https://www.behance.net/gallery/57158733/Identidade-da-festa-ANIVERSARIO-DA-NAUMTERIA"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_3"]));


    }
}
