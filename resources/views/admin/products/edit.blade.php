@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

    <h1>Edit Product</h1>
    <hr>

    {{
        $product->product_name
    }}


@endsection
