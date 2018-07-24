<?php

namespace App\Repositories;

use App\Models\BlocoBehance;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BlocoBehanceRepository
 * @package App\Repositories
 * @version July 13, 2018, 3:04 am UTC
 *
 * @method BlocoBehance findWithoutFail($id, $columns = ['*'])
 * @method BlocoBehance find($id, $columns = ['*'])
 * @method BlocoBehance first($columns = ['*'])
*/
class BlocoBehanceRepository extends BaseRepository
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
        return BlocoBehance::class;
    }
}
