<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class documentos
 * @package App\Models
 * @version May 16, 2019, 1:04 pm CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre_doc
 * @property string file_servidor
 * @property string descripcion
 */
class documentos extends Model
{
    use SoftDeletes;

    public $table = 'documentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_doc',
        'file_servidor',
        'descripcion',
        'categoria_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
        'nombre_doc'      => 'string',
        'file_servidor'   => 'string',
        'descripcion'     => 'string',
        'categoria_id'    => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_doc' => 'required',
    ];

    public function proyectos()
    {
      return $this->belongsToMany('App\Models\proyectos');
    }

    public function categoria()
    {
      return $this->belongsTo('App\Models\docscategorias', 'categoria_id');
    }


}
