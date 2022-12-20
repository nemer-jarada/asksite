<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::orderByDesc('id')->paginate(10);
        return view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quotes.create');
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
            'quote' => 'required|min:12',
            'who_said' => 'required|min:3|max:25',
        ]);


        Quote::create([
            'quote' => $request->input('quote'),
            'who_said' => $request->input('who_said'),
        ]);
        return redirect()->route('admin.quotes.index')->with('msg', 'Quote Created Successfully')->with('type', 'success');
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
        $quote = Quote::findOrFail($id);
        return view('admin.quotes.edit', compact('quote'));
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
            'quote' => 'required|min:12',
            'who_said' => 'required|min:3|max:25',
        ]);


        $quote = Quote::findOrFail($id);
        $input = $request->all();
        $quote->update($input);
        return redirect()->route('admin.quotes.index')->with('msg', 'Quote Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote =  Quote::findOrFail($id);
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('msg', 'Quote Deleted Successfully')->with('type', 'danger');
    }
}
