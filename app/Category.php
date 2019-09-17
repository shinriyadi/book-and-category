<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Books;

class Category extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Books::class);
    }
}
