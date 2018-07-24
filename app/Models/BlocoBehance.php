<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

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
     * undocumented function
     *
     * @return void
     */
    public function trabalhoPortfolio()
    {
        return $this->belongsTo(\App\Models\TrabalhoPortfolio::class);
    }

    /**
     * Acessor para 
     */
    public function getNomeProjetoAttribute()
    {
        return $this->trabalhoPortfolio->titulo;
    }
    
}
