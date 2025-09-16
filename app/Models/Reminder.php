<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'mama_id',
        'child_id',
        'title',
        'description',
        'reminder_date',
        'status',
    ];

    public function mama() {
        return $this->belongsTo(Mama::class);
    }

    public function child() {
        return $this->belongsTo(Child::class);
    }
}
