@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Members
            <small>Administration</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Member</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th class="text-center">Level</th>
                <th>Orders</th>
                <th></th>
            </tr>
            </thead>
            <body>
            @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $user->id }}</td>
                    <td><a href="{{ route('admin.member.show' , $user->id) }}">{{ $user->name }}</a></td>
                    <td><img src="{{ Storage::url($user->avatar) }}" alt=""></td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        @if($user->level == \App\User::NORMAL)
                            <span class=" btn btn-success btn-width">Normal</span>
                        @elseif($user->level == \App\User::GOLD)
                            <span class="btn btn-warning btn-width">Gold</span>
                        @elseif($user->level == \App\User::DIAMOND)
                            <span class="btn btn-primary btn-width">Diamond</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $user->order }}</td>
                    <td class="text-center">
                        {{Form::open(['method' => 'DELETE', 'route' => ['admin.member.destroy', $user->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </body>
        </table>
        <div class="text-right">
            {{ $users->links() }}
        </div>
    </section>
    <!-- /.content -->
@endsection