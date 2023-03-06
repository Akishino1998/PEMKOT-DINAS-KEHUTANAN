<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratTrack extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'surat_track';
    protected $dates = ['deleted_at'];
    function setTrackSurat($id, $keterangan){
        $track = new SuratTrack;
        $track->id_surat = $id;
        $track->keterangan = $keterangan;
        $track->tgl_track = NOW();
        $track->save();
    }
}
