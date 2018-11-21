@extends('layouts.master')
@section('content')
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
        <form action="{{ route('home.product.search') }}" method="get">
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

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>Description</th>
                <th class="text-center">Cost($)</th>
                <th class="text-center">Amount</th>
                <th></th>
            </tr>
            </thead>
            <body>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <a href="#">{{ $product->name }}</a>
                    </td>
                    <td><img src="{{ Storage::url($product->image) }}" alt=""></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ nl2br($product->description) }}</td>
                    <td class="text-center">{{ $product->cost }}</td>
                    <td class="text-center">{{ $product->quantity-$product->sold }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary">Add to cart</button>
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