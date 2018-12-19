@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Show Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Show Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- Product Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="form-group text-center">
                            <img src="{{ Storage::url($product->image) }}" alt="Product image">
                        </div>
                        <div class="form-group">
                            <label for="name">Product's name</label>
                            <input class="form-control text-left" type="text" name="name" value="{{ $product->name }}"
                                   placeholder="Name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category"
                                   value="{{ $product->category['name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="cost">Cost:</label>
                            <input type="number" class="form-control text-left" name="cost" value="{{ $product->cost }}"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control text-left" name="quantity"
                                   value="{{ $product->quantity }}"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="description"><i
                                            class="fa fa-map-marker margin-r-5"></i>Description:</label>

                            </div>
                            <textarea name="description" readonly class="form-control rounded-0" rows="10"
                            >{{ nl2br($product->description) }}</textarea>

                            <!-- /.input group -->
                        </div>
                        <div>
                            <div class="text-center">
                                <a href="{{ route('admin.product-administration.edit', $product->id) }}"
                                   class="btn btn-primary">Edit</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->

    </section>
@endsection