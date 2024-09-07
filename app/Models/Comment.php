<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'author_name', 'content', 'status'];

    CONST STATUS_NOT_CONFIRMED = 1;
    CONST STATUS_CONFIRMED = 2;
    CONST STATUS_STRINGS = [
        self::STATUS_NOT_CONFIRMED => 'NOT CONFIRMED',
        self::STATUS_CONFIRMED => 'CONFIRMED',
    ];

    public function scopeConfirmedStatus($query)
    {
        $query->where('status', self::STATUS_CONFIRMED);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
