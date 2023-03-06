<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocDisposisiDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'doc_disposisi_detail';
    protected $dates = ['deleted_at'];

}
