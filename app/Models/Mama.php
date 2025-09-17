<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- namespace sahihi

class Mama extends Model
{
    use HasFactory;

  protected $fillable = [
  'name', 'age', 'id_number', 'contact', 'address', 
  'pregnancy_stage', 'diagnosis', 'results', 'type', 
  'email', 'password', 'user_id'
];


    
    protected $hidden = ['password'];

    public function children() {
        return $this->hasMany(Child::class);
    }

    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function doctors() {
        return $this->belongsToMany(User::class, 'doctor_mama', 'mama_id', 'user_id');
    }

      public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }



public function visitors()
{
    return $this->belongsToMany(User::class, 'mama_visitor', 'mama_id', 'visitor_id')
                ->withPivot('relationship')
                ->withTimestamps();
}

public function reminders()
{
    return $this->hasMany(Reminder::class);
}


public function records()
{
    return $this->hasMany(MamaRecord::class);
}

}
