<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class LogActivity extends Model
{
    use HasFactory,Sortable;
    protected $fillable = [
        'id_user',
        'time',
        'activity',
    ];
    public $sortable = [
        'id',
        'id_user',
        'time',
        'activity',
    ];
}