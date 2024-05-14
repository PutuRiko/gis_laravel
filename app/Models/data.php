<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;

    protected $table = 'tb_rs';

    protected $fillable = ['nama_rs','latitude_rs','longitude_rs','gambar_rs'];

    public $timestamps = false;
}

