<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class contratistas
 * @package App\Models
 * @version April 14, 2019, 7:25 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string rfc
 * @property string direccion
 */
class contratistas extends Model
{
    use SoftDeletes;
    public $table = 'cat_contratistas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'rfc',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'rfc' => 'string',
        'direccion' => 'string'
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
