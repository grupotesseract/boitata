<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class BlocoBehance
 * @package App\Models
 * @version July 13, 2018, 3:04 am UTC
 *
 * @property string tipo
 * @property integer ordem
 * @property json json_behance
 */
class BlocoBehance extends Model
{
    const TIPO_IMAGE='image';
    const TIPO_TEXT='text';
    const TIPO_VIDEO='video';
    const TIPO_EMBED='embed';
    const TIPO_AUDIO='audio';

    public $table = 'bloco_behances';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'trabalho_portfolio_id',
        'tipo',
        'ordem',
        'json_behance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string',
        'ordem' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required'
    ];

    public $appends = [
        'nomeProjeto'
    ];

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
     * setJsonBehanceAttribute 
     *
     * @param mixed $value
     */
    public function setJsonBehanceAttribute($value)
    {
        return $this->attributes['json_behance'] = json_encode($value);
    }

    /**
     * Todo Bloco do Behance pertence a 1 TrabalhoPortfolio
     *
     * @return void
     */
    public function trabalhoPortfolio()
    {
        return $this->belongsTo(\App\Models\TrabalhoPortfolio::class);
    }

    /**
     * Acessor para o Nome do Projeto a qual esse bloco pertence
     */
    public function getNomeProjetoAttribute()
    {
        return $this->trabalhoPortfolio->titulo;
    }
    

    /**
     * Acessor para o Html formatado do bloco
     *
     * @return string
     */
    public function getHtmlAttribute()
    {
        switch ($this->tipo) {
        case self::TIPO_IMAGE:
            return "<img src='".$this->json_behance->src."' alt='".$this->nomeProjeto."'>";
            break;

        case self::TIPO_TEXT:
            return $this->json_behance->text; 
            break;

        case self::TIPO_VIDEO:
            return "<video src='".$this->json_behance->src."'>"; 
            break;

        case self:TIPO_EMBED:
            return $this->json_behance->embed; 
            break;

        case self::TIPO_AUDIO:
            return $this->json_behance->embed; 
            break;
        }


        return null;
    }



}
