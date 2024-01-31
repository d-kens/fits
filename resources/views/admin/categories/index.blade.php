@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')

    <div class="d-flex align-items-center justify-content-between">
        {{-- <h3 class="mb-0">Categories List</h3> --}}
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    <hr>

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>catrgory name</th>
                <th>is deleted</th>
                <th>#</th>
                <th>catrgory name</th>
                <th>is deleted</th>
            </tr>
        </thead>
    </table>

@endsection
