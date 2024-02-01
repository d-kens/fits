@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h1>Add Category</h1>
    <hr>

    <form action="{{ route('admin.categories.update', $category->category_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="category-name" class="form-label" >Category Name</label>
          <input type="text" class="form-control" id="category-name" name="category_name" value="{{ $category->category_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
