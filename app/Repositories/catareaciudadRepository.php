<?php

namespace App\Repositories;

use App\Models\catareaciudad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catareaciudadRepository
 * @package App\Repositories
 * @version April 14, 2019, 6:06 am UTC
 *
 * @method catareaciudad findWithoutFail($id, $columns = ['*'])
 * @method catareaciudad find($id, $columns = ['*'])
 * @method catareaciudad first($columns = ['*'])
*/
class catareaciudadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'activo',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catareaciudad::class;
    }
}
