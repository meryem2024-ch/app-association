<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Assurez-vous que vous avez une table 'admins'

    protected $fillable = [
        'email', 'password',
    ];
}
