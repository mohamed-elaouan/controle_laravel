<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'prix',
        'image1',
        'image2',
        'image3',
        'image4',
        'role'
    ];
}
