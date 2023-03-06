<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratView extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'surat_track_view';
    protected $dates = ['deleted_at'];

}
