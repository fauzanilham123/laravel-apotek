<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class recipe extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'no',
        'date',
        'nama_dokter',
        'nama_pasien',
        'id_obat',
        'jumlah_obat',
        'flag',
    ];
    public $sortable = [
        'id',
        'no',
        'date',
        'nama_dokter',
        'nama_pasien',
        'id_obat',
        'jumlah_obat',
        'flag',
    ];

     public function obat()
    {
        return $this->belongsTo(Drugs::class, 'id_obat');
    }

    
}