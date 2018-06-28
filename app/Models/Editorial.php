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
        
    ];

    
}
