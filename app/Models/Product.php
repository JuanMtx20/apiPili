<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getExcerptAttribute(){
        return substr($this->content, 0, 120);
    }

    public function getPublishedAtAttribute(){
        return $this->created_at->diffForHumans();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
}
