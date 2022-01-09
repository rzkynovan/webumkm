<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dagangan extends Model
{
    use HasFactory;
    protected $table = "dagangan";
    protected $fillable = [
        'umkm_id', 'nama', 'deskripsi', 'harga'
    ];


    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'id');
    }
}
