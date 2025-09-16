<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'dob',
    'mama_id',
    'health_status',
    'diagnosis',
    'results',
];


    public function mama() {
        return $this->belongsTo(Mama::class);
    }

    public function vaccinations() {
        return $this->hasMany(Vaccination::class);
    }

    public function growthMonitorings() {
        return $this->hasMany(GrowthMonitoring::class);
    }
}
