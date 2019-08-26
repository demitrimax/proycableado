<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class asistencia extends Model
{
    //

    use SoftDeletes;

    public $table = 'asistencias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'empleado_id',
        'fecha',
        'retraso',
        'extra'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'            => 'integer',
        'empleado_id'   => 'integer',
        'fecha'         => 'date',
        'retraso'       => 'boolean',
        'extra'         => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empleado_id' => 'required',
        'fecha'       => 'required'
    ];

    public function empleado()
    {
      return $this->belongsTo('App\Models\empleados', 'empleado_id');
    }

}
