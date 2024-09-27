<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
   
    // Define the primary key column name (optional)
    protected $primaryKey = 'id';
   
    // Define mass-assignable attributes (optional)
    protected $fillable = ['name'];
   
    
}
