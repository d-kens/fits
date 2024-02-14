@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

    <h1>Product Details</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" value="{{ $product->product_name }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="added_by" class="form-label">Added By</label>
                <input type="text" class="form-control" id="added_by" value="{{ $product->added_by }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_category" class="form-label">Product Category</label>
                <input type="text" class="form-control" id="product_category" value="{{ $product->subcategory->category->category_name }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_subcategory" class="form-label">Product Subcategory</label>
                <input type="text" class="form-control" id="product_subcategory" value="{{ $product->subcategory->subcategory_name }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="number" class="form-control" id="unit_price" value="{{ $product->unit_price }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="available_quantity" class="form-label">Available Quantity</label>
                <input type="number" class="form-control" id="available_quantity" value="{{ $product->available_quantity }}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="created_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="created_at" value="{{ $product->created_at }}" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="updated_at" value="{{ $product->updated_at }}" readonly>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product_description" rows="3" readonly>{{ $product->product_description }}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="edit_page_url" class="btn btn-primary btn-lg">Edit</a>
        </div>
    </div>

@endsection

