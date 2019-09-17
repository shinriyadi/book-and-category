<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'keywords', 'price', 'stock', 'publisher'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
