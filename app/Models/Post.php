<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public function author() {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function scopePublished($query) {
        $query->where('publish_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query) {
        $query->where('featured', true);
    }
}
