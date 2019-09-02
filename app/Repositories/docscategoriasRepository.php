<?php

namespace App\Repositories;

use App\Models\docscategorias;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class docscategoriasRepository
 * @package App\Repositories
 * @version September 1, 2019, 8:38 pm CDT
 *
 * @method docscategorias findWithoutFail($id, $columns = ['*'])
 * @method docscategorias find($id, $columns = ['*'])
 * @method docscategorias first($columns = ['*'])
*/
class docscategoriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return docscategorias::class;
    }
}
