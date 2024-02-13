@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add Product</a>
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
                            <th>product name</th>
                            <th>unit price</th>
                            <th>available quantity</th>
                            <th>category</th>
                            <th>subcategory</th>
                            <th>added by</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->unit_price }}</td>
                                <td>{{ $product->available_quantity }}</td>
                                <td>{{ $product->subcategory->category->category_name }}</td>
                                <td>{{ $product->subcategory->subcategory_name }}</td>
                                <td>{{ $product->added_by }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-warning" style="margin-right: 10px">Edit</a>
                                        <form action="{{ route('admin.product.destroy', $product->product_id) }}" method="POST" type="button">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.product.show', $product->product_id) }}" type="button" class="btn btn-info" style="margin-left: 10px">Details</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6">no products found</td>
                            </tr>
                        @endif

                    </tbody>

                </table>
            </div>
        </div>
    </div>



@endsection
