<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class SPeringatanModel extends Model
{
    // Nama tabel
    protected $table = 'surat_peringatan';
    protected $guarded = ['idSPeringatan'];

    public function jabatan()
    {
        return $this->belongsTo(JabatanModel::class, 'idJabatan', 'idJabatan');
    }

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }

    public function peringatan()
    {
        return $this->belongsTo(MPeringatanModel::class, 'idPeringatan', 'idPeringatan');
    }
}
