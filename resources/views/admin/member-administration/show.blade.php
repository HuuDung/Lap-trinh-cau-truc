@extends('layouts.master')
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="form-group">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{ Storage::url($user->avatar) }}"
                                 alt="User profile picture">
                        </div>
                        <div class="form-group">
                            <input class="form-control text-center" type="text" name="name"
                                   value="{{ $user->name }}"
                                   placeholder="Name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="level">Level: </label>
                            <input type="text" class="form-control" readonly
                                   @if($user->level == \App\User::NORMAL)value="Normal"
                                   @elseif($user->level == \App\User::GOLD) value="Gold"
                                   @elseif($user->level == \App\User::DIAMOND) value="Diamond" @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="account">Account</label>
                            <input type="text" class="form-control" readonly
                                   @if($user->isAdmin()) value="Admin"
                                   @else value="User" @endif
                            >
                        </div>
                        <div>
                            <div class="text-center">
                                <a href="{{ route('admin.member.edit', $user->id) }}"
                                   class="btn btn-primary ">Edit</a>
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