@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Administration</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th class="text-center"></th>
                <th></th>
            </tr>
            </thead>
            <body>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        <a href="{{ route('admin.category.show', $category->id) }}">{{ $category->name }}</a>
                    </td>
                    <td>{{ nl2br($category->description) }}</td>
                    <td class="text-center">
                        {{Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', $category->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </body>
        </table>
        <div class="text-right">
            {{ $categories->links() }}
        </div>
    </section>
    <!-- /.content -->
@endsection