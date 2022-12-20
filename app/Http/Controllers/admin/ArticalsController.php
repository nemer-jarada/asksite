<?php

namespace App\Http\Controllers\admin;

use App\Models\Artical;
use App\Models\catartical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = Artical::orderByDesc('id')->paginate(10);
        return view('admin.articals.index', compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catarticals = catartical::select(['id', 'name'])->get();
        return view('admin.articals.create', compact('catarticals'));
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
            'title' => 'required|min:3',
            'artical' => 'required|min:3',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'cat' => 'required'
        ]);


        $image = $request->file('image');
        $new_img_name = rand() . time() . '-' . strtolower(str_replace(' ', '-', $image->getClientOriginalName()));
        $image->move(public_path('uploads/images/articals'), $new_img_name);



        Artical::create([
            'title' => $request->title,
            'artical' => $request->artical,
            'image' => $new_img_name,
            'catartical_id' => $request->cat,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.articals.index')->with('msg', 'Artical Created Successfully')->with('type', 'success');
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
        $artical = Artical::findOrFail($id);
        $catarticals = catartical::select(['id', 'name'])->get();
        return view('admin.articals.edit', compact('artical', 'catarticals'));
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
            'title' => 'required',
            'artical' => 'required',
            'image' => 'nullable',
            'catartical_id' => 'required'
        ]);

        $artical = Artical::findOrFail($id);
        $image = $request->file('image');
        $new_image = $artical->image;
        if ($request->has('image')) {
            if ($new_image && file_exists(public_path('uploads/images/') . $new_image)) {
                File::delete(public_path('uploads/images/') . $new_image);
            }
            $new_image = rand() . time() . '-' . strtolower(str_replace(' ', '-', $image->getClientOriginalName()));
            $image->move(public_path('uploads/images/articals'), $new_image);
        }
        $artical->update([
            'title' => $request->title,
            'artical' => $request->artical,
            'image' => $new_image,
            'catartical_id' => $request->catartical_id,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('admin.articals.index')->with('msg', 'Artical Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $artical = Artical::findOrFail($id);
        $image = $artical->image;
        if ($image && file_exists(public_path('uploads/articals/') . $image)) {
            File::delete(public_path('uploads/images/') . $image);
        }
        $artical->delete();
        return redirect()->route('admin.articals.index')->with('msg', 'Artical Deleted Successfully')->with('type', 'danger');
    }
}
