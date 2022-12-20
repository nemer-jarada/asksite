<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderByDesc('id')->paginate(10);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|min:12',
            'more_detail' => 'required|min:35',
            'category_id' => 'required',
        ]);


        Question::create([
            'question' => $request->input('question'),
            'more_detail' => $request->input('more_detail'),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('admin.questions.index')->with('msg', 'Question Created Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select(['id', 'name'])->get();
        $question = Question::findOrFail($id);
        return view('admin.questions.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|min:12',
            'more_detail' => 'required|min:35',
            'category_id' => 'required',
        ]);
        $question = Question::findOrFail($id);
        $input = $request->all();
        $question->update($input);
        return redirect()->route('admin.questions.index')->with('msg', 'Question Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question =  Question::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.questions.index')->with('msg', 'Question Deleted Successfully')->with('type', 'danger');
    }
}
