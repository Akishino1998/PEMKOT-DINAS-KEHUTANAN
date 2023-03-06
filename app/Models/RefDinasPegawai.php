<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RefDinasPegawai
 * @package App\Models
 * @version February 20, 2023, 1:35 am UTC
 *
 * @property \App\Models\RefDina $idDinas
 * @property \App\Models\RefJabatan $idJabatan
 * @property \App\Models\User $idUser
 * @property \Illuminate\Database\Eloquent\Collection $docDisposisis
 * @property integer $id_user
 * @property integer $id_dinas
 * @property integer $id_jabatan
 * @property string $nama
 * @property string $nip
 */
class RefDinasPegawai extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ref_dinas_pegawai';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_user',
        'id_dinas',
        'id_jabatan',
        'nama',
        'nip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_user' => 'integer',
        'id_dinas' => 'integer',
        'id_jabatan' => 'integer',
        'nama' => 'string',
        'nip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'nullable|integer',
        'id_dinas' => 'nullable|integer',
        'id_jabatan' => 'nullable|integer',
        'nama' => 'nullable|string|max:100',
        'nip' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    
    public function Dinas()
    {
        return $this->belongsTo(\App\Models\RefDinas::class, 'id_dinas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function Jabatan()
    {
        return $this->belongsTo(\App\Models\RefJabatan::class, 'id_jabatan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function User()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function docDisposisis()
    {
        return $this->hasMany(\App\Models\DocDisposisi::class, 'id_pegawai');
    }
}
