<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'program_id',
        'message',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
