<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Ville extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'image'];

    // Relation avec les associations
    public function associations()
    {
        return $this->hasMany(Association::class);
    }
}
