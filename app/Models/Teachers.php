<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teachers
 * @package App\Models
 * @version October 28, 2020, 6:40 am UTC
 *
 * @property \App\Models\District $district
 * @property \App\Models\EducationDegree $educationDegree
 * @property \App\Models\Institution $institution
 * @property \App\Models\Region $region
 * @property \Illuminate\Database\Eloquent\Collection $groupsTeachers
 * @property \Illuminate\Database\Eloquent\Collection $institutionsTeachersGroups
 * @property string $full_name
 * @property string $birthday
 * @property integer $education_degree_id
 * @property string $specialization
 * @property string $education_document_name
 * @property string $education_document_file
 * @property string $education_document_number
 * @property string $education_document_date
 * @property integer $district_id
 * @property integer $region_id
 * @property integer $institution_id
 */
class Teachers extends Model
{
    //use SoftDeletes;

    public $table = 'teachers';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;


    public $fillable = [
        'full_name',
        'birthday',
        'education_degree_id',
        'specialization',
        'education_document_name',
        'education_document_file',
        'education_document_number',
        'education_document_date',
        'district_id',
        'region_id',
        'institution_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_name' => 'string',
        'birthday' => 'date',
        'education_degree_id' => 'integer',
        'specialization' => 'string',
        'education_document_name' => 'string',
        //'education_document_file' => 'string',
        'education_document_number' => 'string',
        'education_document_date' => 'date',
        'district_id' => 'integer',
        'region_id' => 'integer',
        'institution_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'nullable|string|max:100',
        'birthday' => 'nullable',
        'education_degree_id' => 'required|integer|required_without:-1',
        'specialization' => 'nullable|string|max:200',
        'education_document_name' => 'nullable|string|max:200',
        //'education_document_file' => 'required',
        'education_document_number' => 'nullable|string|max:50',
        'education_document_date' => 'nullable',
        'district_id' => 'required|integer|required_without:-1',
        'region_id' => 'required|integer|required_without:-1',
        'institution_id' => 'required|integer|required_without:-1'
    ];

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
    public function educationDegree()
    {
        return $this->belongsTo(\App\Models\EducationDegree::class, 'education_degree_id');
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
        return $this->hasMany(\App\Models\GroupsTeacher::class, 'teacher_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function institutionsTeachersGroups()
    {
        return $this->hasMany(\App\Models\InstitutionsTeachersGroup::class, 'teacher_id');
    }
}
