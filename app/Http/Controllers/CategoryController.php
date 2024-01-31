<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // show all categories
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    // show a single category
    public function show($category_id) {
        $category = Category::findOrFail($category_id); // Assuming 'id' is the primary key of the category
        return view('admin.categories.show', compact('category'));
    }

    // show create form
    public function create() {
        return view('admin.categories.create');
    }

    // store category data
    public function store(Request $request) {

        $category = new Category();
        $category->category_name = $request->input('category_name');

        $category->save();

        return redirect()->route('categories')->with('success', 'category added successfully');
    }

    // show edit form
    public function edit($category_id) {
        $category = Category::findOrFail($category_id); // Assuming 'id' is the primary key of the category
        return view('admin.categories.edit', compact('category'));
    }

    // update category data
    public function update(Request $request, $category_id) {

        $category = Category::findOrFail($category_id);


        $category->category_name = $request->input('category_name');

        $category->save();

        return redirect()->route('categories')->with('success', 'category updated successfully');

    }

    // delete category
    public function destroy($category_id) {
        $category = Category::findOrFail($category_id);

        $category->delete();

        return redirect()->route('categories')->with('success', 'category deleted successfully');
    }
}
