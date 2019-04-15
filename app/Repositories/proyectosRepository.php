<?php

namespace App\Repositories;

use App\Models\proyectos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class proyectosRepository
 * @package App\Repositories
 * @version April 15, 2019, 1:17 pm UTC
 *
 * @method proyectos findWithoutFail($id, $columns = ['*'])
 * @method proyectos find($id, $columns = ['*'])
 * @method proyectos first($columns = ['*'])
*/
class proyectosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'supervidor',
        'finicio',
        'ftermino',
        'identificacion',
        'cat_cotratistas_id',
        'cat_pais-division_id',
        'cat_areaciudad_id',
        'cat_productos_id',
        'estatus_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return proyectos::class;
    }
}
