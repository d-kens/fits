@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')
    <h5>Add Product</h5>
    <hr>

    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product-name" class="form-label">product name</label>
            <input type="text" class="form-control" id="product-name" name="product_name">
            @error('product_name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- !select a category. In the subcategories selction options, we will have only subcategories under the selected category--}}

        @if (count($subcategories) > 0)
            <div class="mb-3">
                <label for="select-subcategory" class="form-label">select subactegory</label>
                <select class="custom-select" id="select-subcategory" name="subcategory_id">
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->subcategory_id }}">{{ $subcategory->subcategory_name }}</option>
                    @endforeach
                </select>
                @error('subcategory_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif

        <div class="mb-3">
            <label for="product-description" class="form-label">product description</label>
            <textarea name="product_description" id="product_description" style="width: 100%"></textarea>
            @error('product_description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="unit-price" class="form-label">unit price</label>
            <input type="number" class="form-control" id="unit-price" name="unit-price">
            @error('unit-price')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="available-quantity" class="form-label">available quantity</label>
            <input type="number" class="form-control" id="available-quantity" name="available-quantity">
            @error('available-quantity')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


    </form>

@endsection
