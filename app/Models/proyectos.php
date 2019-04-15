<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proyectos
 * @package App\Models
 * @version April 15, 2019, 1:17 pm UTC
 *
 * @property \App\Models\CatContratista catCotratistas
 * @property \App\Models\CatPaisDivision catPaisDivision
 * @property \App\Models\CatAreaciudad catAreaciudad
 * @property \App\Models\CatProducto catProductos
 * @property \App\Models\CatEstatus estatus
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string supervidor
 * @property string|\Carbon\Carbon finicio
 * @property string|\Carbon\Carbon ftermino
 * @property string identificacion
 * @property integer cat_cotratistas_id
 * @property integer cat_pais-division_id
 * @property integer cat_areaciudad_id
 * @property integer cat_productos_id
 * @property string estatus_id
 */
class proyectos extends Model
{
    use SoftDeletes;
    public $table = 'proyectos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'supervidor',
        'finicio',
        'ftermino',
        'identificacion',
        'cat_cotratistas_id',
        'cat_pais-division_id',
        'cat_areaciudad_id',
        'cat_productos_id',
        'estatus_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'supervidor' => 'string',
        'finicio' => 'datetime',
        'ftermino' => 'datetime',
        'identificacion' => 'string',
        'cat_cotratistas_id' => 'integer',
        'cat_pais-division_id' => 'integer',
        'cat_areaciudad_id' => 'integer',
        'cat_productos_id' => 'integer',
        'estatus_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'supervidor' => 'required',
        'finicio' => 'required',
        'ftermino' => 'required',
        'cat_cotratistas_id' => 'required',
        'cat_pais-division_id' => 'required',
        'cat_areaciudad_id' => 'required',
        'cat_productos_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catCotratistas()
    {
        return $this->belongsTo(\App\Models\CatContratista::class, 'cat_cotratistas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catPaisDivision()
    {
        return $this->belongsTo(\App\Models\CatPaisDivision::class, 'cat_pais-division_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catAreaciudad()
    {
        return $this->belongsTo(\App\Models\CatAreaciudad::class, 'cat_areaciudad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catProductos()
    {
        return $this->belongsTo(\App\Models\CatProducto::class, 'cat_productos_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estatus()
    {
        return $this->belongsTo(\App\Models\CatEstatus::class, 'estatus_id');
    }
}
