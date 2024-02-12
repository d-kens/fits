<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    // show all categories
    public function index() {
        // ! Commented code is eager loading
        // $categories = Category::with('subcategories')->get();

        // foreach ($categories as $category) {
        //     echo "Category: {$category->category_name}\n";

        //     foreach ($category->subcategories as $subcategory) {
        //         echo "Subcategory: {$subcategory->subcategory_name}\n";
        //     }
        // }

        $categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    // show create form
    public function create() {
        return view('admin.categories.create');
    }

    // store category data
    public function store(Request $request) {
        // validate the request data
        $validatedData = $request->validate([
            'category_name' => 'required|string|unique:tbl_categories'
        ]);

        // save the category to the database
        $category = new Category();
        $category->category_name = $validatedData['category_name'];
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'category added successfully');
    }

    // show edit form
    public function edit($category_id) {
        $category = Category::findOrFail($category_id); // Assuming 'id' is the primary key of the category
        return view('admin.categories.edit', compact('category'));
    }

    // update category data
    public function update(Request $request, $category_id) {
        try {
            // validate the request data
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:25|unique:tbl_categories,category_name'
            ]);

            // check if the categeory to be updated exists
            $category = Category::findOrFail($category_id);

            // update and save in the database
            $category->category_name = $validatedData['category_name'];
            $category->save();

            return redirect()->route('admin.categories')->with('success', 'category updated successfully');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.categories')->with('error', 'Category not found');
        }
    }

    // delete category
    public function destroy($category_id) {
        try {
            // find the category by its ID
            $category = Category::findOrFail($category_id);

            // soft delete the catgeory
            $category->delete();

            return redirect()->route('admin.categories')->with('success', 'category deleted successfully');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.categories')->with('error', 'category not found');
        }
    }
}
