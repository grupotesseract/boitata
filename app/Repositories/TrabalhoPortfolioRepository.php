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

        foreach ($obj->projects as $Proj) {
            $novosTrabalhos[] =  TrabalhoPortfolio::create([
                'titulo' => $Proj->name,
                'id_behance' => $Proj->id,
                'json_behance' => $Proj,
                'url_behance' => $Proj->url,
                'covers' => $Proj->covers,
                'ordem' => $ordem++,
                'data_sync' => \Carbon\Carbon::now()
            ]);
        }

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
                'data_sync' => \Carbon\Carbon::now()
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
     * undocumented function
     *
     * @return void
     */
    public function getPorCategoria($categoriaID)
    {
        return $this->model->whereHas('categorias', function($qCat) use ($categoriaID){
            $qCat->where('categorias.id', $categoriaID);        
        });
    }
    
}

