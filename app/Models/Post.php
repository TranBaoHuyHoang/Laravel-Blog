<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'slug', 'status', 'is_approved', 'category_id', 'sub_category_id', 'user_id', 'description', 'photo', 'admin_comment', 'sub_description'];

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function sub_category() {
        return $this->belongsTo(SubCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class)->whereNull('comment_id');
    }

}
