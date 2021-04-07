<?php

namespace App\Repositories;

use App\Models\Countries;
use App\Repositories\BaseRepository;

/**
 * Class CountriesRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:42 am UTC
*/

class CountriesRepository extends BaseRepository
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
        return Countries::class;
    }
}
