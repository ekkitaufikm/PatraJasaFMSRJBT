<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PIzinModel extends Model
{
     // Nama tabel
     protected $table = 'pengajuan_izin';
     protected $guarded = ['idPIzin'];
 
     public function jabatan()
     {
         return $this->belongsTo(JabatanModel::class, 'idJabatan', 'idJabatan');
     }
 
     public function area()
     {
         return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
     }
}
