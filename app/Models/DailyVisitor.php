<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyVisitor extends Model
{
    protected $fillable = [
        'visited_on',
        'visitor_id',
        'first_seen_at',
    ];

    protected $casts = [
        'visited_on' => 'date',
        'first_seen_at' => 'datetime',
    ];
}

