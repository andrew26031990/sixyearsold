<?php

namespace App\Repositories;

use App\Models\Teachers;
use App\Repositories\BaseRepository;

/**
 * Class TeachersRepository
 * @package App\Repositories
 * @version October 28, 2020, 6:40 am UTC
*/

class TeachersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'birthday',
        'education_degree_id',
        'specialization',
        'education_document_name',
        'education_document_file',
        'education_document_number',
        'education_document_date',
        'district_id',
        'region_id',
        'institution_id'
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
        return Teachers::class;
    }
}
