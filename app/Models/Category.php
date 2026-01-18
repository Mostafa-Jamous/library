<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'image'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/category-images/' . $this->image) : null;
    }

    function books(){
        return $this->hasMany(Book::class );
>>>>>>> 0253129807e34e3c66c1a72cfbc2149b85dadab7
    }
}
