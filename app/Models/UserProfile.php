<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'email', 'city', 'country', 'postal_code', 'bio', 'facebook', 'twitter', 'instagram', 'linkedin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function getImageAttribute()
{
    $media = $this->media?->where('category', 'profile_picture')->first();

    if ($media && file_exists(public_path('uploads/'.$media->path))) {
        return asset('uploads/'.$media->path);
    }

    return asset('website/img/thumbnails/featured_img.jpg');
}
}
