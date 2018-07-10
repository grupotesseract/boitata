<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Motion
 * @package App\Models
 * @version November 25, 2017, 3:19 am UTC
 *
 * @property string descricao
 * @property string url
 * @property boolean ativo
 */
class Motion extends Model
{
    use SoftDeletes;

    public $table = 'motions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'descricao',
        'url',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descricao' => 'string',
        'url' => 'string',
        'ativo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Scope pra pegar o Motion ativo
     */
    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    } 

    /**
     * Motion pode ter varias categorias associadas
     */
    public function categorias()
    {
        return $this->morphToMany(\App\Models\Categoria::class, 'categorizavel');
    }

    
}
