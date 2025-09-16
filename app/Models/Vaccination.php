<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'vaccine_name',
        'date_given',
        'next_due',
    ];

    public function child() {
        return $this->belongsTo(Child::class);
    }
}
