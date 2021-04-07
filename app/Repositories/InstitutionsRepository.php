<?php

namespace App\Repositories;

use App\Models\Institutions;
use App\Repositories\BaseRepository;

/**
 * Class InstitutionsRepository
 * @package App\Repositories
 * @version October 28, 2020, 9:29 am UTC
*/

class InstitutionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'region_id',
        'district_id',
        'name',
        'address',
        'code'
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
        return Institutions::class;
    }
}
