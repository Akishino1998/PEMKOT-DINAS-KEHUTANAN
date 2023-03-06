<?php

namespace App\Repositories;

use App\Models\RefDinasJenis;
use App\Repositories\BaseRepository;

/**
 * Class RefDinasJenisRepository
 * @package App\Repositories
 * @version February 20, 2023, 1:32 am UTC
*/

class RefDinasJenisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis_dinas'
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
        return RefDinasJenis::class;
    }
}
