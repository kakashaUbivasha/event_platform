<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function subscribers()
    {
        return $this->hasMany(User::class, 'subscriptions')->withPivot('role', 'created_at');
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function polls()
    {
        return $this->hasMany(Poll::class);
    }
}
