<?php

namespace App\Repositories;

use App\Models\Pupils;
use App\Repositories\BaseRepository;

/**
 * Class PupilsRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:29 am UTC
*/

class PupilsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'group_id',
        'full_name',
        'birthday',
        'birth_certificate_number',
        'birth_certificate_date',
        'birth_certificate_file',
        'has_certificate'
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
        return Pupils::class;
    }
}
