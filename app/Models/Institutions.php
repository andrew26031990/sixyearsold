<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Institutions
 * @package App\Models
 * @version October 28, 2020, 9:29 am UTC
 *
 * @property \App\Models\Country $country
 * @property \App\Models\District $district
 * @property \App\Models\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $groups
 * @property \Illuminate\Database\Eloquent\Collection $institutionUsers
 * @property \Illuminate\Database\Eloquent\Collection $institutionsTeachersGroups
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $district_id
 * @property string $name
 * @property string $address
 * @property string $code
 */
class Institutions extends Model
{
    //use SoftDeletes;

    public $table = 'institutions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;


    public $fillable = [
        'country_id',
        'region_id',
        'district_id',
        'name',
        'address',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        //'country_id' => 'integer',
        'region_id' => 'integer',
        'district_id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'country_id' => 'nullable|integer|required_without:-1',
        'region_id' => 'nullable|integer|required_without:-1',
        'district_id' => 'nullable|integer|required_without:-1',
        'name' => 'nullable|string|max:250',
        'address' => 'nullable|string',
        'code' => 'nullable|string|max:50'
    ];

    protected $attributes = [
        'country_id' => 1,
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
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'region_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function groups()
    {
        return $this->hasMany(\App\Models\Group::class, 'institution_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function institutionUsers()
    {
        return $this->hasMany(\App\Models\InstitutionUser::class, 'institution_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function institutionsTeachersGroups()
    {
        return $this->hasMany(\App\Models\InstitutionsTeachersGroup::class, 'institution_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teachers()
    {
        return $this->hasMany(\App\Models\Teacher::class, 'institution_id');
    }
}
