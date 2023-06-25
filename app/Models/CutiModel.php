<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class CutiModel extends Model
{
    // Nama tabel
    protected $table = 'pengajuan_cuti';
    protected $guarded = ['idCuti'];

    public function jabatan()
    {
        return $this->belongsTo(JabatanModel::class, 'idJabatan', 'idJabatan');
    }

    public function alasan()
    {
        return $this->belongsTo(AlasanCutiModel::class, 'idMCuti', 'idMCuti');
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'idUsers');
    }

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
}
