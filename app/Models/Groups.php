<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Groups
 * @package App\Models
 * @version October 28, 2020, 9:39 am UTC
 *
 * @property \App\Models\Country $country
 * @property \App\Models\District $district
 * @property \App\Models\Institution $institution
 * @property \App\Models\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $groupsTeachers
 * @property \Illuminate\Database\Eloquent\Collection $institutionsTeachersGroups
 * @property \Illuminate\Database\Eloquent\Collection $pupils
 * @property string $name
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $district_id
 * @property integer $institution_id
 * @property string $address
 */
class Groups extends Model
{
    //use SoftDeletes;

    public $table = 'groups';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;


    public $fillable = [
        'name',
        'country_id',
        'region_id',
        'district_id',
        'institution_id',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        //'country_id' => 'integer',
        'region_id' => 'integer',
        'district_id' => 'integer',
        'institution_id' => 'integer',
        'address' => 'string'
    ];

    protected $attributes = [
        'country_id' => 1,
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        //'country_id' => 'nullable|integer|required_without:-1',
        'region_id' => 'nullable|integer|required_without:-1',
        'district_id' => 'nullable|integer|required_without:-1',
        'institution_id' => 'nullable|integer|required_without:-1',
        'address' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function institution()
    {
        return $this->belongsTo(\App\Models\Institution::class, 'institution_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'region_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function groupsTeachers()
    {
        return $this->hasMany(\App\Models\GroupsTeacher::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function institutionsTeachersGroups()
    {
        return $this->hasMany(\App\Models\InstitutionsTeachersGroup::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pupils()
    {
        return $this->hasMany(\App\Models\Pupil::class, 'group_id');
    }
}
