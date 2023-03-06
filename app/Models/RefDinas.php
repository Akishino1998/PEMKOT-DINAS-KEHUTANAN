<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class RefDinas
 * @package App\Models
 * @version February 20, 2023, 1:34 am UTC
 *
 * @property \App\Models\RefDinasJeni $idJenisDinas
 * @property \Illuminate\Database\Eloquent\Collection $docSuratKeluars
 * @property \Illuminate\Database\Eloquent\Collection $docSuratMasuks
 * @property \Illuminate\Database\Eloquent\Collection $refDinasPegawais
 * @property \Illuminate\Database\Eloquent\Collection $surats
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property integer $id_jenis_dinas
 * @property string $nama_dinas
 */
class RefDinas extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ref_dinas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_jenis_dinas',
        'nama_dinas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_jenis_dinas' => 'integer',
        'nama_dinas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_jenis_dinas' => 'nullable|integer',
        'nama_dinas' => 'nullable|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

  
    public function JenisDinas()
    {
        return $this->belongsTo(RefDinasJenis::class, 'id_jenis_dinas', 'id');
    }
  
    public function PegawaiTTD()
    {
        return $this->hasMany(RefDinasTTD::class, 'id_dinas', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function docSuratKeluars()
    {
        return $this->hasMany(\App\Models\DocSuratKeluar::class, 'pembuat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function docSuratMasuks()
    {
        return $this->hasMany(\App\Models\DocSuratMasuk::class, 'pengirim');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function refDinasPegawais()
    {
        return $this->hasMany(\App\Models\RefDinasPegawai::class, 'id_dinas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function surats()
    {
        return $this->hasMany(\App\Models\Surat::class, 'id_dinas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'dinas');
    }
}
