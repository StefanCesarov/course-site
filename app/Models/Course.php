<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    public $timestamps = false;

    //relation with Language model    
    public function language ()
    {
    
        return $this->belongsTo(Language::class);
    }

    //relation with Category model    
    public function category ()
    {
        
        return $this->belongsTo(Category::class);
    }

    //relation with user DODATO
    public function users ()
    {
        return $this->belongsToMany(User::class);
    }



    //relation with Category model    
    public function framework ()
    {
        
        return $this->belongsTo(Framework::class);
    }

}
