<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:categories',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Category::create([
            'name' => $request->name,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Created Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug', $slug)->first();
        while ($checkSlug) {
            $slug = $checkSlug->slug . Str::random(5);
        }

        Category::where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Updated Successfully');
    }

    public function delete($id){
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Deleted Successfully');
    }
}
