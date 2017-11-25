<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Categoria
 * @package App\Models
 * @version November 23, 2017, 1:44 am UTC
 *
 * @property string nome
 * @property integer owner_id
 * @property string owner_type
 */
class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    /**
     * Relacao many x many polimorfica com trabalhosRecentes
     */
    public function trabalhosRecentes()
    {
        return $this->morphedByMany('App\Models\TrabalhoRecente', 'categorizavel');
    }

}
