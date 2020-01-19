<?php

namespace App\Repositories;

use App\Models\catetapa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class catetapaRepository
 * @package App\Repositories
 * @version January 18, 2020, 4:49 pm CST
 *
 * @method catetapa findWithoutFail($id, $columns = ['*'])
 * @method catetapa find($id, $columns = ['*'])
 * @method catetapa first($columns = ['*'])
*/
class catetapaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return catetapa::class;
    }
}
