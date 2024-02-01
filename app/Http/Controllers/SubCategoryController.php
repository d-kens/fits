<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // show all subcategories
    public function index() {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', ['subcategories' => $subcategories]);
    }

    // show a single subcategory
    // public function show($subcategory_id) {
    //     $subcategory = SubCategory::findOrFail($subcategory_id);
    // }

    // show create form
    public function create() {
        $categories = Category::all();
        return view('admin.subcategory.create', ['categories' => $categories]);
    }

    // store subcategory data
    public function store(Request $request) {
        $subcategory = new SubCategory();

        $subcategory->subcategory_name = $request->input('subcategory_name');
        $subcategory->category = $request->input('category');

        $subcategory->save();

        return redirect()->route('subcategories')->with('success', 'category added succesfully');

    }

    // show edit form
    public function edit($subcategory_id) {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($subcategory_id);

        /*
        ! A way to to pass the categories and subcategories

        */
        return view('admin.subcategory.edit', compact('subcategory'));

    }

    // update subcategory data
    public function update(Request $request, $subcategory_id) {
        $subcategory = SubCategory::findOrFail($subcategory_id);

        $subcategory->subcategory_name = $request->input('subcategory_name');
        $subcategory->category = $request->input('category');


        $subcategory->save();

        return redirect()->route('subcategories')->with('success', 'subcategory updated successfully');
    }

    // delete subcategory
    public function destroy($subcategory_id) {
        $subcategory = SubCategory::findOrFail($subcategory_id);

        $subcategory->is_deleted = 1;

        $subcategory->save();

        return redirect()->route('subcategories')->with('success', 'subcategory deleted successfully');
    }
}
