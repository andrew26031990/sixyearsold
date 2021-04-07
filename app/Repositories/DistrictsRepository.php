<?php

namespace App\Repositories;

use App\Models\Districts;
use App\Repositories\BaseRepository;

/**
 * Class DistrictsRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:41 am UTC
*/

class DistrictsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'region_id',
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
        return Districts::class;
    }
}
