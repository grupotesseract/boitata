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
    /**
     * Incluindo traits de SoftDelete e HasTags
     */
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
        'titulo' => 'required',
        'url' => 'required',
        'file' => 'required'
    ];


    /**
     * Dando override no metodo getTagClassName do HasTags Trait para retornar o nome do model que vamos usar
     */
    public static function getTagClassName(): string
    {
        return Categoria::class;
    }

    /**
     * Todo TrabalhoRecente tem 1 foto associada.
     */
    public function foto()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }

    /**
     * TrabalhoRecente pode ter varias categorias associadas
     */
    public function categorias()
    {
        return $this->morphToMany(\App\Models\Categoria::class, 'categorizavel');
    }
}
