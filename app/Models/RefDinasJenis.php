<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RefDinasJenis
 * @package App\Models
 * @version February 20, 2023, 1:32 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $refDinas
 * @property string $jenis_dinas
 */
class RefDinasJenis extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ref_dinas_jenis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'jenis_dinas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis_dinas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jenis_dinas' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function refDinas()
    {
        return $this->hasMany(\App\Models\RefDina::class, 'id_jenis_dinas');
    }
}
