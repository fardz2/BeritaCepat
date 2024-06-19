<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->locale('id')->translatedFormat('d F Y H:i');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories')->withTimestamps()->orderBy('pivot_created_at', 'desc');
    }
    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments')->withPivot('id', 'comment', 'created_at', 'updated_at')->orderBy('pivot_created_at', 'desc');
    }
}
