<?php

namespace App\Http\Controllers\admin;

use App\Models\Quote;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {

        $questions = Question::all()->count();
        $categories = Category::all()->count();
        $articals = Artical::all()->count();
        $quotes = Quote::all()->count();
        $answers = Answer::all()->count();
        $comments = Comment::all()->count();
        return view('admin.index', compact('questions', 'categories', 'articals', 'quotes', 'answers', 'comments'));
    }
}
