<?php

namespace App\Repositories;

use App\Models\Regions;
use App\Repositories\BaseRepository;

/**
 * Class RegionsRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:27 am UTC
*/

class RegionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
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
        return Regions::class;
    }
}
