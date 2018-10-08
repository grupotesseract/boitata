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
        \Log::info("\n## Checando por novos projetos no Behance!.. ");
        $Behance = new \App\Helpers\Behance();
        $obj = $Behance->getProjetos();

        $idsBehance = collect($obj->projects)->pluck('id')->all();
        $idsTrabsAtuais = TrabalhoPortfolio::all()->pluck('id_behance')->all();
        $idsNovos = array_diff($idsBehance, $idsTrabsAtuais);

        if (empty($idsNovos)) {
            return [];
        }

        $novosTrabalhos = [];
        $ordem = TrabalhoPortfolio::max('ordem')+1;

        foreach ($idsNovos as $idProjBehance) {
            
            $Proj = collect($obj->projects)->where('id', $idProjBehance)->first();
            if ( !$Proj ) {
                \Log::info("\n## Erro Nao encontrou projeto $idProjBehance");
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
    

    /**
     * undocumented function
     *
     * @return void
     */
    public function atualizarTrabalhoBehance($Trabalho)
    {
        $Trabalho->blocosConteudo()->delete();
        \Log::info("\n## Obtendo detalhes do projeto ".$Trabalho->titulo);
        $Behance = new \App\Helpers\Behance();
        $detalhes = $Behance->getProjeto($Trabalho->id_behance);
        $ordem=1;

        foreach ($detalhes->project->modules as $moduloBehance) {
            $Trabalho->blocosConteudo()->create([
                'tipo' => $moduloBehance->type,
                'ordem' => $ordem++,
                'json_behance' => $moduloBehance
            ]);
        }
        return null;
    }
    



}

