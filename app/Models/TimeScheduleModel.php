<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeScheduleModel extends Model
{
    protected $table = 'time_schedule';
    protected $guarded = ['id'];

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
}
