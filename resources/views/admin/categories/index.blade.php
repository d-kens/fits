@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')

    <div class="d-flex align-items-center justify-content-between">
        {{-- <h3 class="mb-0">Categories List</h3> --}}
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    <hr>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>category name</th>
                            <th>is deleted</th>
                            <th>created at</th>
                            <th>update at</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>category name</th>
                            <th>is deleted</th>
                            <th>created at</th>
                            <th>update at</th>
                            <th>actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->is_deleted ? 'Yes' : 'No' }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('categories.edit', $category->category_id) }}" type="button" class="btn btn-warning" style="margin-right: 10px">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" type="button">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No categories found.</td>
                            </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
