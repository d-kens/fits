<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    // store product data
    public function store(Request $request) {

        $request->validate([
            'product_name' => 'required|string|max:25|unique:tbl_products,product_name',
            'product_description' => 'nullable|string',
            'unit_price' => 'required',
            'available_quantity' => 'required',
            'subcategory_id' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->product_name . '.' . $request->product_image->extension();


        // save product details
        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'unit_price' => $request->input('unit_price'),
            'available_quantity' => $request->input('available_quantity'),
            'subcategory_id' => $request->input('subcategory_id'),
            'added_by' => 1, // ! To be changed later after authenetication
        ]);

        // save the image details
        ProductImage::create([
            'product_image' => $newImageName,
            'product_id' => $product->product_id,
            'added_by' => 1, // ! To be changed later after authenetication
        ]);

        // save product image to the server
        $request->product_image->move(public_path('images'), $newImageName);

        return redirect()->route('admin.products')->with('success', 'product added succesfully');
    }

    // ! show a single product
    public function show($product_id) {
        $product = Product::where('product_id', $product_id)->get();

        var_dump($product);

        return view('admin.products.show', ['product' => $product]);
    }

    // show edit form
    public function edit($product_id) {

    }

    // update product data
    public function update(Request $request, $product_id) {

    }


    // delete product
    public function destroy($product_id) {
        try {
            $subcategory = Product::findOrFail($product_id);

            $subcategory->delete();

            return redirect()->route('admin.products')->with('success', 'product deleted successfully');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.products')->with('error', 'prouduct not found');
        }

    }
}


