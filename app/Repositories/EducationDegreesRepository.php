<?php

namespace App\Repositories;

use App\Models\EducationDegrees;
use App\Repositories\BaseRepository;

/**
 * Class EducationDegreesRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:43 am UTC
*/

class EducationDegreesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return EducationDegrees::class;
    }
}
