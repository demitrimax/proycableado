<?php

namespace App\Repositories;

use App\Models\documentos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class documentosRepository
 * @package App\Repositories
 * @version May 16, 2019, 1:04 pm CDT
 *
 * @method documentos findWithoutFail($id, $columns = ['*'])
 * @method documentos find($id, $columns = ['*'])
 * @method documentos first($columns = ['*'])
*/
class documentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_doc',
        'file_servidor',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return documentos::class;
    }
}
