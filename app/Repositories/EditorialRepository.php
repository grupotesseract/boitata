<?php

namespace App\Repositories;

use App\Models\Editorial;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EditorialRepository
 * @package App\Repositories
 * @version April 16, 2018, 10:31 pm UTC
 *
 * @method Editorial findWithoutFail($id, $columns = ['*'])
 * @method Editorial find($id, $columns = ['*'])
 * @method Editorial first($columns = ['*'])
*/
class EditorialRepository extends BaseRepository
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
        return Editorial::class;
    }
}
