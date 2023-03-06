<?php

namespace App\Repositories;

use App\Models\RefDinas;
use App\Repositories\BaseRepository;

/**
 * Class RefDinasRepository
 * @package App\Repositories
 * @version February 20, 2023, 1:34 am UTC
*/

class RefDinasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_jenis_dinas',
        'nama_dinas'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RefDinas::class;
    }
}
