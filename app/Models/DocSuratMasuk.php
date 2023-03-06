<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocSuratMasuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'doc_surat_masuk';
    protected $dates = ['deleted_at'];
    public function Dinas(){
        return $this->belongsTo(RefDinas::class, 'pengirim', 'id');
    }
}
