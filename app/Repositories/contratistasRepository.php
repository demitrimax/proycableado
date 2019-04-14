<?php

namespace App\Repositories;

use App\Models\contratistas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class contratistasRepository
 * @package App\Repositories
 * @version April 14, 2019, 7:25 am UTC
 *
 * @method contratistas findWithoutFail($id, $columns = ['*'])
 * @method contratistas find($id, $columns = ['*'])
 * @method contratistas first($columns = ['*'])
*/
class contratistasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'rfc',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return contratistas::class;
    }
}
