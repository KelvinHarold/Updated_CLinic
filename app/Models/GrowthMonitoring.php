<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class GrowthMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'weight',
        'height',
        'head_circumference',
        'date',
    ];

    public function child() {
        return $this->belongsTo(Child::class);
    }
}
