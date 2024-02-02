@extends('admin.layout.admin')

@section('title', 'Products')

@section('contents')

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="btn btn-primary">Add Product</a>
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
                            <th>subcategory</th>
                            <th>added by</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- ! fetch records from the database --}}

                    </tbody>

                </table>
            </div>
        </div>
    </div>



@endsection
