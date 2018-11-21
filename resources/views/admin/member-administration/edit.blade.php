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
            <form action="{{ route('admin.member.update', $user->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
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
                            <select name="level" id="" class="form-control">
                                <option value="{{ \App\User::NORMAL }}"
                                        @if($user->level == \App\User::NORMAL) selected @endif>Normal
                                </option>
                                <option value="{{ \App\User::GOLD }}"
                                        @if($user->level == \App\User::GOLD) selected @endif>Gold
                                </option>
                                <option value="{{ \App\User::DIAMOND }}"
                                        @if($user->level == \App\User::DIAMOND) selected @endif>Diamond
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account">Account</label>
                            <select name="account" id="" class="form-control    ">
                                <option value="{{ \App\User::ADMIN }}" @if($user->isAdmin()) selected @endif>Admin
                                </option>
                                <option value="{{ \App\User::NOT_ADMIN }}" @if(!$user->isAdmin()) selected @endif>User
                                </option>
                            </select>

                        </div>
                        <div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('admin.member.edit', $user->id) }}"
                                   class="btn btn-primary ">Back</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <!-- /.row -->
        </form>

    </section>
@endsection