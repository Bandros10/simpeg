<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai_penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['id_pegawai','id_evaluasi','instrumen','nilai'];
    protected $primarykey = 'id_pegawai';
}
