<?php

namespace App\Repositories;

use App\Models\tareas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tareasRepository
 * @package App\Repositories
 * @version May 21, 2019, 11:19 am CDT
 *
 * @method tareas findWithoutFail($id, $columns = ['*'])
 * @method tareas find($id, $columns = ['*'])
 * @method tareas first($columns = ['*'])
*/
class tareasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'vencimiento',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tareas::class;
    }
}
