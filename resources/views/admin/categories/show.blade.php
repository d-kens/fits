@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h1>Add Category</h1>
    <hr>

    <div class="row">
        <div class="col mb-3">
            <label for="category-name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category-name" name="category_name" value="{{ $category->category_name }}" readonly>
        </div>

        <div class="col mb-3">
            <label for="is-deleted" class="form-label">is deleted</label>
            <input type="text" class="form-control" id="is-deleted" name="category_name" value="{{ $category->is_deleted }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label for="created-at" class="form-label">created at</label>
            <input type="text" class="form-control" id="created-at" name="category_name" value="{{ $category->created_at }}" readonly>
        </div>

        <div class="col mb-3">
            <label for="updated-at" class="form-label">update at</label>
            <input type="text" class="form-control" id="updated-at" name="category_name" value="{{ $category->updated_at }}" readonly>
        </div>

    </div>



@endsection
