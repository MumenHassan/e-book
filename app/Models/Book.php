<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $guarded = [];

    protected $appends = ['image_path','poster_path'];

    public function getPosterPathAttribute(){
        return Storage::url('images/'.$this->poster);
    }

    public function getImagePathAttribute(){
        return Storage::url('images/'.$this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function publishing_house(){
        return $this->belongsTo(PublishingHouse::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'book_author');
    }

    public function scopeWhenSearch($query , $search){
        return $query->where('name','like','%'.$search.'%');
    }

    public function scopeWhenCategory($query,$category){
        return $query->when($category,function ($q) use ($category){
            return $q->whereHas('category', function ($qu) use($category){
                return $qu->whereIn('category_id',(array)$category)
                    ->orWhereIn('name',(array)$category);
            });
        });
    }
    public function scopeWhenPublishingHouse($query,$publishing_house){
        return $query->when($publishing_house,function ($q) use ($publishing_house){
            return $q->whereHas('publishing_house', function ($qu) use($publishing_house){
                return $qu->whereIn('publishing_house_id',(array)$publishing_house)
                    ->orWhereIn('name',(array)$publishing_house);
            });
        });
    }

    public function scopeWhenAuthor($query,$author){
        return $query->when($author,function ($q) use ($author){
            return $q->whereHas('authors', function ($qu) use($author){
                return $qu->whereIn('author_id',(array)$author)
                    ->orWhereIn('name',(array)$author);
            });
        });
    }
}
