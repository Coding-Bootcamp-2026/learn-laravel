<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['commenter_name', 'comment_text', 'blog_id'])]
class Comment extends Model
{
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
