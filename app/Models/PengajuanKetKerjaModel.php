<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanKetKerjaModel extends Model
{
    // Nama tabel
    protected $table = 'pengajuan_ketkerja';
    protected $guarded = ['idPKetkerja'];

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
}
