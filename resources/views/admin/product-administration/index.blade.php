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
                <th>Description</th>
                <th>Image</th>
                <th class="text-center">Cost</th>
            </tr>
            </thead>
            <body>
            @foreach($products as $product)
                <tr>
                    <td><a href="#">{{ $product->id }}</a></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->image }}</td>
                    <td class="text-center">{{ $product->cost }}</td>
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