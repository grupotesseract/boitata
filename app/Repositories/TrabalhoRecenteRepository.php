<?php

namespace App\Repositories;

use App\Models\TrabalhoRecente;
use InfyOm\Generator\Common\BaseRepository;

class TrabalhoRecenteRepository extends BaseRepository
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
        return TrabalhoRecente::class;
    }
}
