<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class invprestamos extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;

    public $table = 'inv_prestamos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'producto_id',
        'empleado_id',
        'resguardofile',
        'fecha',
        'devuelto_en'
    ];

    protected $casts = [
      'producto_id'       =>'integer',
      'empleado_id'       =>'integer',
      'resguardofile'     =>'string',
      'fecha'             =>'date',
      'devuelto_en'       =>'date',
    ];

    public function producto()
    {
      return $this->belongsTo('App\Models\productos', 'producto_id');
    }
    public function empleado()
    {
      return $this->belongsTo('App\Models\empleados', 'empleado_id');
    }
}
