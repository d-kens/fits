<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show all products
    public function index() {
        $products = Product::all();


        return view('admin.products.index', ['products' => $products]);
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

        // mass assignment
        Product::create($validatedData);

        return redirect()->route('admin.products')->with('success', 'product added succesfully');
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
