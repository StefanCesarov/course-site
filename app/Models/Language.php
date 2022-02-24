<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug'; 
    }

    //connection with Course model
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
