<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TrabalhoRecente
 * @package App\Models
 * @version November 22, 2017, 1:56 am UTC
 */
class TrabalhoRecente extends Model
{
    use SoftDeletes;

    public $table = 'trabalho_recentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'ordem',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'ordem' => 'integer',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function foto()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }
    
}
