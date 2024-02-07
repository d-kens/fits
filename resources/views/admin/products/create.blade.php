@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')
    <h5>Add Product</h5>
    <hr>

    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">product name</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
            @error('product_name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        @if (count($categories) > 0)
            <div class="mb-3">
                <label for="category" class="form-label">select category</label>
                <select class="custom-select" id="category" name="category">
                    <option selected>select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif


        @if (count($subcategories) > 0)
            <div class="mb-3">
                <label for="select_subcategory" class="form-label">select subactegory</label>
                <select class="custom-select" id="select_subcategory" name="subcategory_id">
                    {{-- this will be populated dynamically --}}
                </select>
                @error('subcategory_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif

        <div class="mb-3">
            <label for="product_description" class="form-label">product description</label>
            <textarea class="form-control" id="product_description" rows="3" name="product_description"></textarea>
            @error('product_description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="unit_price" class="form-label">unit price</label>
            <input type="number" class="form-control" id="unit_price" name="unit_price">
            @error('unit_price')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="available_quantity" class="form-label">available quantity</label>
            <input type="number" class="form-control" id="available_quantity" name="available_quantity">
            @error('available_quantity')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
