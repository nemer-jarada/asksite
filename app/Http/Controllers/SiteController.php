<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Likes;
use App\Models\Quote;
use App\Models\Answer;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $answers = Answer::where('question_id', $question->id)->orderBy('created_at', 'desc')->paginate(10);
        $articals = Artical::orderBy('id', 'desc')->limit(5)->get();
        $next_qu = Question::where('id', '>', $question->id)->first();
        $prev_qu = Question::where('id', '<', $question->id)->orderBy('id', 'desc')->first();
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
        $next = Artical::where('id', '>', $articals->id)->first();
        $prev = Artical::where('id', '<', $articals->id)->orderBy('id', 'desc')->first();
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
    public function answer(Request $request)
    {
        $request->validate([
            'answer' => 'required|min:3',
        ]);
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Answer::create([
            'answer' => $request->input('answer'),
            'user_id' => auth()->id(),
            'question_id' => $request->input('question_id'),
        ]);
        return redirect()->route('single', $request->input('question_id'))->with('msg', 'Answer Added Successfully')->with('type', 'success');
    }
    public function comment(Request $request)
    {
        // dd($request);
        $request->validate([
            'comment' => 'required|min:3',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->id(),
            'artical_id' => $request->artical_id,
        ]);
        return redirect()->route('oneartical', $request->input('artical_id'))->with('msg', 'Comment Added Successfully')->with('type', 'success');
    }
    public function form(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'textMsg' => 'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $textMsg = $request->textMsg;
        Mail::to('nemer@admin.com')->send(new TestMail($name, $email, $subject, $textMsg));
        return redirect()->back();
    }
}
