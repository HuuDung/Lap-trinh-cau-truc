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
        <form action="{{ route('admin.product.search') }}" method="get">
            <div class="input-group ">
                <input type="text" name="content" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>

            </div>
            <div class="form-group">
                <select name="category" id="" class="form-control">
                    <option value="">Choose category...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        @if($status == true)
            <div class="">
                <p>Results: {{ $products->count() }}</p>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th class="text-center">Cost</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Sold</th>
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
                        <td><img src="{{ asset($product->image) }}" alt=""></td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ nl2br($product->description) }}</td>
                        <td class="text-center">{{ $product->cost }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">{{ $product->sold }}</td>
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
        @else
            <div class="">
                <p>Results: {{ $products->count() }}</p>
            </div>

        @endif
    </section>
    <!-- /.content -->
@endsection