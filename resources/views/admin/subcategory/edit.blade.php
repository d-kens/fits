@extends('admin.layout.admin')

@section('title', 'Subcategories')


@section('contents')
    <h5>Edit Subcategory</h5>
    <hr>

    <form action="{{ route('admin.subcategory.update', $subcategory->subcategory_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="subcategory-name" class="form-label" >subcategory name</label>
          <input type="text" class="form-control" id="subcategory-name" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
          @error('subcategory_name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="select-category" class="form-label">select category</label>
            <select class="custom-select" id="select-category" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}" {{ $subcategory->category_id == $category->category_id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


