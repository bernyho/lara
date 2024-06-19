<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'items',
        'duration',
        'started_at',
        'finished_at',
        'applied_to_all_items',
        'user_id',
        'rules',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'applied_to_all_items' => 'boolean',
    ];
}
