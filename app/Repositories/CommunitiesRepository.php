<?php

namespace App\Repositories;

use App\Models\Communities;
use App\Repositories\BaseRepository;

/**
 * Class CommunitiesRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:43 am UTC
*/

class CommunitiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'district_id',
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
        return Communities::class;
    }
}
