<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\catartical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artical extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public $with = ['user', 'comment', 'catartical'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function catartical()
    {
        return $this->belongsTo(catartical::class);
    }

}
