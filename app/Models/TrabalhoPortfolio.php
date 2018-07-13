<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TrabalhoPortfolio
 * @package App\Models
 * @version July 12, 2018, 4:22 am UTC
 *
 * @property integer id_behance
 * @property string titulo
 * @property string descricao
 * @property integer ordem
 * @property string url_behance
 * @property json json_behance
 * @property json covers
 */
class TrabalhoPortfolio extends Model
{
    public $table = 'trabalho_portfolios';

    public $fillable = [
        'id_behance',
        'titulo',
        'descricao',
        'ordem',
        'url_behance',
        'json_behance',
        'covers'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_behance' => 'integer',
        'titulo' => 'string',
        'descricao' => 'string',
        'ordem' => 'integer',
        'url_behance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_behance' => 'required',
        'titulo' => 'required',
        'descricao' => 'required'
    ];


    /**
     * Mutator para o campo json_behance
     */
    public function setJsonBehanceAttribute($value)
    {
        return $this->attributes['json_behance'] = json_encode($value);
    }
    
    /**
     * Mutator para o campo covers
     */
    public function setCoversAttribute($value)
    {
        return $this->attributes['covers'] = json_encode($value);
    }


    /**
     * getCoversAttribute 
     *
     * @param mixed $value
     */
    public function getCoversAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * getJsonBehanceAttribute 
     *
     * @param mixed $value
     */
    public function getJsonBehanceAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Acessor para a url da cover original
     */
    public function getURLCapaAttribute()
    {
        return $this->covers->{"original"};
    }
    
    
}
