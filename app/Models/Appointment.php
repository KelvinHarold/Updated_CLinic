<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'mama_id',
        'user_id',
        'date',
        'time',
        'type',
        'status', // pending, completed, cancelled
        'feedback',
    ];

    public function mama() {
        return $this->belongsTo(Mama::class);
    }

    public function doctor() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

