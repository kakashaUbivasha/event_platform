<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
