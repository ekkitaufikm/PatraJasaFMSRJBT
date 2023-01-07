<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoModel extends Model
{
    // Nama tabel
    protected $table = 'memo';
    protected $guarded = ['idMemo'];
}
