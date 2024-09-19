<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nama',
        'tanggal_lahir',
        'nama_wali',
        'alamat',
        'no_telp',
        'email',
        'angkatan',
        'kelas',
    ];


    public function biaya()
    {
        return $this->belongsTo(Biaya::class);
    }
}
