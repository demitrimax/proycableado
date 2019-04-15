<?php

namespace App\Repositories;

use App\Models\catproductos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catproductosRepository
 * @package App\Repositories
 * @version April 15, 2019, 12:13 am UTC
 *
 * @method catproductos findWithoutFail($id, $columns = ['*'])
 * @method catproductos find($id, $columns = ['*'])
 * @method catproductos first($columns = ['*'])
*/
class catproductosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catproductos::class;
    }
}
