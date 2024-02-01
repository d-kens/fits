@extends('admin.layout.admin')

@section('title', 'Subcategories')

@section('contents')
    <h1>Add Subcategory</h1>
    <hr>

    <form action="{{ route('subcategory.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="subcategory-name" class="form-label">category name</label>
          <input type="text" class="form-control" id="subcategory-name" name="subcategory_name">
        </div>

        @if (count($categories) > 0)
            <div class="mb-3">
                <select name="category" class="form-select form-select-lg" style="width: 100%">
                    <option selected>select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
