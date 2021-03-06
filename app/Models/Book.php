<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date_publication',
        'author_id',
        'category_id',
        'cover'
    ];

    // public function category() { 
    //     return $this->(Category::class);
    // }
}
