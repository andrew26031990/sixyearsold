<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pupils
 * @package App\Models
 * @version October 28, 2020, 9:29 am UTC
 *
 * @property \App\Models\Group $group
 * @property integer $group_id
 * @property string $full_name
 * @property string $birthday
 * @property string $birth_certificate_number
 * @property string $birth_certificate_date
 * @property string $birth_certificate_file
 * @property boolean $has_certificate
 */
class Pupils extends Model
{
    //use SoftDeletes;

    public $table = 'pupils';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    public $timestamps = false;


    public $fillable = [
        'group_id',
        'full_name',
        'birthday',
        'birth_certificate_number',
        'birth_certificate_date',
        'birth_certificate_file',
        'has_certificate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'group_id' => 'integer',
        'full_name' => 'string',
        'birthday' => 'date',
        'birth_certificate_number' => 'string',
        'birth_certificate_date' => 'date',
        //'birth_certificate_file' => 'string',
        'has_certificate' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'group_id' => 'nullable|integer|required_without:-1',
        'full_name' => 'nullable|string|max:100',
        'birthday' => 'nullable',
        'birth_certificate_number' => 'nullable|string|max:50',
        'birth_certificate_date' => 'nullable',
        'birth_certificate_file' => 'required',
        'has_certificate' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function group()
    {
        return $this->belongsTo(\App\Models\Group::class, 'group_id');
    }
}
