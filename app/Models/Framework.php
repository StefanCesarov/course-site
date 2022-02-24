<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    use HasFactory;

    protected $table = 'frameworks';

    public $timestamps = false;
    
    public function getRouteKeyName()
    {
        return 'name'; 
    }

    //connection with Course model
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
