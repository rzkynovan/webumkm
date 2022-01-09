<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = "umkm";
    protected $fillable = [
        'nama', 'usaha', 'no_hp', 'email', 'rintis'
    ];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'umkm_id', 'id');
    }
    public function dagangan()
    {
        return $this->hasMany(Dagangan::class, 'umkm_id', 'id');
    }
}
