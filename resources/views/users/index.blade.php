@extends('users.layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Emails</b> <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rank</b> <a class="pull-right">
                                    @if($user->level == \App\User::NORMAL) {{ "Normal" }}
                                    @elseif($user->level == \App\User::GOLD) {{ "GOLD" }}
                                    @elseif ($user->level == \App\User::DIAMOND) {{ "DIAMOND" }}
                                    @endif
                                </a>
                            </li>
                            <li class="list-group-item">
                                <b>Orders</b> <a class="pull-right">{{ $user->order }}</a>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary"><b>Edit</b></a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong>Gender: </strong>

                        <p class="text-muted">
                            @if($user->gender == \App\User::MALE) Male
                            @elseif($user->gender == \App\User::FERMALE) Fermale
                            @else Orther @endif
                        </p>

                        <hr>
                        <strong><i class="fa fa-calendar margin-r-5"></i> Birthday</strong>

                        <p class="text-muted">
                            {{ $user->birthday }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">@if($user->location ){{ $user->location }} @else {{ "None" }}
                            @endif</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Favorite</strong>
                        <p>
                            <span class="label label-danger">{{ "Electronic" }}</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>{{ $user->notes }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection