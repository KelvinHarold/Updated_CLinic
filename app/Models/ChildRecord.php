<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'diagnosis',
        'results',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
