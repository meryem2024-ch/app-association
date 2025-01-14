<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory; 

class User extends Authenticatable
{
    use HasFactory;

    /**
     * Le nom de la table associée au modèle.
     *
     * @var string
     */
    protected $fillable = ['name','email','password'];
    protected $table = 'utilisateur';
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    // Relation avec les évaluations
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id', 'id');
    }

    // Autres propriétés et méthodes du modèle
}
