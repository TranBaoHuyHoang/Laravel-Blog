<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    public $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replay() {
        return $this->hasMany(Comment::class);
    }
}
