<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOption\Option;

class PollVote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
