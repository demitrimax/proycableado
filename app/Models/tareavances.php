<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class tareavances extends Model
{
    //
    use SoftDeletes;
    use LogsActivity;

    public $table = 'tareavances';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'concepto',
        'comentario',
        'avancepor',
        'tarea_id'
    ];

}
