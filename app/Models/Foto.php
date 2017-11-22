<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Foto
 * @package App\Models
 * @version November 22, 2017, 1:36 am UTC
 */
class Foto extends Model
{
    use SoftDeletes;

    public $table = 'fotos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cloudinary_id',
        'image_name',
        'image_path',
        'image_extension',
        'owner_id',
        'owner_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'image_name' => 'string',
        'image_path' => 'string',
        'image_extension' => 'string',
        'owner_id' => 'integer',
        'owner_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Binding Model Events.
     */
    public static function boot()
    {
        parent::boot();

        /** Binding the delete model event to destroy the filesystem archive **/
        static::deleted(function ($photo) {
            if (\File::exists($photo->fullPath)) {
                \File::delete($photo->fullPath);
            }
        });
    }

    /**
     * Relação polimorfica para que uma foto
     * possa pertencer a um mais de 1 tipo de entidade.
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**********************
     * Acessors / Mutators
     ************************/

    /**
     * Definindo um acessor para a URL da foto.
     */
    public function getURLAttribute()
    {
        return url('/uploads/'.$this->image_name.'.'.$this->image_extension);
    }

    /**
     * Definindo um acessor para o fullpath da foto.
     */
    public function getFullPathAttribute()
    {
        return $this->image_path.$this->image_name.'.'.$this->image_extension;
    }
    
}
