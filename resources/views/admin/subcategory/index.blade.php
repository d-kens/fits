@extends('admin.layout.admin')

@section('title', 'Subcategories')

@section('contents')

    <div class="d-flex align-items-center justify-content-between">
        {{-- <h3 class="mb-0">Categories List</h3> --}}
        <a href="{{ route('subcategory.create') }}" class="btn btn-primary">Add Subcategory</a>
    </div>

    <hr>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>subcategory name</th>
                <th>category name</th>
                <th>is deleted</th>
                <th>created at</th>
                <th>update at</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @if (count($subcategories) > 0)
                @foreach ($subcategories as $subcategory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->category }}</td>
                        <td>{{ $subcategory->is_deleted ? 'Yes' : 'No' }}</td>
                        <td>{{ $subcategory->created_at }}</td>
                        <td>{{ $subcategory->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                {{-- <a href="{{ route('subcategory.show', $subcategory->subcategory_id) }}" type="button" class="btn btn-secondary">Details</a> --}}
                                <a href="{{ route('subcategory.edit', $subcategory->subcategory_id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('subcategory.destroy', $subcategory->subcategory_id) }}" method="POST" type="button">
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
                    <td colspan="6">No SubCategories found.</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
