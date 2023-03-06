<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RefJabatan
 * @package App\Models
 * @version February 20, 2023, 1:27 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $refDinasPegawais
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $jabatan
 */
class RefJabatan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ref_jabatan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'jabatan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jabatan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'jabatan' => 'nullable|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function refDinasPegawais()
    {
        return $this->hasMany(\App\Models\RefDinasPegawai::class, 'id_jabatan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'jabatan');
    }
    
    public function JenisDinas()
    {
        return $this->belongsTo(RefDinasJenis::class, 'id_jenis_dinas', 'id');
    }
}
