<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class bodegas
 * @package App\Models
 * @version August 8, 2019, 10:40 am CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string ubicacion
 */
class bodegas extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'cat_bodegas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'nombre',
        'ubicacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'ubicacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    protected $appends = ['stockpro'];

    public function operacioninvent()
    {
      return $this->hasMany('App\Models\invdetoperacion', 'bodega_id');
    }
    public function stockpro($productoid)
    {
      $entradas = invdetoperacion::where('tipo_operacion', 'Entrada')
                                    ->where('bodega_id', $this->id)
                                    ->where('producto_id', $productoid)
                                    ->where('estatus', 't')
                                    ->sum('cantidad');

      $entradasP = invdetoperacion::where('tipo_operacion', 'Entrada')
                                    ->where('bodega_id', $this->id)
                                    ->where('producto_id', $productoid)
                                    ->where('estatus', 'p')
                                    ->sum('parcial');

       $entradas = $entradas + $entradasP;

       $salidas = invdetoperacion::where('tipo_operacion', 'Salida')
                                    ->where('bodega_id', $this->id)
                                    ->where('producto_id', $productoid)
                                    ->where('estatus', 't')
                                    ->sum('cantidad');
      return $entradas-$salidas;
    }


}
