<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class catareaciudad
 * @package App\Models
 * @version April 14, 2019, 6:06 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property boolean activo
 * @property string observaciones
 */
class catareaciudad extends Model
{
    use SoftDeletes;

    public $table = 'cat_areaciudad';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'activo',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'activo' => 'boolean',
        'observaciones' => 'string'
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
