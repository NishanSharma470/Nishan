<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_name',
        'category_id',
        'location_id',
        'description',
        'price',
        'currency',
        'area',
        'bedrooms',
        'bathrooms',
        'status_id',
        'date_listed',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

   public function appointments()
{
   return $this->hasMany(Appointment::class, 'property_id');
}
public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
