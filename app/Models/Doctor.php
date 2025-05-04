<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'experience',
        'phone',
        'email',
        'location',
        'working_hours',
        'certifications',
        'about',
        'bookings_count'
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
        

    }
}
