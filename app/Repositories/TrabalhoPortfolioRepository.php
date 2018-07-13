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
     * undocumented function
     *
     * @return void
     */
    public function createFromBehance()
    {
        $Behance = new \App\Helpers\Behance();
        $obj = $Behance->getProjetos();
        $novosTrabalhos = [];
        $ordem = 1;

        foreach ($obj->projects as $Proj) {
            $novosTrabalhos[] =  [
                'titulo' => $Proj->name,
                'id_behance' => $Proj->id,
                'json_behance' => $Proj,
                'url_behance' => $Proj->url,
                'covers' => $Proj->covers,
                'ordem' => $ordem++,
                'data_sync' => time()
            ];
        }

        $this->createMany($novosTrabalhos);
        return $novosTrabalhos;
    }
    


}

