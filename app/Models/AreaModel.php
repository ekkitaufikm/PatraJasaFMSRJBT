<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaModel extends Model
{
    // Nama tabel
    protected $table = 'master_area';
    protected $guarded = ['idArea'];

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'idUsers', 'idUsers');
    }
}
