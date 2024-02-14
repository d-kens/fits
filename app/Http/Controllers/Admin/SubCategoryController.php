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

    public function getSubcategoriesByCategoryId($category_id) {
        $subcategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json(['subcategories' => $subcategories]);
    }

    // show create form
    public function create() {
        $categories = Category::all();
        return view('admin.subcategory.create', ['categories' => $categories]);
    }

    // store subcategory data
    public function store(Request $request) {
        $validatedData = $request->validate([
            'subcategory_name' => [
                'required',
                'string',
                'max:25',
                function ($attribute, $value, $fail) use ($request) {
                    $category_id = $request->input('category_id');

                    if (SubCategory::where('category_id', $category_id)->where('subcategory_name', $value)->whereNull('deleted_at')->exists()) {
                        $fail('subcategory name must be unique for the selected category');
                    }
                }
            ],
            'category_id' => 'required|exists:tbl_categories,category_id',
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $validatedData['subcategory_name'];
        $subcategory->category_id = $validatedData['category_id'];

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
            $validatedData = $request->validate([
                'subcategory_name' => [
                    'required',
                    'string',
                    'max:25',
                    function ($attribute, $value, $fail) use ($request, $subcategory_id) {
                        $category_id = $request->input('category_id');

                        if (SubCategory::where('category_id', $category_id)
                                        ->where('subcategory_name', $value)
                                        ->whereNull('deleted_at')
                                        ->where('subcategory_id', '!=', $subcategory_id) // Exclude the current subcategory being edited
                                        ->exists()) {
                            $fail($attribute.' must be unique for the selected category');
                        }
                    }
                ],
                'category_id' => 'required|exists:tbl_categories,category_id',
            ]);

            $subcategory = SubCategory::findOrFail($subcategory_id);

            $subcategory->subcategory_name = $validatedData['subcategory_name'];
            $subcategory->category_id = $validatedData['category_id'];

            $subcategory->save();

            return redirect()->route('admin.subcategories')->with('success', 'subcategory updated succesfully');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.subcategories')->with('error', 'Subcategory not found');
        }
    }

    // delete subcategory
    public function destroy($subcategory_id) {
        try {
            $subcategory = SubCategory::findOrFail($subcategory_id);

            $subcategory->delete();

            return redirect()->route('admin.subcategories')->with('success', 'subcategory deleted successfully');

        } catch (ModelNotFoundException $e){
            return redirect()->route('admin.subcategories')->with('error', 'Category not found');
        }
    }
}


