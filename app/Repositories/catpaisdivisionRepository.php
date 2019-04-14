<?php

namespace App\Repositories;

use App\Models\catpaisdivision;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catpaisdivisionRepository
 * @package App\Repositories
 * @version April 14, 2019, 4:32 am UTC
 *
 * @method catpaisdivision findWithoutFail($id, $columns = ['*'])
 * @method catpaisdivision find($id, $columns = ['*'])
 * @method catpaisdivision first($columns = ['*'])
*/
class catpaisdivisionRepository extends BaseRepository
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
        return catpaisdivision::class;
    }
}
