<?php

namespace App\Repositories;

use App\Models\Motion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MotionRepository
 * @package App\Repositories
 * @version November 25, 2017, 3:19 am UTC
 *
 * @method Motion findWithoutFail($id, $columns = ['*'])
 * @method Motion find($id, $columns = ['*'])
 * @method Motion first($columns = ['*'])
*/
class MotionRepository extends BaseRepository
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
        return Motion::class;
    }
}
