<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function scopeWhenSearch($query , $search){
        return $query->where('name','like','%'.$search.'%');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_author');
    }
}
