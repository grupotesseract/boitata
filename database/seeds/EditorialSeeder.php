<?php

use Illuminate\Database\Seeder;

class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primeiro = \App\Models\Editorial::create([
            "titulo" => "Folder impresso para espetáculo de teatro",
            "ordem" => 1,
            "url" => "https://www.behance.net/gallery/49903177/Bicho-Transparente"
        ]);
        $primeiro->foto()->save(\App\Models\Foto::make([
            "cloudinary_id" => "editorial_default_1"
        ]));

        $segundo = \App\Models\Editorial::create([
            "titulo" => "Livro impresso para dissertação",
            "ordem" => 2,
            "url" => "https://www.behance.net/gallery/59283893/Livro-impresso-para-dissertacao-em-Design"
        ]);
        $segundo->foto()->save(\App\Models\Foto::make([
            "cloudinary_id" => "editorial_default_2"
        ]));
        
    }
}
