<?php

namespace App\Models;

use App\Models\Artical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public $with = ['user'];
    // public function artical()
    // {
    //     return $this->belongsTo(Artical::class)->withDefault();
    // }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
