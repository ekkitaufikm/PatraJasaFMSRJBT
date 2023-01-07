<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanLemburModel extends Model
{
    // Nama tabel
    protected $table = 'pengajuan_lembur';
    protected $guarded = ['idPLembur'];

    public function jabatan()
    {
        return $this->belongsTo(JabatanModel::class, 'idJabatan', 'idJabatan');
    }

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
}
