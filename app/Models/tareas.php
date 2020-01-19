<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class tareas
 * @package App\Models
 * @version May 21, 2019, 11:19 am CDT
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string descripcion
 * @property string vencimiento
 * @property integer user_id
 */
class tareas extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'tareas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'nombre',
        'descripcion',
        'vencimiento',
        'user_id'
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
        'vencimiento' => 'date',
        'user_id'     => 'integer',
        'viewed_at'   => 'date',
        'terminado'   => 'date',
        'avance_porc' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    public function avances()
    {
      return $this->hasMany('App\Models\tareavances', 'tarea_id');
    }

    public function getEstatusdateAttribute()
    {
      $fechaTermino = Carbon::parse($this->vencimiento);
      $fechaActual = Carbon::parse(date('Y-m-d'));

      $diasDiferencia = $fechaActual->diffInDays($fechaTermino, false);
      $valor = "";
      $desc = "";
      if ($diasDiferencia < 0 ) {
        $valor = "danger";
        $desc = "Vencido tiene ".$diasDiferencia." días.";
      }
      if ($diasDiferencia >= 0 && $diasDiferencia < 5 ) {
        $valor = "warning";
        $desc = "Por terminar plazo, le quedan ".$diasDiferencia." días.";
      }
      if ($diasDiferencia >= 5 ) {
          $valor = "success";
          $desc = "En tiempo, le quedan ".$diasDiferencia." días.";
        }
      if ($this->avance_porc == 100){
        $valor = "info";
        $desc = "Tarea completada.";
      }

        $estatus = ['valor' => $valor, 'descripcion' => $desc ,'diferencia' => $diasDiferencia];

      return $estatus;
    }
}
