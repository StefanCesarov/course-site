<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['naslov', 'komentar', 'status', 'user_id' ];

    public $timestamps = false;


    //dodato review
    //relation with Language model    
    public function user ()
    {
        
        return $this->belongsTo(User::class);
    }

}
