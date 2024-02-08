@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

<h1>Product Details</h1>
    <hr>

    <div class="row">
        <div class="col mb-3">
            <label for="category-name" class="form-label">product Name</label>
            <input type="text"  value="{{ $product->product_name }}" readonly>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col mb-3">
            <label for="created-at" class="form-label">created at</label>
            <input type="text" class="form-control" id="created-at" name="category_name" value="{{ $category->created_at }}" readonly>
        </div>

        <div class="col mb-3">
            <label for="updated-at" class="form-label">update at</label>
            <input type="text" class="form-control" id="updated-at" name="category_name" value="{{ $category->updated_at }}" readonly>
        </div>

    </div> --}}



@endsection

