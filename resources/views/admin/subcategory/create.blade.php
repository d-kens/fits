@extends('admin.layout.admin')

@section('title', 'Subcategories')

@section('contents')
    <h5>Add Subcategory</h5>
    <hr>

    <form action="{{ route('admin.subcategory.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="subcategory-name" class="form-label">subcategory name</label>
          <input type="text" class="form-control" id="subcategory-name" name="subcategory_name">
          @error('subcategory_name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        @if (count($categories) > 0)
            <div class="mb-3">
                <label for="select-category" class="form-label">select category</label>
                <select class="custom-select" id="select-category" name="category_id">
                    <option selected>select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection

