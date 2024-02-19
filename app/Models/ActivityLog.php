<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class ActivityLog extends Model
{
    use HasFactory,Sortable;

    protected $table = 'activity_log';

    protected $fillable = [
        'id',
        'causer_id',
        'time',
        'description',
    ];
    public $sortable = [
        'id',
        'causer_id',
        'time',
        'description',
    ];

    public function causer() 
{
    return $this->belongsTo(User::class, 'causer_id');
}
}