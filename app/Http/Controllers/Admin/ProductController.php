<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show all products
    public function index() {
        return view('admin.products.index');
    }

    // show create form
    public function create() {
        $subcategories = SubCategory::all();
        $categories = Category::all();


        return view('admin.products.create', [
            'subcategories' => $subcategories,
            'categories' => $categories
        ]);
    }

    // store product data
    public function store(Request $request) {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:25|unique:tbl_products,product_name',
            'product_description' => 'nullable|string',
            'unit_price' => 'required',
            'available_quantity' => 'required',
            'subcategory_id' => 'required',
        ]);

        // add added_by property in the validatedData
        $validatedData['added_by'] = 1;

        var_dump($validatedData);
    }

    // show a single product
    public function show() {

    }

    // show edit form
    public function edit($product_id) {

    }

    // update product data
    public function update(Request $request, $product_id) {

    }


    // delete product
    public function destroy($product_id) {

    }
}
