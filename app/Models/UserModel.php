<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    // softdelete itu untuk fitur dari laravel. User hapus, data untuk user hilang tapi di tabel tidak hilang. cuma di hiden
    // use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'users';
    protected $guarded = ['idUsers'];

    public function kelamin()
    {
        return $this->belongsTo(KelaminModel::class, 'idKelamin', 'idKelamin');
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanModel::class, 'idJabatan', 'idJabatan');
    }

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }

    public function agama()
    {
        return $this->belongsTo(AgamaModel::class, 'idAgama', 'idAgama');
    }

    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'idStatus', 'idStatus');
    }

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'idRole', 'idRole');
    }
}
