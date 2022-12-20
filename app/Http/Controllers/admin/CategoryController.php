<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categories.create');
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
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        $image = $request->file('image');
        $new_img_name = rand() . time() . '-' . strtolower(str_replace(' ', '-', $image->getClientOriginalName()));
        $image->move(public_path('uploads/images/categories'), $new_img_name);

        Category::create([
            'name' => $request->name,
            'image' => $new_img_name,
        ]);
        return redirect()->route('admin.categories.index')->with('msg', 'Category Created Successfully')->with('type', 'success');
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories', 'category'));
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
            'name' => 'required|min:3',
            'image' => 'required|image|mimes:png,jpg'
        ]);
        $category = Category::findOrFail($id);
        $image = $request->file('image');
        $new_image = $category->image;
        if ($request->has('image')) {
            if ($new_image && file_exists(public_path('uploads/images/categories/') . $new_image)) {
                File::delete(public_path('uploads/images/categories/') . $new_image);
            }
            $new_image = rand() . time() . '-' . strtolower(str_replace(' ', '-', $image->getClientOriginalName()));
            $image->move(public_path('uploads/images/categories'), $new_image);
        }
        $category->update([
            'name' => $request->name,
            'image' => $new_image,
        ]);
        return redirect()->route('admin.categories.index')->with('msg', 'Category Updated Successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categor =  Category::findOrFail($id);
        $image = $categor->image;
        if ($image && file_exists(public_path('uploads/images/categories') . $image)) {
            File::delete(public_path('uploads/images/categories') . $image);
        }
        $categor->delete();
        return redirect()->route('admin.categories.index')->with('msg', 'Category Deleted Successfully')->with('type', 'danger');
    }
}
