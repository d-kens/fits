<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubCategoryController extends Controller
{
    // show all subcategories
    public function index() {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', ['subcategories' => $subcategories]);
    }

    // show create form
    public function create() {
        $categories = Category::all();
        return view('admin.subcategory.create', ['categories' => $categories]);
    }

    // store subcategory data
    public function store(Request $request) {
        // validate the request data
        $validatedData = $request->validate([
            'subcategory_name' => 'required|string',
            'category' => 'required|exists:tbl_categories,category_id',
        ]);

        // save the subcategory to the database
        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $validatedData['subcategory_name'];
        $subcategory->category = $validatedData['category'];

        $subcategory->save();

        return redirect()->route('admin.subcategories')->with('success', 'subcategory added succesfully');
    }

    // show edit form
    public function edit($subcategory_id) {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($subcategory_id);

        return view('admin.subcategory.edit', compact('categories','subcategory'));

    }

    // update subcategory data
    public function update(Request $request, $subcategory_id) {
        try {
            // validate the request data
            $validatedData = $request->validate([
                'subcategory_name' => 'required|string',
                'category' => 'required|exists:tbl_categories,category_id',
            ]);

            // check if the subcategory exists
            $subcategory = SubCategory::findOrFail($subcategory_id);

            // update
            $subcategory->subcategory_name = $validatedData['subcategory_name'];
            $subcategory->category = $validatedData['category'];

            $subcategory->save();

            return redirect()->route('admin.subcategories')->with('success', 'subcategory updated succesfully');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.subcategories')->with('error', 'Subcategory not found');
        }
    }

    // delete subcategory
    public function destroy($subcategory_id) {
        try {
            // find the subcategory by its ID
            $subcategory = SubCategory::findOrFail($subcategory_id);

            // soft delete the subcategory
            $subcategory->delete();

            return redirect()->route('admin.subcategories')->with('success', 'subcategory deleted successfully');

        } catch (ModelNotFoundException $e){
            return redirect()->route('admin.subcategories')->with('error', 'Category not found');
        }
    }
}
