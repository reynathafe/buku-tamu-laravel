<?php

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['nama', 'tanggal', 'asal_instansi', 'plat_kendaraan', 'kebutuhan'];
}
