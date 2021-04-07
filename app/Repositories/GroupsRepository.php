<?php

namespace App\Repositories;

use App\Models\Groups;
use App\Repositories\BaseRepository;

/**
 * Class GroupsRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:39 am UTC
*/

class GroupsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'country_id',
        'region_id',
        'district_id',
        'institution_id',
        'address'
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
        return Groups::class;
    }
}
