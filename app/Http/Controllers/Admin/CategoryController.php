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
            'code' => 'required|unique:categories',
        ]);

        $slug = Str::slug($request->name);

        Category::create([
            'Name' => $request->name,
            'Code' => $request->code,
            'Slug' => $slug,
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

        Category::where('ID', $id)->update([
            'Name' => $request->name,
            'Code' => $request->code,
            'Slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Updated Successfully');
    }

    public function delete($id){
        Category::where('ID', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Deleted Successfully');
    }
}
