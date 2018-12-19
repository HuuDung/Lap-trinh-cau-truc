@extends('layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Show Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Show Category</li>
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
                        <div class="form-group">
                            <label for="name">Category's name</label>
                            <input class="form-control text-left" type="text" name="name" value="{{ $category->name }}"
                                   placeholder="Name" readonly>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="description"><i
                                            class="fa fa-map-marker margin-r-5"></i>Description:</label>

                            </div>
                            <textarea name="description" class="form-control rounded-0" rows="10" readonly
                            >{{ nl2br($category->description) }}</textarea>

                            <!-- /.input group -->
                        </div>
                        <div>
                            <div class="text-center">
                                <a href="{{ route('admin.category.edit', $category->id) }}"
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