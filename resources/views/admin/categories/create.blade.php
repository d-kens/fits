@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h1>Add Category</h1>
    <hr>

    <form>
        <div class="mb-3">
          <label for="category-name" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="category-name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
