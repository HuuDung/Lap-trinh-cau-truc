@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Administration</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th class="text-center">Cost</th>
                <th></th>
            </tr>
            </thead>
            <body>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <a href="{{ route('admin.product-administration.show', $product->id) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ nl2br($product->description) }}</td>
                    <td><img src="{{ asset($product->image) }}" alt=""></td>
                    <td class="text-center">{{ $product->cost }}</td>
                    <td class="text-center">
                        {{Form::open(['method' => 'DELETE', 'route' => ['admin.product-administration.destroy', $product->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </body>
        </table>
        <div class="text-right">
            {{ $products->links() }}
        </div>
    </section>
    <!-- /.content -->
@endsection