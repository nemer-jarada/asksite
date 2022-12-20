<?php

namespace App\Models;

use App\Models\User;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $with = ['user', 'category', 'answer', 'like'];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }
}
