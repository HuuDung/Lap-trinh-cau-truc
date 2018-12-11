@extends('layouts.unauth-master')
@section('content-header')
    <section class="content-header">
        <h1>
            Home
            <small>Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
        </ol>
    </section>
@endsection
@section('content')
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
        <div class="row">
            @foreach($products as $product)
                <form action="{{ route('cart.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-3 text-center">
                        <div class="product-image">
                            <a href="{{ route('product.show', $product->id) }}">
                                <img src="{{ Storage::url($product->image) }}" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <p>
                                {{ $product->name }}
                            </p>
                            <p>
                                Giá tiền: {{ $product->cost }}$
                            </p>
                            <p>
                                Tình trạng: {{ $product->quantity-$product->sold == 0? 'Hết hàng' : 'Còn hàng' }}
                            </p>
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <input type="hidden" value="{{$product->id}}" name="product[{{$product->id}}][id]">
                            <input type="hidden" value="{{$product->name}}" name="product[{{$product->id}}][name]">
                            <input type="hidden" value="{{$product->cost}}" name="product[{{$product->id}}][cost]">
                            <input type="hidden" value={{ 1 }} name="product[{{$product->id}}][quantity]">

                        </div>
                        <div class="product-footer">
                            <button class="btn btn-primary  {{ ($product->quantity-$product->sold) == 0 ? 'hidden' :'' }}"
                                    type="submit">Add to cart
                            </button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
        <div class="text-right">
            {{ $products->links() }}
        </div>
        <!-- /.row (main row) -->

    </section>
@endsection