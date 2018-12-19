@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <form action="{{ route('admin.product-administration.update', $product->id) }}" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="col-md-6">
                    <!-- Product Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="form-group text-center">
                                <img src="{{ Storage::url($product->image) }}" alt="Product image">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Product's name</label>
                                <input class="form-control text-left" type="text" name="name"
                                       value="{{ old('name', $product->name) }}"
                                       placeholder="Name" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control">
                                    @foreach( $categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($category->id == $product->category['id']) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cost">Cost:</label>
                                <input type="number" class="form-control text-left" name="cost"
                                       value="{{ old('cost', $product->cost) }}" required>
                                @if ($errors->has('cost'))
                                    <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('cost') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control text-left" name="quantity"
                                       value="{{ old('quantity',$product->quantity) }}"
                                       required>
                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="description"><i
                                                class="fa fa-map-marker margin-r-5"></i>Description:</label>

                                </div>
                                <textarea name="description" class="form-control rounded-0"rows="10">{{ nl2br($product->description) }}</textarea>

                                <!-- /.input group -->
                            </div>
                            <div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                    <a href="{{ route('admin.product-administration.show', $product->id) }}"
                                       class="btn btn-primary">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->

    </section>
@endsection