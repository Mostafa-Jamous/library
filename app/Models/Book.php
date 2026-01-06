<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = ['ISBN' , 'title' , 'price' , 'mortgage', 'category_id', 'cover'];

    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset('storage/book-images/' . $this->cover) : null;
    }
}
