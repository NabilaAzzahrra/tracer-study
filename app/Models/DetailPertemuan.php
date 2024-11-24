<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPertemuan extends Model
{
    protected $fillable = [
        'KodePertemuan',
        'KodeMataKuliah',
        'pertemuan',
    ];

    protected $table = 'detail_pertemuan';

    public function pertemuan()
    {
        return $this->hasMany(DetailMateri::class, 'KodePertemuan', 'KodePertemuan');
    }

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class,'KodeMataKuliah', 'KodeMataKuliah');
    }
}
