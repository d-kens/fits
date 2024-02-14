@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

    <h1>Product Details</h1>
    <hr>

    <div class="mb-3">
        <label for="product_name" class="form-label">product name</label>
        <input type="text" class="form-control" id="product_name" value="{{ $product->product_name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="added_by" class="form-label">added by</label>
        <input type="text" class="form-control" id="added_by" value="{{ $product->added_by }}" readonly>
    </div>

    <div class="mb-3">
        <label for="product_category" class="form-label">product category</label>
        <input type="text" class="form-control" id="product_category" value="{{ $product->subcategory->category->category_name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="product_subcategory" class="form-label">product subcategory</label>
        <input type="text" class="form-control" id="product_subcategory" value="{{ $product->subcategory->subcategory_name }}" readonly>
    </div>

    <div class="mb-3">
        <label for="unit_price" class="form-label">unit price</label>
        <input type="number" class="form-control" id="unit_price" value="{{ $product->unit_price }}" readonly>
    </div>

    <div class="mb-3">
        <label for="available_quantity" class="form-label">available quantity</label>
        <input type="number" class="form-control" id="available_quantity" value="{{ $product->available_quantity }}" readonly>
    </div>


    <div class="mb-3">
        <label for="product_description" class="form-label">product description</label>
        <textarea  class="form-control" id="product_description" rows="3" value="{{ $product->product_description }}" readonly>
        </textarea>
    </div>

    <div class="mb-3">
        <label for="created_at" class="form-label">created at</label>
        <input type="text" class="form-control" id="created_at" value="{{ $product->created_at }}" readonly>
    </div>

    <div class="mb-3">
        <label for="updated_at" class="form-label">updated at</label>
        <input type="text" class="form-control" id="updated_at" value="{{ $product->updated_at }}" readonly>
    </div>

    {{--
            TODO: Put the inputs two each in a row
            TODO: Textarea to display a value
            TODO: Diaplay the product image and a buuton to navigate to the edit view
    --}}


@endsection

