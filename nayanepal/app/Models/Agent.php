<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'license_number',
        'office',
        'address',
        'city',
        'state_province',
        'country',
        'profile_image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}
