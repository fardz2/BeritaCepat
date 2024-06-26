<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories')->withTimestamps()->orderBy('pivot_created_at', 'desc');
    }
}
