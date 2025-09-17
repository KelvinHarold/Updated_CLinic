<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MamaRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'mama_id',
        'diagnosis',
        'results',
    ];

    // MamaRecord inahusiana na Mama
    public function mama()
    {
        return $this->belongsTo(Mama::class);
    }
}
