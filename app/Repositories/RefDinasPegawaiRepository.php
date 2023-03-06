<?php

namespace App\Repositories;

use App\Models\RefDinasPegawai;
use App\Repositories\BaseRepository;

/**
 * Class RefDinasPegawaiRepository
 * @package App\Repositories
 * @version February 20, 2023, 1:35 am UTC
*/

class RefDinasPegawaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_dinas',
        'id_jabatan',
        'nama',
        'nip'
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
        return RefDinasPegawai::class;
    }
}
