@extends('layouts.unauth-master')
@section('content-header')
    <section class="content-header">
        <h1>
            Product Detail
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product Detail</li>
        </ol>
    </section>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('cart.store') }}" method="post">
                {{ csrf_field() }}
                <!-- Product Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="form-group text-center">
                                <img src="{{ Storage::url($product->image) }}" alt="Product image">
                            </div>
                            <div class="form-group">
                                <label for="name">Product's name</label>
                                <input class="form-control text-left" type="text" name="name"
                                       value="{{ $product->name }}"
                                       placeholder="Name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" name="category"
                                       value="{{ $product->category['name'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cost">Cost:</label>
                                <input type="number" class="form-control text-left" name="cost"
                                       value="{{ $product->cost }}"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="description"><i
                                                class="fa fa-map-marker margin-r-5"></i>Description:</label>

                                </div>
                                <textarea name="description" cols="83" readonly
                                          rows="10">{{ nl2br($product->description) }}</textarea>

                                <!-- /.input group -->
                                <input type="hidden" value="{{$product->id}}" name="id">
                                <input type="hidden" value="{{$product->id}}" name="product[{{$product->id}}][id]">
                                <input type="hidden" value="{{$product->name}}" name="product[{{$product->id}}][name]">
                                <input type="hidden" value="{{$product->cost}}" name="product[{{$product->id}}][cost]">
                                <input type="hidden" value={{ 1 }} name="product[{{$product->id}}][quantity]">
                            </div>
                            <div>
                                <div class="text-center">
                                    <button class="btn btn-primary  {{ ($product->quantity-$product->sold) == 0 ? 'hidden' :'' }}"
                                            type="submit">Add to cart
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->

    </section>
@endsection