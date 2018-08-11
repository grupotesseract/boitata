<?php

namespace App\Repositories;

use App\Models\TrabalhoPortfolio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TrabalhoPortfolioRepository
 * @package App\Repositories
 * @version July 12, 2018, 4:22 am UTC
 *
 * @method TrabalhoPortfolio findWithoutFail($id, $columns = ['*'])
 * @method TrabalhoPortfolio find($id, $columns = ['*'])
 * @method TrabalhoPortfolio first($columns = ['*'])
*/
class TrabalhoPortfolioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TrabalhoPortfolio::class;
    }


    /**
     * Metodo para criar todos os projetos a partir do Behance
     *
     * @return array novos TrabalhosPortfolio
     */
    public function createAllFromBehance()
    {
        $Behance = new \App\Helpers\Behance();
        $obj = $Behance->getProjetos();
        $novosTrabalhos = [];
        $ordem = 1;

        //para cada um dos projetos, criar no BD
        foreach ($obj->projects as $Proj) {
            $novosTrabalhos[] =  TrabalhoPortfolio::create([
                'titulo' => $Proj->name,
                'id_behance' => $Proj->id,
                'json_behance' => $Proj,
                'url_behance' => $Proj->url,
                'covers' => $Proj->covers,
                'ordem' => $ordem++,
                'data_sync' => time()
            ]);
        }

        //Iterando novamente para pegar os detalhes de cada projeto, 
        //@TODO refatorar para 1 unico foreach? - fazer essa segunda etapa assync? executar 1 unica query para crar em lote?
        foreach ($novosTrabalhos as $Trabalho) {
            \Log::info("\n## Obtendo detalhes do projeto ".$Trabalho->titulo);
            $detalhes = $Behance->getProjeto($Trabalho->id_behance);
            $ordem=1;

            //Para cada um dos modulos que compoem um projeto do behance, criar no BD
            foreach ($detalhes->project->modules as $moduloBehance) {
                $Trabalho->blocosConteudo()->create([
                    'tipo' => $moduloBehance->type,
                    'ordem' => $ordem++,
                    'json_behance' => $moduloBehance
                ]);
            }
        }
        return $novosTrabalhos;
    }

    /**
     * Metodo para criar os projetos que ja nao existirem no BD a partir do Behance
     *
     * @return array novos TrabalhosPortfolio
     */
    public function createNovosFromBehance()
    {
        $Behance = new \App\Helpers\Behance();
        $obj = $Behance->getProjetos();


        $idsBehance = collect($obj->projects)->pluck('id')->all();
        $idsTrabsAtuais = $this->all()->pluck('id_behance')->all();
        $idsNovos = array_diff($idsBehance, $idsTrabsAtuais);

        if (empty($idsNovos)) {
            return [];
        }

        $novosTrabalhos = [];
        $ordem = TrabalhoPortfolio::max('ordem')+1;
        foreach ($obj->projects as $Proj) {
            
            //Se nao for um projeto com id Novo, só pular
            if ( ! array_search($Proj->id, $idsNovos) ) {
                continue;
            }

            $novosTrabalhos[] =  TrabalhoPortfolio::create([
                'titulo' => $Proj->name,
                'id_behance' => $Proj->id,
                'json_behance' => $Proj,
                'url_behance' => $Proj->url,
                'covers' => $Proj->covers,
                'ordem' => $ordem++,
                'data_sync' => time()
            ]);
        }

        //Obtem os modulos que compoem o projeto no behance
        foreach ($novosTrabalhos as $Trabalho) {
            \Log::info("\n## Obtendo detalhes do projeto ".$Trabalho->titulo);
            $detalhes = $Behance->getProjeto($Trabalho->id_behance);
            $ordem=1;

            foreach ($detalhes->project->modules as $moduloBehance) {
                $Trabalho->blocosConteudo()->create([
                    'tipo' => $moduloBehance->type,
                    'ordem' => $ordem++,
                    'json_behance' => $moduloBehance
                ]);
            }
        }
        return $novosTrabalhos;
    }


    /**
     * AtualizarTrabalhoBehance - Metodo para sycronizar 1 unico TrabalhoPortfolio com o Behance
     * @param TrabalhoPortfolio $Trabalho
     * @return TrabalhoPortfolio - instancia do Trabalho após re-syncronizar
     */
    public function atualizarTrabalhoBehance(TrabalhoPortfolio $Trabalho)
    {
        \Log::info("\n## Atualizando o projeto ".$Trabalho->titulo);

        $Behance = new \App\Helpers\Behance();
        $Trabalho->blocosConteudo()->delete();
        $detalhes = $Behance->getProjeto($Trabalho->id_behance);
        $ordem=1;

        //Inserindo cada um os modulos.
        foreach ($detalhes->project->modules as $moduloBehance) {
            $Trabalho->blocosConteudo()->create([
                'tipo' => $moduloBehance->type,
                'ordem' => $ordem++,
                'json_behance' => $moduloBehance
            ]);
        }

        //Atualizado as capas e a data de syncronizacao
        $Trabalho->covers = $detalhes->project->covers;
        $Trabalho->data_sync = time();
        $Trabalho->save();

        return $Trabalho;
    }
    
}

