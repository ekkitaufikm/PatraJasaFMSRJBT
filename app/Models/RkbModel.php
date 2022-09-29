<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class RkbModel extends Model
{
    protected $table = 'rkb';
    protected $guarded = ['id'];

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }

}
