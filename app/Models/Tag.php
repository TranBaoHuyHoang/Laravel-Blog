<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'order_by', 'status'];

    public function post() {
        return $this->belongsToMany(Post::class);
    }
}
