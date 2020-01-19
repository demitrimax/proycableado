<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class invproveedores
 * @package App\Models
 * @version August 13, 2019, 11:34 am CDT
 *
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property \Illuminate\Database\Eloquent\Collection
 * @property string nombre
 * @property string rfc
 * @property string domicilio
 * @property string telefono
 * @property string contacto
 * @property string observaciones
 */
class invproveedores extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $table = 'inv_catproveedores';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'nombre',
        'rfc',
        'domicilio',
        'telefono',
        'contacto',
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
        'rfc' => 'string',
        'domicilio' => 'string',
        'telefono' => 'string',
        'contacto' => 'string',
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
    public function operaciones()
    {
      return $this->hasMany('App\Models\invoperacion', 'proveedor_id');
    }

}
