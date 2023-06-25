<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class MPeringatanModel extends Model
{
    // Nama tabel
    protected $table = 'peringatan';
    protected $guarded = ['idPeringatan'];
}
