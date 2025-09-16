<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id', // doctor
        'date',
    ];

    public function doctor() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

