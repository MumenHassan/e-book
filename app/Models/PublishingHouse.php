<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishingHouse extends Model
{
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeWhenSearch($query , $search){
        return $query->where('name','like','%'.$search.'%')
            ->Orwhere('country','like','%'.$search.'%');
    }
}
