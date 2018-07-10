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
            "ordem" => 2,
            "url" => "https://www.behance.net/gallery/58590797/Ambientacao-Evento-de-Moda"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_1"]));
        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Identidade visual para a festa universitária Inter M1l Gr4u",
            "ordem" => 4,
            "url" => "https://www.behance.net/gallery/58043495/Branding-Festa-Inter-M1l-Gr4u"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_2"]));

        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Cenografia da exposição Eu, Dafne",
            "ordem" => 1,
            "url" => "https://www.behance.net/gallery/62416335/Exposicao-EU-Dafne"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_13"]));
        $trabRecente = \App\Models\TrabalhoRecente::create([
            "titulo" => "Projeto gráfico Eu, Dafne",
            "ordem" => 3,
            "url" => "https://www.behance.net/gallery/62589781/Eu-Dafne"
        ]);
        $trabRecente->foto()->save(\App\Models\Foto::make(["cloudinary_id" => "trabalhos_recentes_14"]));
        
        

    }
}
