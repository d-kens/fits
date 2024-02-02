@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h5>Edit Category</h5>
    <hr>

    <form action="{{ route('admin.category.update', $category->category_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="category-name" class="form-label" >Category Name</label>
          <input type="text" class="form-control" id="category-name" name="category_name" value="{{ $category->category_name }}">
          @error('category_name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
