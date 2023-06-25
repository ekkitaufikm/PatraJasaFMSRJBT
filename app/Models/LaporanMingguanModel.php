<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanMingguanModel extends Model
{
    protected $table = 'laporan_mingguan';
    protected $guarded = ['id'];

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'idUsers');
    }
}
