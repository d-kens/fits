@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h5>Add Category</h5>
    <hr>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="category-name" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="category-name" name="category_name">
          @error('category_name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
