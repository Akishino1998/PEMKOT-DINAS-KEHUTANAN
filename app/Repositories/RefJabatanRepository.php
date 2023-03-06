<?php

namespace App\Repositories;

use App\Models\RefJabatan;
use App\Repositories\BaseRepository;

/**
 * Class RefJabatanRepository
 * @package App\Repositories
 * @version February 20, 2023, 1:27 am UTC
*/

class RefJabatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jabatan'
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
        return RefJabatan::class;
    }
}
