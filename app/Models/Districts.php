<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Districts
 * @package App\Models
 * @version October 28, 2020, 9:41 am UTC
 *
 * @property \App\Models\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $communities
 * @property \Illuminate\Database\Eloquent\Collection $groups
 * @property \Illuminate\Database\Eloquent\Collection $institutions
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property integer $region_id
 * @property string $name
 */
class Districts extends Model
{
    //use SoftDeletes;

    public $table = 'districts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;


    public $fillable = [
        'region_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'region_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'region_id' => 'nullable|integer|required_without:-1',
        'name' => 'nullable|string|max:100'
    ];

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
    public function communities()
    {
        return $this->hasMany(\App\Models\Community::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function groups()
    {
        return $this->hasMany(\App\Models\Group::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function institutions()
    {
        return $this->hasMany(\App\Models\Institution::class, 'district_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teachers()
    {
        return $this->hasMany(\App\Models\Teacher::class, 'district_id');
    }
}
