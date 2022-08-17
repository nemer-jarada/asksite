<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Likes;
use App\Models\Question;
use App\Models\Quote;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(12);
        $quotes = Quote::inRandomOrder()->limit(4)->get();
        $categories = Category::with('questions')->get();
        $articals = Artical::orderBy('id', 'desc')->limit(5)->get();
        return view('asksite.index', compact('questions', 'quotes', 'categories', 'articals'));
    }

    public function single($id)
    {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $question->id)->orderBy('created_at', 'asc')->paginate(10);
        $articals = Artical::orderBy('id', 'desc')->limit(5)->get();
        $next_qu = Question::where('id', '>' ,$question->id)->first();
        $prev_qu = Question::where('id', '<' ,$question->id)->orderBy('id', 'desc')->first();
        return view('asksite.single', compact('question', 'answers', 'articals', 'next_qu', 'prev_qu'));
    }

    public function articals()
    {
        $articals = Artical::orderBy('id', 'desc')->paginate(9);
        return view('asksite.articals', compact('articals'));
    }

    public function oneartical($id)
    {

        $articals = Artical::findOrFail($id);
        $next = Artical::where('id', '>' ,$articals->id)->first();
        $prev = Artical::where('id', '<' ,$articals->id)->orderBy('id', 'desc')->first();
        return view('asksite.oneartical', compact('articals', 'next', 'prev'));
    }

    public function contact()
    {
        return view('asksite.contact');
    }

    public function category($name)
    {
        $category = Category::where('name', $name)->value('id');
        $questions = Question::where('category_id',  $category)->get();
        return view('asksite.category', compact('questions'));
    }
}
