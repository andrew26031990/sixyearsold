<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EducationDegrees
 * @package App\Models
 * @version October 28, 2020, 9:43 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property string $name
 */
class EducationDegrees extends Model
{
    //use SoftDeletes;

    public $table = 'education_degrees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function teachers()
    {
        return $this->hasMany(\App\Models\Teacher::class, 'education_degree_id');
    }
}
