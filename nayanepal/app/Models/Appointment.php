<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'meeting_location',
        'duration',
        'purpose',
        'attendees',
        'date_time',
        'property_id',
        'user_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
