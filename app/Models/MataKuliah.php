<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'KodeMataKuliah',
        'MataKuliah',
        'JumlahPertemuan',
        'link',
        'idUser',
    ];

    protected $table = 'matakuliah';

    public static function createCode()
    {
        $latestCode = self::orderBy('KodeMataKuliah', 'desc')->value('KodeMataKuliah');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'MK' . $formattedCodeNumber;
    }

    public function matkul()
    {
        return $this->hasMany(DetailPertemuan::class,'KodeMataKuliah');
    }
}
