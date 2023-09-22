<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    const EXCERPT_LENGTH = 200;

    protected $casts = [
        'publish_at' => 'datetime',
    ];


    public function author() {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function getExcerpt() {
        return Str::limit($this->body, Post::EXCERPT_LENGTH);
    }

    public function getReadingTime() {
        $mins = round(str_word_count($this->body) / 250);

        return ($mins < 1 ) ? 1 : $mins;
    }

    public function scopePublished($query) {
        $query->where('publish_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query) {
        $query->where('featured', true);
    }
}
