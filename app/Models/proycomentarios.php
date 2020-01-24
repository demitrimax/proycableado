<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class proycomentarios extends Model
{
    //

    use SoftDeletes;
    use LogsActivity;

    public $table = 'proy_comentarios';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];


    public $fillable = [
        'comentario',
    ];

    public function usuario()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
