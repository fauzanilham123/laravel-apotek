<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class transaction extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'no',
        'date',
        'nama_kasir',
        'total_bayar',
        'id_user',
        'id_drug',
        'id_recipe',
        'flag',
    ];
    public $sortable = [
        'no',
        'date',
        'nama_kasir',
        'total_bayar',
        'id_user',
        'id_drug',
        'id_resep',
        'flag',
    ];
}