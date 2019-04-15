<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class catpaisdivision
 * @package App\Models
 * @version April 14, 2019, 4:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string observaciones
 */
class catpaisdivision extends Model
{
    use SoftDeletes;
    public $table = 'cat_pais-division';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
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
