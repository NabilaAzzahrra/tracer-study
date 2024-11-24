<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailMateri extends Model
{
    protected $fillable = [
        'KodeMateri',
        'KodePertemuan',
        'judul',
        'materi',
    ];

    protected $table = 'detail_materi';

    public static function createCode()
    {
        $latestCode = self::orderBy('KodeMateri', 'desc')->value('KodeMateri');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'MT' . $formattedCodeNumber;
    }

    public function pertemuan()
    {
        return $this->belongsTo(DetailPertemuan::class, 'KodePertemuan', 'KodePertemuan');
    }
}
