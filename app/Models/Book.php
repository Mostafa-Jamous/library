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

    protected $appends = ['cover_url'];

    public function getCoverUrlAttribute()
    {
        return $this->cover ? asset('storage/book-images/' . $this->cover) : null;
=======
    protected $fillable = ['ISBN' , 'title' , 'price' , 'mortgage', 'category_id'];


    function category(){
        return $this->belongsTo(Category::class);
    }
    function authors(){
        return $this->belongsToMany(Author::class);
>>>>>>> 0253129807e34e3c66c1a72cfbc2149b85dadab7
    }
}
