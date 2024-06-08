<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories')->withTimestamps();
    }
    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments')->withPivot('id', 'comment', 'created_at', 'updated_at')->orderBy('pivot_created_at', 'desc');;
    }
}
