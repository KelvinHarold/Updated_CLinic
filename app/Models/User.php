<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'address',
         'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    // Relations
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function chats() {
        return $this->hasMany(Chat::class);
    }

public function relatives()
{
    return $this->belongsToMany(Mama::class, 'mama_visitor', 'visitor_id', 'mama_id')
                ->withPivot('relationship')
                ->withTimestamps();
}


public function mamas() {
    return $this->belongsToMany(Mama::class, 'mama_visitor', 'visitor_id', 'mama_id');
}

public function mama() {
    return $this->hasOne(Mama::class, 'user_id'); // assuming mama.user_id links to this user
}



}
