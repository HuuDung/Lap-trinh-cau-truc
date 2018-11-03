@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Member
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
                <th>Name</th>
                <th>Email</th>
                <th class="text-center">Level</th>
                <th class="text-center">Status</th>
                <th>Orders</th>
            </tr>
            </thead>
            <body>
            @foreach($users as $user)
                <tr>
                    <td><a href="#">{{ $user->name }}</a></td>
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
                    <td class="text-center">
                        @if($user->status == \App\User::ACTIVED)
                            <span class=" btn btn-success btn-width">Actived</span>
                        @elseif($user->status == \App\User::BLOCKED)
                            <span class="btn btn-danger btn-width">Blocked</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $user->order }}</td>
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