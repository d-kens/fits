@extends('admin.layout.admin')

@section('title', 'Categories')

@section('contents')
    <h1>Add Category</h1>
    <hr>

    <form action="{{ route('subcategory.update', $subcategory->subcategory_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="subcategory-name" class="form-label" >subcategory name</label>
          <input type="text" class="form-control" id="subcategory-name" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
        </div>

        <div class="mb-3">
            <select name="category" class="form-select form-select-lg" style="width: 100%">
                <option selected>select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
