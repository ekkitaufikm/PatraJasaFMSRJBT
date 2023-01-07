<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistModel extends Model
{
    // softdelete itu untuk fitur dari laravel. User hapus, data untuk user hilang tapi di tabel tidak hilang. cuma di hiden
    // use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'checklist';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'idUsers');
    }

    public function area()
    {
        return $this->belongsTo(AreaModel::class, 'idArea', 'idArea');
    }
}
