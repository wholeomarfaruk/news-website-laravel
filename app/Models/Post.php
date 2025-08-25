<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'status',
        'is_featured',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
