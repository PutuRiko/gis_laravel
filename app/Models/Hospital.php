<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'tb_rs'; // Nama tabel di database

    protected $primaryKey = 'id_rs'; // Primary key di tabel Anda

    protected $fillable = ['nama_rs', 'latitude_rs', 'longitude_rs', 'gambar_rs']; // Kolom yang dapat diisi secara massal

    public $timestamps = false;
    // Tambahkan relasi atau metode lain sesuai kebutuhan aplikasi

    public function getGambarExtensionAttribute()
    {
        $extension = pathinfo($this->gambar_rs, PATHINFO_EXTENSION);
        return $extension === 'jpg' ? 'jpeg' : $extension; // Misalnya, konversi ekstensi 'jpg' menjadi 'jpeg'
    }

}
