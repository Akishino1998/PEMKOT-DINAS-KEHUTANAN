<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocUndanganKeluarTujuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'doc_undangan_keluar_tujuan';
    protected $dates = ['deleted_at'];

}
