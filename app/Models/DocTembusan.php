<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocTembusan extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'doc_tembusan';
    protected $dates = ['deleted_at'];
}
