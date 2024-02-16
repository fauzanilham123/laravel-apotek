<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Drugs extends Model
{
    use HasFactory,Sortable;
     protected $fillable =  [
        'id',
        'kode_obat',
        'nama_obat',
        'expired_date',
        'jumlah',
        'harga',
        'flag'
    ];
     public $sortable = [ 
        'id',
        'kode_obat',
        'nama_obat',
        'expired_date',
        'jumlah',
        'harga',
        'flag'];
}