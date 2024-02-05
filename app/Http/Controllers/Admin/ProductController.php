<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
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
        return view('admin.products.create', ['subcategories' => $subcategories]);
    }

    // store product data
    public function store(Request $request) {
        // validate data
        dd($request);

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
