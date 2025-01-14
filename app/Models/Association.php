<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Association extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'contact', 'ville_id','user_id'];

    // Relation avec une ville
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }  //

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relation avec les évaluations
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
