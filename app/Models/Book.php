<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['ISBN' , 'title' , 'price' , 'mortgage', 'category_id', 'cover'];
=======
     protected $fillable = ['ISBN', 'title', 'price', 'mortgage', 'category_id', 'cover', 'authorship_date'];
    //  protected $guraded = [];

>>>>>>> aa628cf8a6b89fb39e9cae32c4a0d1f2a3ef61a6

    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset('storage/book-images/' . $this->cover) : null;
    }
    
    function category(){
        return $this->belongsTo(Category::class);
    }
    function authors(){
        return $this->belongsToMany(Author::class);
    }
}
