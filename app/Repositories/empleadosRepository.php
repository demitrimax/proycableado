<?php

namespace App\Repositories;

use App\Models\empleados;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class empleadosRepository
 * @package App\Repositories
 * @version August 3, 2019, 7:16 pm CDT
 *
 * @method empleados findWithoutFail($id, $columns = ['*'])
 * @method empleados find($id, $columns = ['*'])
 * @method empleados first($columns = ['*'])
*/
class empleadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellidos',
        'curp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return empleados::class;
    }
}
