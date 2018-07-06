<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Editorial
 * @package App\Models
 * @version April 16, 2018, 10:31 pm UTC
 *
 * @property string titulo
 * @property integer ordem
 * @property string url
 */
class Editorial extends Model
{
    use SoftDeletes;

    public $table = 'editorials';
    

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
    ];


    /**
     * Dando override no metodo getTagClassName do HasTags Trait para retornar o nome do model que vamos usar
     */
    public static function getTagClassName(): string
    {
        return \App\Models\Categoria::class;
    }

    /**
     * Todo item de Editorial tem 1 foto associada.
     */
    public function foto()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }

    /**
     * Editorial pode ter varias categorias associadas
     */
    public function categorias()
    {
        return $this->morphToMany(\App\Models\Categoria::class, 'categorizavel');
    }


    /**
     * Scope para aplicar na query filtrando por ordem = 1
     */
    public function scopePrimeiro($query)
    {
        return $query->where('ordem', 1);
    }

    /**
     * Scope para aplicar na query filtrando por ordem = 2
     */
    public function scopeSegundo($query)
    {
        return $query->where('ordem', 2);
    }
    
    /**
     * Definindo um acessor para a URL da foto no cloudinary no tamanho maximo que irão aparecer 800 x 450
     */
    public function getlinkFotoAttribute()
    {
        return "//res.cloudinary.com/".env('CLOUDINARY_CLOUD_NAME')."/image/upload/q_auto/".$this->foto->cloudinary_id.".jpeg";
    }
}
