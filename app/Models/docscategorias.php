<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class docscategorias
 * @package App\Models
 * @version September 1, 2019, 8:38 pm CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string descripcion
 * @property string imagen
 */
class docscategorias extends Model
{
    use SoftDeletes;

    public $table = 'docs_categorias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'descripcion',
        'modelo',
        'imagen',
        'icono',
        'color',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'nombre'      => 'string',
        'descripcion' => 'string',
        'modelo'      => 'string',
        'imagen'      => 'string',
        'icono'       => 'string',
        'color'       => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];


}
