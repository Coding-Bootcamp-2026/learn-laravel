<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'body'])]
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
