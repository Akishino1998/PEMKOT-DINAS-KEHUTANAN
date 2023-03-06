<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surat extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'surat';
    protected $dates = ['deleted_at'];
    function cekRead($idSurat){
        $surat = Surat::find($idSurat);
        if (!empty($surat)) {
            $suratTrackView = $surat->SuratViewTrack->where('id_user',auth()->user()->id);
            if (COUNT($suratTrackView)>0) {
                if ($suratTrackView->first()->terbaca == "N") {
                    return true;
                }
            }
        }
        return false;
    }
  
    public function SuratViewTrack()
    {
        return $this->hasMany(SuratView::class, 'id_surat', 'id');
    }
    public function getPengirimSuratMasuk($idSurat){
        $surat = Surat::find($idSurat);
        if ($surat->id_jenis_surat == 1) {
            $surat = $surat->DocSuratMasuk;
            return $surat;
        }elseif($surat->id_jenis_surat == 6){
            $surat = $surat->DocUndanganKeluar;
            return $surat;
        }
    }
    public function Dinas(){
        return $this->belongsTo(RefDinas::class, 'id_dinas', 'id');
    }
    public function JenisSurat()
    {
        return $this->belongsTo(RefJenisSurat::class, 'id_jenis_surat', 'id');
    }
  
    public function DocSuratMasuk()
    {
        return $this->hasOne(DocSuratMasuk::class, 'id_surat', 'id');
    }
    public function DocUndanganKeluar()
    {
        return $this->hasOne(DocUndanganKeluar::class, 'id_surat', 'id');
    }
}
