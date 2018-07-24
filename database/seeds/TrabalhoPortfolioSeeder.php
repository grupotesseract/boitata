<?php

use Illuminate\Database\Seeder;
use App\Repositories\TrabalhoPortfolioRepository;

class TrabalhoPortfolioSeeder extends Seeder
{

    /**
     * repositorioTrabalhos 
     *
     * @var mixed 
     */
    private $repositorioTrabalhos;

    /**
     * @param mixed TrabalhoPortfolioRepository $repositorioTrabalhos
     */
    public function __construct(TrabalhoPortfolioRepository $repositorioTrabalhos)
    { 
        $this->repositorioTrabalhos = $repositorioTrabalhos;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("## Pegando projetos do Behance... ");
        $projetos = $this->repositorioTrabalhos->createFromBehance();
        $this->command->info("## GGWP... ". count($projetos). " projetos adicionados :+1:");

    }
}
